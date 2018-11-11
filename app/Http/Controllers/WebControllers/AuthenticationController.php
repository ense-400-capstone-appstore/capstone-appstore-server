<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Validator;
use App\User;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended(route('home'));
        }

        return view('login');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->input('remember'))) {
            return redirect()->intended(route('home'));
        }

        $mb = new MessageBag();
        $mb->add("login", "Invalid email or password");

        return view('login', ['errors' => $mb]);
    }

    /**
     * Handle a registration attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function register(Request $request)
    {
        $credentials = $request->only('first_name', 'last_name', 'email', 'password', 'password_confirmation');

        $validator = Validator::make($credentials, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return view('login', ['errors' => $validator->errors()]);
        }

        $credentials['password'] = bcrypt($credentials['password']);
        $credentials['name'] = $credentials['first_name'] . $credentials['last_name'];
        $user = User::create($credentials);

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * Terminate a user's session
     * 
     * return @Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
