<?php

namespace Core\Domain\Repositories\Eloquent;

use Core\Domain\Models\User;
use Core\Domain\Contracts\BaseContract;
use Illuminate\Support\Facades\Hash;

class UserRepository implements BaseContract
{
    private $model;

    function __construct(User $user)
    {
        $this->model = $user;
    }

    public function all()
    {
        return $this->model->with('roles')->oldest('name')->get();
    }

    public function get(int $id)
    {
        return $this->model->with('roles')->find($id);
    }

    public function findByCriteria(string $name, int $perPage)
    {
        return $this->model->with('roles')
            ->ofName($name)
            ->latest()
            ->paginate($perPage);
    }

    public function save($data)
    {
        // Encriptamos el password
        $data['password'] = Hash::make($data['password']);
        // Rellenamos el model
        $this->model->fill($data);
        // Guardamos el usuario
        $this->model->saveOrFail();
        // Asignamos los roles del usuario
        $this->model->assignRole("{$data['roles']}");
        // Retornamos el usuario creado
        return $this->model;
    }

    public function update(int $id, $data)
    {
        // Encriptamos el password si es que existe en la data
        if( !empty($data['password'])) $data['password'] = Hash::make($data['password']);
        // Obtenemos el usuario
        $user = $this->get($id);
        // Verificamos si existe el usuario
        if($user) {
            // Actualizamos el usuario
            $user->update($data);
            // Asignamos los roles del usuario
            $user->syncRoles("{$data['roles']}");
        }
        // Retornamos el usuario modificado
        return $user;
    }    

    public function destroy(int $id)
    {
        $user = $this->get($id);
        return $user ? $user->delete() : null;
    }
}
