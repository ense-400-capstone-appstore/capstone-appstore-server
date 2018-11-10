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
    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    //testing script
    /*curl -X POST localhost:8000/api/v1/login
        -H "Accept: application/json"
        -H "Content-type: application/json"
        -d "{\"email\": \"admin@admin.com\", \"password\": \"password\" }"
     */
    public function login(Request $request)
    {
        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]
        )) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }

        return response()->json(['error' => 'Unauthorised'], 401);
    }


    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    //testing register
    /*
    curl -X POST http://localhost:8000/api/v1/register
        -H "Accept: application/json"
        -H "Content-Type: application/json"
        -d '{"name": "John", "email": "john.doe@toptal.com", "password": "toptal123", "c_password": "toptal123"}'
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;


        return response()->json(['success' => $success], $this->successStatus);
    }


    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
