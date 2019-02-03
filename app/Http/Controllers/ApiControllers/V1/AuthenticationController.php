<?php

namespace App\Http\Controllers\ApiControllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiControllers\V1;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;

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
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw new AuthenticationException;
        }

        $user = Auth::user();

        return [
            'data' => [
                'user_id' => $user->id,
                'access_token' => $user->createToken('Matryoshka')->accessToken
            ]
        ];
    }
}
