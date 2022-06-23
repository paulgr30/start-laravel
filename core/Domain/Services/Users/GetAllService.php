<?php

declare(strict_types=1);

namespace Core\Domain\Services\Users;

use Core\Domain\Contracts\BaseContract;
use Core\Domain\Payloads\GenericPayload;


final class GetAllService
{
    private $repository;

    public function __construct(BaseContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return new GenericPayload($this->repository->all());
    }
}