<?php

namespace App\Http\Controllers\WebControllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('resources/users/show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $fields = $request->only(
            'full_name',
            'email',
            'password',
            'password_confirmation'
        );

        $validator = Validator::make($fields, [
            'full_name' => 'string',
            'email' => 'email',
            'password' => 'confirmed',
        ]);

        if ($validator->fails()) {
            return view('resources/users/show', [
                'user' => $user,
                'errors' => $validator->errors()
            ]);
        }

        if (isset($fields['full_name'])) {
            $fields['name'] = $fields['full_name'];
        }

        if (isset($fields['password'])) {
            $fields['password'] = bcrypt($fields['password']);
        }

        $user->update($fields);

        return view('resources/users/show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Get a listing of this user's AndroidApps
     *
     * @param User $user
     * @return void
     */
    public function androidApps(User $user)
    {
        $this->authorize('androidApps', $user);

        return view('resources/users/android_apps', [
            'user' => $user,
            'androidApps' => $user->androidApps()->paginate(15)
        ]);
    }
}
