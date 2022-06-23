<?php

namespace Core\Actions\Auths;

use Core\Domain\Services\Auths\UpdateProfileService;
use Core\Responders\ResourceResponder;
use Illuminate\Http\Request;

class UpdateProfileAction
{
    private $service;
    private $responder;


    public function __construct(UpdateProfileService $service, ResourceResponder $responder)
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
