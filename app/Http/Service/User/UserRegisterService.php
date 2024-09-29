<?php

namespace App\Http\Service\User;

use App\Models\User;

class UserRegisterService
{

    public function save($request): User
    {
        return User::create([
            "username" => $request->username,
            "name" => $request->name,
            "surname" => $request->surname,
            "father_name" => $request->father_name,
            "fin" => $request->fin,
            "serie" => $request->serie,
            "id_number" => $request->id_number,
            "phone" => $request->phone,
            "email" => $request->email,
            "password" => $request->password
        ]);
    }
}
