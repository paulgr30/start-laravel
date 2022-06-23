<?php

declare(strict_types=1);

namespace Core\Domain\Services\Roles;

use Core\Domain\Payloads\GenericPayload;
use Core\Domain\Contracts\RoleContract;

final class GetRolesService
{
    private $repository;

    public function __construct(RoleContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        $resources = $this->repository->all();
        return new GenericPayload($resources);
    }
}