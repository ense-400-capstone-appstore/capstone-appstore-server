<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Resources\AndroidApp as AndroidAppResource;
use App\Http\Resources\Group as GroupResource;

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
        return UserResource::collection(User::paginate(15));
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
        $this->authorize('avatarUpload', $user);

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
        $this->authorize('avatarDownload', $user);

        return Image::make($user->getAvatar())->response();
    }

    /**
     * Get a listing of this user's AndroidApps
     *
     * @param User $user
     * @return Collection
     */
    public function androidApps(User $user)
    {
        $this->authorize('androidApps', $user);

        return AndroidAppResource::collection($user->androidApps()->paginate(15));
    }

    /**
     * Get a listing of this user's created AndroidApps
     *
     * @param User $user
     * @return Collection
     */
    public function createdAndroidApps(User $user)
    {
        $this->authorize('createdAndroidApps', $user);

        return AndroidAppResource::collection($user->createdAndroidApps()->paginate(15));
    }

    /**
     * Get a listing of this user's groups
     *
     * @param User $user
     * @return Collection
     */
    public function groups(User $user)
    {
        $this->authorize('groups', $user);

        $groups = Auth::user()->accessibleGroups($user);

        return GroupResource::collection($groups->paginate(15));
    }

    /**
     * Get a listing of this user's created groups
     *
     * @param User $user
     * @return Collection
     */
    public function createdGroups(User $user)
    {
        $this->authorize('createdGroups', $user);

        return GroupResource::collection($user->createdGroups()->paginate(15));
    }
}
