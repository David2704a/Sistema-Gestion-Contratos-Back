<?php

namespace App\Services\Implementations;

use App\Services\AuthService;

class AuthServiceImpl implements AuthService {
    
    public function authenticate(string $username, string $password) 
    {
        $credencial = [
            "email" => $username,
            "password" => $password
        ];

        
    }
}
