<?php

declare(strict_types=1);

namespace Core\Domain\Services\Auths;

use Core\Domain\Contracts\AuthContract;
use Core\Domain\Payloads\{TokenPayload, NotFoundPayload};

final class RefreshTokenService
{
    private $repository;

    public function __construct(AuthContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        // Obtenemos el token refrescado
        $token = $this->repository->refreshToken($id);
        // Comprobamos el token y retornamos el payload respectivo
        return $token ? new TokenPayload($token) : new NotFoundPayload();
    }
}