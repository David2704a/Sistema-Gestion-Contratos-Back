<?php

namespace App\Services\Implementations;

use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthServiceImpl implements AuthService {
    
    public function authenticate($request) 
    {
        $username = $request->email;
        $password = $request->password;

        $credencial = [
            "email" => $username,
            "password" => $password
        ];

        $remember = ($request->hash('remember') ? true : false);

        if (Auth::attempt($credencial, $remember)) {
            return true;
        }else{
            return false;
        }
        
    }
}
