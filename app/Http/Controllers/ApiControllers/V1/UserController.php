<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        $user = User::create($request->only([
            'name',
            'email',
            'password',
        ]));

        return new UserResource($user);
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
        $request->validate([
            'name' => 'string',
            'email' => 'email|unique:users',
            'password' => 'string',
        ]);

        $user->update($request->only([
            'name',
            'email',
            'password',
        ]));

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(null, 204);
    }

    /**
     * Return the currently authenticated user's information
     *
     * @return \Illuminate\Http\Response
     */
    public function current()
    {
        return new UserResource(Auth::user());
    }

    /**
     * Retrieve an uploaded image and store it as the user's avatar
     *
     * @return \Illuminate\Http\Response
     */
    public function avatarUpload(Request $request, User $user)
    {
        $this->authorize('setAvatar', $user);
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,bmp,png|max:5120'
        ]);

        $user->setAvatar($request->file('avatar'));
        return response(null, 201);
    }

    /**
     * Download the user's avatar
     *
     * @return \Illuminate\Http\Response
     */
    public function avatarDownload(User $user)
    {
        $this->authorize('getAvatar', $user);
        return Image::make($user->getAvatar())->response();
    }
}
