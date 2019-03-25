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
        $this->authorize('update', $user);

        $request->validate([
            'name' => 'string',
            'email' => 'email',
            'password' => 'confirmed',
        ]);

        $fields = $request->only(
            'name',
            'email',
            'password',
            'password_confirmation'
        );

        if (isset($fields['password'])) {
            $fields['password'] = bcrypt($fields['password']);
        }

        $user->update($fields);

        if (request()->avatar) {
            $request->validate(['avatar' => 'image']);
            $user->setAvatar(request()->avatar);
        }

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

    /**
     * Get a listing of this user's created AndroidApps
     *
     * @param User $user
     * @return void
     */
    public function createdAndroidApps(User $user)
    {
        $this->authorize('createdAndroidApps', $user);

        return view('resources/users/created_android_apps', [
            'user' => $user,
            'androidApps' => $user->createdAndroidApps()->paginate(15)
        ]);
    }

    /**
     * Get a listing of this user's groups
     *
     * @param User $user
     * @return void
     */
    public function groups(User $user)
    {
        $this->authorize('groups', $user);

        return view('resources/users/groups', [
            'user' => $user,
            'groups' => $user->groups()->paginate(15)
        ]);
    }

    /**
     * Get a listing of this user's created groups
     *
     * @param User $user
     * @return void
     */
    public function createdGroups(User $user)
    {
        $this->authorize('createdGroups', $user);

        return view('resources/users/created_groups', [
            'user' => $user,
            'groups' => $user->createdGroups()->paginate(15)
        ]);
    }
}
