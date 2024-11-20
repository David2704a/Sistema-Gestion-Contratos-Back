<?php

namespace App\Services;

interface AuthService {

public function authenticate(string $username, string $password);
    
}
