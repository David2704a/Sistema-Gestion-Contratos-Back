<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(){
        $user = DB::table('users')->get();

        return response()->json($user);
    }
}
