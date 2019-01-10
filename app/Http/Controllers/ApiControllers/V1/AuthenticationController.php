<?php

namespace App\Http\Controllers\ApiControllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiControllers\V1;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;

class AuthenticationController extends Controller
{
    /**
     * Handle an authentication attempt
     * 
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            $success['token'] = $user->createToken('Matryoshka')->accessToken;
            return response()->json(['success' => $success], 200);
        }

        return response()->json(['error' => 'Unauthorised'], 401);
    }


    /**
     * Handle a registration attempt
     * 
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password');

        $validator = Validator::make($credentials, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $credentials['password'] = bcrypt($credentials['password']);
        $user = User::create($credentials);
        $success['token'] = $user->createToken('Matryoshka')->accessToken;

        return response()->json(['success' => $success], 201);
    }

    /**
     * Return currently authenticated user's information
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }
}
