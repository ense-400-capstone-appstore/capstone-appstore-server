<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Group as GroupResource;
use App\Http\Resources\AndroidApp as AndroidAppResource;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->authorizeResource(Group::class, 'group');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Group::class);

        return GroupResource::collection(
            Auth::user()->accessibleGroups(Auth::user())->paginate(15)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $this->authorize('view', $group);

        return new GroupResource($group);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('store', Group::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->authorize('update', $group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $this->authorize('delete', $group);
    }

    /**
     * Get this group's AndroidApps
     *
     * @param Group $group
     * @return void
     */
    public function androidApps(Group $group)
    {
        $this->authorize('view', $group);

        $androidApps = Auth::user()->accessibleGroupApps($group);

        return AndroidAppResource::collection($androidApps->paginate(15));
    }

    /**
     * Get this group's users
     *
     * @param Group $group
     * @return void
     */
    public function users(Group $group)
    {
        $this->authorize('users', $group);

        return UserResource::collection($group->users()->paginate(15));
    }
}
