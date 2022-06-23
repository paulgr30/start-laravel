<?php

namespace Core\Domain\Repositories\Eloquent;

use Core\Domain\Contracts\RoleContract;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleContract
{
    private $model;

    function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function all()
    {
        return $this-> model->with('permissions')->oldest('name')->get();
    }

    public function get(int $id)
    {
        return $this->model->with('permissions')->find($id);
    }
}