<?php

namespace Core\Actions\Auths;

use Core\Domain\Services\Auths\ChangePasswordService;
use Core\Responders\ResourceResponder;
use Illuminate\Http\Request;

class ChangePasswordAction
{
    private $service;
    private $responder;


    public function __construct(ChangePasswordService $service, ResourceResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        $auth = $this->service->execute($request->collect());
        return $this->responder->withData($auth)->respond();
    }
}
