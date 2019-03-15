<?php

namespace App\Http\Controllers\WebControllers;

use App\AndroidApp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
        $androidApps = AndroidApp::paginate(15);

        return view('resources/android_apps/index', ['androidApps' =>  $androidApps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', AndroidApp::class);

        return view('resources/android_apps/create');
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
            'price' => 'required|numeric'
        ]);

        $androidApp = AndroidApp::create($request->only([
            'name',
            'version',
            'description',
            'price'
        ]));

        if (request()->avatar) {
            $request->validate(['avatar' => 'image']);
            $androidApp->setAvatar(request()->avatar);
        }

        if (request()->file) {
            $request->validate(['file' => 'file']);
            $androidApp->setFile(request()->file);
        }

        return redirect()->action('WebControllers\AndroidAppController@show', [
            'androidApp' => $androidApp
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
        return view('resources/android_apps/show', ['androidApp' => $androidApp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return \Illuminate\Http\Response
     */
    public function edit(AndroidApp $androidApp)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(AndroidApp $androidApp)
    {
        //
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

        return back();
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
        if ($user->androidApps()->find($androidApp->id) == null) {
            $androidApp->addToUser($user);
        } else {
            $androidApp->removeFromUser($user);
        }

        return redirect()->back();
    }
}
