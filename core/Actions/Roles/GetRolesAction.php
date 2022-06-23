<?php

namespace Core\Actions\Roles;

use Core\Domain\Services\Roles\GetRolesService;
use Core\Responders\ResourceResponder;

class GetRolesAction
{
    private $service;
    private $responder;


    public function __construct(GetRolesService $service, ResourceResponder $responder)
    {
        $this->service     = $service;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        $roles = $this->service->execute();
        return $this->responder->withData($roles)->respond();
    }
}