<?php

declare(strict_types=1);

namespace Core\Domain\Services\Users;

use Core\Domain\Contracts\BaseContract;
use Core\Domain\Payloads\{DeletingPayload, NotFoundPayload};

final class DestroyService
{
    private $repository;

    public function __construct(BaseContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        $result = $this->repository->destroy($id);
        return $result ? new DeletingPayload($result) : new NotFoundPayload();
    }
}