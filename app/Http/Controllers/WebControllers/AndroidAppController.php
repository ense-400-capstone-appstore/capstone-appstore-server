<?php

namespace App\Http\Controllers\WebControllers;

use App\AndroidApp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
