<?php

declare(strict_types=1);

namespace Core\Domain\Services\Users;

use Core\Domain\Contracts\BaseContract;
use Core\Domain\Validators\UserValidator;
use Core\Domain\Payloads\{GenericPayload, NotFoundPayload, ValidationPayload};
use Illuminate\Support\Collection;

final class UpdateService
{
    private $repository;

    public function __construct(BaseContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, Collection $data)
    {
        // Validamos la data a actualizar
        if (!UserValidator::validate($data->all())) {
            return new ValidationPayload(UserValidator::getMessage());
        }
        // Actualizamos y obtenemos el recurso actualizado
        $resource = $this->repository->update($id, UserValidator::validatedData());
        // Comprobamos el recurso y retornamos el payload respectivo
        return $resource ? new GenericPayload($resource) : new NotFoundPayload();
    }
}