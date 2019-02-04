<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\AndroidApp;
use App\Http\Resources\AndroidApp as AndroidAppResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class AndroidAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->authorizeResource(AndroidApp::class, 'android_app');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AndroidAppResource::collection(AndroidApp::paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return \Illuminate\Http\Response
     */
    public function show(AndroidApp $androidApp)
    {
        return new AndroidAppResource(AndroidApp::findOrFail($androidApp));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'version' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $androidApp = AndroidApp::create($request->all());

        return new AndroidAppResource($androidApp);
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
        $androidApp->update($request->all());

        return new AndroidAppResource($androidApp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(AndroidApp $androidApp)
    {
        $androidApp->delete();

        return response()->json(null, 204);
    }
}
