<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UserLoginService;

class LoginController extends Controller
{

    public UserLoginService $userLoginService;

    public function __construct(UserLoginService $userLoginService)
    {
        $this->userLoginService = $userLoginService;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->userLoginService->login($request);

        return response()->json(['message' => "Login və ya şifrə yalnışdır"]);
    }
}
