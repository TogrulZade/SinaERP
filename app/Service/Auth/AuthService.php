<?php

namespace App\Service\Auth;

use App\Contract\AuthServiceInterface;
use App\Contract\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface
{
    public $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function login(array $credentials): string
    {
        if (!Auth::attempt($credentials)) {
            throw new \Exception('Invalid credentials');
        }

        if ($this->userService->isBanned(Auth::user())) {
            return "Banned";
        }

        $token = Auth::user()->createToken('authToken')->plainTextToken;

        $cleanToken = explode('|', $token, 2)[1] ?? $token;

        return $cleanToken;
    }
}
