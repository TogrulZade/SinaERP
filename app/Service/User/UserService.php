<?php

namespace App\Service\User;

use App\Models\User;
use App\Contract\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function findUserByFin($fin): User
    {
        return User::whereFin($fin)->first();
    }

    public function findUserByUsername($username): User
    {
        return User::whereUserName($username)->first();
    }

    public function isBanned(User $user): bool
    {
        return $user->where("is_banned", true)->count();
    }
}
