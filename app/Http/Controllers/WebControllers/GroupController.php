<?php

namespace App\Http\Controllers\WebControllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class GroupController extends Controller
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
        $this->authorize('index', Group::class);

        return view('resources/groups/index', [
            'groups' => Auth::user()->accessibleGroups()->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Group::class);

        return view('resources/groups/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Group::class);
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

        return view('resources/groups/show', [
            'group' => $group,
            'androidApps' => Auth::user()->accessibleGroupApps($group)->get(),
            'users' =>  $group->users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $this->authorize('update', $group);
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
     * If the user is not a member of this group, add them to this group.
     *
     * If the user is already a member, remove them from the group.
     *
     * @param Group $group
     * @param User $user
     * @return void
     */
    public function toggleMember(Group $group, User $user)
    {
        $this->authorize('toggleMember', $group);

        if ($user->groups()->find($group->id) == null) {
            $user->groups()->attach($group);
        } else {
            $user->groups()->detach($group);
        }

        return redirect()->back();
    }
}
