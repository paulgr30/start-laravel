<?php

declare(strict_types=1);

namespace Core\Domain\Services\Auths;

use Core\Domain\Contracts\AuthContract;
use Core\Domain\Payloads\{TokenPayload, ValidationPayload};
use Core\Domain\Validators\AuthValidator;
use Illuminate\Support\Collection;

final class LoginService
{
    private $repository;

    public function __construct(AuthContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Collection $data)
    {
        if (!AuthValidator::validate($data->all())) {
            return new ValidationPayload(AuthValidator::getMessage());
        }
        // Obtenemos las credenciales validadas
        $credentials = AuthValidator::validatedData();
        // Iniciamos sesion y obtenemos el token;
        $token = $this->repository->login($credentials['email'], $credentials['password']);
        // Verificamos el token y devolvemos el payload correspondiente
        return $token ? new TokenPayload($token) : new ValidationPayload($token);
    }
}