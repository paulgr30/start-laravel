<?php

declare(strict_types=1);

namespace Core\Domain\Services\Auths;

use Core\Domain\Contracts\AuthContract;
use Core\Domain\Payloads\GenericPayload;

final class ProfileService
{
    private $repository;

    public function __construct(AuthContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        $profile = $this->repository->profile();
        return new GenericPayload($profile);
    }
}
