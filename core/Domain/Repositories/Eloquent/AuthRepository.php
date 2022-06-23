<?php

namespace Core\Domain\Repositories\Eloquent;

use Core\Domain\Models\User;
use Core\Domain\Contracts\AuthContract;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthContract
{
    private $model;

    function __construct(User $user)
    {
        $this->model = $user;
    }

    public function isAuthenticated()
    {
        return Auth::user() ? true : false;
    }

    // Autenticacion Token
    public function login(string $email, string $password)
    {
        $credentials = [
            'email' => $email,
            'password' => $password,
            'is_active' => 1
        ];
        // Autenticamos y generamos el token
        $token = Auth::attempt($credentials);
        return $token;
    }

    public function profile()
    {
        return Auth::user()->load('roles.permissions');
    }

    public function updateProfile($data)
    {
        // Obtenemos el usuario autenticado
        $user = Auth::user();
        // Actualizamos el usuario
        $user->update($data);
        // Retornamos el usuario modificado
        return $user->load('roles.permissions');
    }

    public function changePassword(string $current_password, string $new_password)
    {
        // Verificamos la contraseña
        $checkPassword = Hash::check($current_password, Auth::user()->password);
        if ($checkPassword) {
            // Obtenemos el usuario autenticado
            $user = Auth::user();
            // Actualizamos el password
            $user->password = Hash::make($new_password);
            $user->update();
        }
        return $checkPassword;
    }

    public function refreshToken(int $id)
    {
        // Refrescamos el token
        return Auth::user() ? Auth::refresh() : null;
    }

    public function logout()
    {
        Auth::logout();
        return true;
    }
}
