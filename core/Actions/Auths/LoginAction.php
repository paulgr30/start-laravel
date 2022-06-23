<?php

namespace Core\Actions\Auths;

use Core\Domain\Services\Auths\LoginService;
use Core\Responders\ResourceResponder;
use Illuminate\Http\Request;

class LoginAction
{
    protected $service;
    protected $responder;

    public function __construct(LoginService $service, ResourceResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        $login = $this->service->execute($request->collect());
        return $this->responder->withData($login)->respond();
    }
}
