<?php

namespace App\Contract;

use App\Models\User;

interface UserServiceInterface
{
    public function findUserByFin($fin): User;
    public function findUserByUsername($username): User;
    public function isBanned(User $user): bool;
}
