<?php
declare(strict_types=1);

namespace Core\Domain\Services\Users;

use Core\Domain\Contracts\BaseContract;
use Core\Domain\Payloads\GenericPayload;


final class GetByCriteriaService
{
    private $repository;

    public function __construct(BaseContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $name, int $perPage)
    {
        $resources = $this->repository->findByCriteria($name, $perPage);
        return new GenericPayload($resources);
    }
}