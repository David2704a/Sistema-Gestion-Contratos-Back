<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
 
        $username = $request->email;
        $password = $request->password;

        $credencial = [
            "email" => $username,
            "password" => $password
        ];

        // $remember = ($request->hash('remember') ? true : false);

        if (Auth::attempt($credencial)) {
            return response()->json('success', true);
        }else {
            return response()->json('error', false);
        }

        // $auth = $this->authService->authenticate($request);

        // if($auth){
        //     return response()->json($auth, 200);
        // }
    
    }
}
