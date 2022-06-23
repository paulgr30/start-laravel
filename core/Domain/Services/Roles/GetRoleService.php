<?php

declare(strict_types=1);

namespace Core\Domain\Services\Roles;

use Core\Domain\Contracts\RoleContract;
use Core\Domain\Payloads\{NotFoundPayload, GenericPayload};


final class GetRoleService
{
    private $repository;

    public function __construct(RoleContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        // Obtenemos el recurso por su id;
        $resource = $this->repository->get($id);
        // Comprobamos el recurso y retornamos el payload respectivo
        return $resource ? new GenericPayload($resource) : new NotFoundPayload();
    }
}