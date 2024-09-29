<?php

use Illuminate\Support\Facades\Auth;

class UserLoginService
{

    public function login($request)
    {
        $fin = $request->fin;
        $password = $request->password;

        if (Auth::attempt(["fin" => $request->fin, "password" => $request->password])) {
            $token = $user->createToken('auth_token')->plainTextToken;

            $cleanToken = explode('|', $token, 2)[1] ?? $token;
        }
    }
}
