<?php

declare(strict_types=1);

namespace Core\Domain\Services\Users;

use Core\Domain\Contracts\BaseContract;
use Core\Domain\Payloads\{NotFoundPayload, GenericPayload};


final class GetByIdService
{
    private $repository;

    public function __construct(BaseContract $repository)
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