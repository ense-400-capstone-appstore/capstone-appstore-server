<?php

namespace App\Http\Controllers\WebControllers;

use App\AndroidApp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use Auth;
use Illuminate\Validation\ValidationException;

class AndroidAppController extends Controller
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
        $this->authorize('index', AndroidApp::class);

        $androidApps = Auth::user()->accessibleApps();

        return view('resources/android_apps/index', [
            'androidApps' => $androidApps->paginate(15)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return \Illuminate\Http\Response
     */
    public function show(AndroidApp $androidApp)
    {
        $this->authorize('view', $androidApp);

        return view('resources/android_apps/show', ['androidApp' => $androidApp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', AndroidApp::class);

        return view('resources/android_apps/create', [
            'categories' => Category::all(),
            'groups' => Auth::user()->createdGroups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('store', AndroidApp::class);

        $request->validate([
            'name' => 'required|string',
            'version' => 'required|string',
            'description' => 'required|string',
            'package_name' => 'string|nullable',
            'price' => 'required|numeric',
            'categories' => 'array',
            'categories.*' => 'numeric',
            'groups' => 'array',
            'groups.*' => 'numeric',
        ]);

        $androidApp = AndroidApp::create($request->only([
            'name',
            'version',
            'description',
            'package_name',
            'price',
            'private'
        ]));

        if (request()->avatar) {
            $request->validate(['avatar' => 'image']);
            $androidApp->setAvatar(request()->avatar);
        }

        if (request()->file) {
            $request->validate(['file' => 'file']);
            $androidApp->setFile(request()->file);
        }

        // Attach categories
        foreach ($request->input('categories') ?? [] as $categoryId) {
            $androidApp->categories()->attach($categoryId);
        }

        // Attach groups
        foreach ($request->input('groups') ?? [] as $groupId) {
            $androidApp->groups()->attach($groupId);
        }

        return redirect()->action('WebControllers\AndroidAppController@show', [
            'androidApp' => $androidApp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return \Illuminate\Http\Response
     */
    public function edit(AndroidApp $androidApp)
    {
        $this->authorize('edit', $androidApp);

        return view('resources/android_apps/edit', [
            'androidApp' => $androidApp,
            'categories' => Category::all(),
            'groups' => Auth::user()->createdGroups
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AndroidApp  $androidApp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AndroidApp $androidApp)
    {
        $this->authorize('update', $androidApp);

        $request->validate([
            'name' => 'required|string',
            'version' => 'required|string',
            'description' => 'required|string',
            'package_name' => 'string|nullable',
            'price' => 'required|numeric',
            'private' => 'numeric|nullable',
            'categories' => 'array',
            'categories.*' => 'numeric',
            'groups' => 'array',
            'groups.*' => 'numeric',
        ]);

        $androidApp->private = $request->input('private') ? true : false;

        $androidApp->update($request->only([
            'name',
            'version',
            'description',
            'package_name',
            'price',
            'private'
        ]));


        if (request()->avatar) {
            $request->validate(['avatar' => 'image']);
            $androidApp->setAvatar(request()->avatar);
        }

        if (request()->file) {
            $request->validate(['file' => 'file']);
            $androidApp->setFile(request()->file);
        }

        // Detach all categories and only attach selected ones
        $androidApp->categories()->detach();

        foreach ($request->input('categories') ?? [] as $categoryId) {
            $androidApp->categories()->attach($categoryId);
        }

        // Detach all groups and only attach selected ones
        $androidApp->groups()->detach();

        foreach ($request->input('groups') ?? [] as $groupId) {
            $androidApp->groups()->attach($groupId);
        }

        return redirect()->action('WebControllers\AndroidAppController@show', [
            'androidApp' => $androidApp
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(AndroidApp $androidApp)
    {
        $this->authorize('destroy', $androidApp);
    }

    /**
     * Download the AndroidApp's file
     *
     * @return \Illuminate\Http\Response
     */
    public function fileDownload(AndroidApp $androidApp)
    {
        $this->authorize('getFile', $androidApp);

        $file = $androidApp->getFile();

        if ($file) return $file;

        throw ValidationException::withMessages([
            'file' => 'This app does not have a file attached!'
        ]);
    }

    /**
     * If the user does not own this app, add it to the user's list of
     * owned apps.
     *
     * If the user already owns this app, remove it from the user's list of
     * owned apps.
     *
     * @param AndroidApp $androidApp
     * @param User $user
     * @return void
     */
    public function toggleOwn(AndroidApp $androidApp, User $user)
    {
        $this->authorize('toggleOwn', $androidApp);

        if (!$user->androidApps()->find($androidApp->id)) {
            $user->androidApps()->attach($androidApp);
            return redirect()->back();
        } else {
            $user->androidApps()->detach($androidApp);
            return redirect()->action('WebControllers\AndroidAppController@index');
        }
    }
}
