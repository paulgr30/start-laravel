<?php

declare(strict_types=1);

namespace Core\Domain\Services\Auths;

use Core\Domain\Contracts\AuthContract;
use Core\Domain\Validators\ChangePasswordAuthValidator;
use Core\Domain\Payloads\{GenericPayload, ValidationPayload};
use Illuminate\Support\Collection;

final class ChangePasswordService
{
    private $repository;

    public function __construct(AuthContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Collection $data)
    {
        // Validamos la data a actualizar
        if (!ChangePasswordAuthValidator::validate($data->all())) {
            return new ValidationPayload(ChangePasswordAuthValidator::getMessage());
        }
        // Obtenemos las passwords validadas
        $passwords = ChangePasswordAuthValidator::validatedData();
        // Cambiamos la contraseña y obtenemos confirmacion
        $result = $this->repository->changePassword($passwords['current_password'], $passwords['new_password']);
        // Retornamos el resultado
        return new GenericPayload($result);
    }
}
