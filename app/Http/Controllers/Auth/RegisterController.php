<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Service\User\UserRegisterService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public UserRegisterService $userRegisterService;

    public function __construct(UserRegisterService $userRegisterService)
    {
        $this->userRegisterService = $userRegisterService;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userRegisterService->save($request);

        if (Auth::attempt(["fin" => $request->fin, "password" => $request->password])) {

            $token = $user->createToken('auth_token')->plainTextToken;

            $cleanToken = explode('|', $token, 2)[1] ?? $token;

            return response()->json([
                'message' => 'Qeydiyyat uğurla tamamlandı!',
                'user' => Auth::user(),
                'token' => $cleanToken
            ], 201);
        }

        return response()->json(['message' => 'Login və ya şifrə yalnışdır'], 401);
    }
}
