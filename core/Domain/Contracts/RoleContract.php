<?php

declare(strict_types=1);

namespace Core\Domain\Contracts;

interface RoleContract
{
    public function all();
    public function get(int $id);
}
