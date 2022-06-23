<?php

declare(strict_types=1);

namespace Core\Domain\Services\Auths;

use Core\Domain\Contracts\AuthContract;
use Core\Domain\Validators\UpdateProfileAuthValidator;
use Core\Domain\Payloads\{GenericPayload, NotFoundPayload, ValidationPayload};
use Illuminate\Support\Collection;

final class UpdateProfileService
{
    private $repository;

    public function __construct(AuthContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Collection $data)
    {
        // Validamos la data a actualizar
        if (!UpdateProfileAuthValidator::validate($data->all())) {
            return new ValidationPayload(UpdateProfileAuthValidator::getMessage());
        }
        // Actualizamos y obtenemos el recurso actualizado
        $resource = $this->repository->updateProfile(UpdateProfileAuthValidator::validatedData());
        // Vereficamos si no se obtuvo el recurso
        return $resource ? new GenericPayload($resource) : new NotFoundPayload();
    }
}
