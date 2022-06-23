<?php

declare(strict_types=1);

namespace Core\Domain\Contracts;

interface BaseContract
{
    public function all();
    public function get(int $id);
    public function findByCriteria(string $name, int $perPage);
    public function save($data);
    public function update(int $id, $data);
    public function destroy(int $id);
}
