<?php

declare(strict_types=1);

namespace Core\Domain\Contracts;

interface AuthContract
{
    public function isAuthenticated();
    public function login(string $email, string $password);
    public function profile();
    public function updateProfile($data);
    public function changePassword(string $password, string $password_new);
    public function refreshToken(int $id);
    public function logout();
}
