<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
 
        // dd( $request->input('email'), $request->input('password') );
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Correo o contrasena invalida'], 401);
        }

        $user = $request->user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesion exitoso',
            'token' => $token,
            'token_type' => 'Bearer'
        ]);
    
    }


    public function register(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name');

        $datos = DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'id_persona' => 3,
            'password' => Hash::make($password)

        ]);

        if($datos){
            return response()->json(['message' => 'Usuario creado exitosamente'], 201);
        }else{
            return response()->json(['message' => 'Error al crear el usuario'], 500);
        }
       
    }
}
