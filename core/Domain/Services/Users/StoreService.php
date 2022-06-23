<?php

declare(strict_types=1);

namespace Core\Domain\Services\Users;

use Core\Domain\Contracts\BaseContract;
use Core\Domain\Validators\UserValidator;
use Core\Domain\Payloads\{ValidationPayload, GenericPayload};
use Illuminate\Support\Collection;

final class StoreService
{
    private $repository;

    public function __construct(BaseContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Collection $data)
    {
        if (! UserValidator::validate($data->all())) {
            return new ValidationPayload(UserValidator::getMessage());
        }
        $resource = $this->repository->save(UserValidator::validatedData());
        return new GenericPayload($resource);
    }
}