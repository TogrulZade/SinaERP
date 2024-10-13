<?php

namespace App\Service\User;

use App\Contract\AuthServiceInterface;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserLoginService
{
    public $authUserService;

    public function login(AuthServiceInterface $authService): string
    {

        $token = Auth::user()->createToken('auth_token')->plainTextToken;
        $cleanToken = explode('|', $token, 2)[1] ?? $token;
        return response()->json();
    }

    public function attemptWithFinAndPassword($fin, $password): bool
    {
        if (Auth::attempt(["fin" => $fin, "password" => $password])) {
            return true;
        }

        return false;
    }
}
