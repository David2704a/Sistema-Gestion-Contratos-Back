<?php

namespace App\Services\Implementations;

use App\Models\User;
use App\Services\UserService;

class UserServiceImpl implements UserService {

    public function getUsers(){
        return User::get();

    }
}
