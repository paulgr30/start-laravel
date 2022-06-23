<?php

namespace Core\Actions\Auths;

use Core\Domain\Services\Auths\LogoutService;
use Core\Responders\ResourceResponder;

class LogoutAction
{
    protected $service;
    protected $responder;

    public function __construct(LogoutService $service, ResourceResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        //return 'cerramos....';
        $logout = $this->service->execute();
        return $this->responder->withData($logout)->respond();
    }
}
