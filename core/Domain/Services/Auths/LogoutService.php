<?php

declare(strict_types=1);

namespace Core\Domain\Services\Auths;

use Core\Domain\Contracts\AuthContract;
use Core\Domain\Payloads\GenericPayload;

final class LogoutService
{
    private $repository;

    public function __construct(AuthContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        // Cerramos sesion;
        $result = $this->repository->logout();
        // Retornamos el resultado
        return new GenericPayload($result);
    }
}