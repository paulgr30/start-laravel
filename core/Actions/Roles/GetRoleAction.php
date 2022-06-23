<?php

namespace Core\Actions\Roles;

use Core\Domain\Services\Roles\GetRoleService;
use Core\Responders\ResourceResponder;

class GetRoleAction
{
    protected $service;
    protected $responder;

    public function __construct(GetRoleService $service, ResourceResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke($id)
    {
        $role = $this->service->execute((int) $id);
        return $this->responder->withData($role)->respond();
    }
}