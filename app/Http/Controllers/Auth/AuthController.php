<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;


class AuthController extends Controller
{
    public function register(RegisterRequest $request){


        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(),400);
        // }


        return response()->json([
             'message' => 'registered successfully'
        ],200);
    }
}
