<?php

namespace App\Http\Controllers\ApiControllers\V1;

use App\AndroidApp;
use App\Http\Resources\AndroidApp as AndroidAppResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Image;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Support\Facades\Auth;

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
        $this->authorize('index', AndroidApp::class);

        return AndroidAppResource::collection(
            Auth::user()->accessibleApps()->paginate(15)
        );
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

        return new AndroidAppResource($androidApp);
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
        $this->authorize('update', $androidApp);

        $request->validate([
            'name' => 'string',
            'version' => 'string',
            'description' => 'string',
            'price' => 'numeric'
        ]);

        $androidApp->update($request->only([
            'name',
            'version',
            'description',
            'price'
        ]));

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
        $this->authorize('destroy', $androidApp);

        $androidApp->delete();
        return response(null, 204);
    }

    /**
     * Retrieve an uploaded image and store it as the AndroidApp's avatar
     *
     * @return \Illuminate\Http\Response
     */
    public function avatarUpload(Request $request, AndroidApp $androidApp)
    {
        $this->authorize('setAvatar', $androidApp);

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,bmp,png|max:5120'
        ]);

        $androidApp->setAvatar($request->file('avatar'));
        return response(null, 201);
    }

    /**
     * Download the AndroidApp's avatar
     *
     * @return \Illuminate\Http\Response
     */
    public function avatarDownload(AndroidApp $androidApp)
    {
        $this->authorize('getAvatar', $androidApp);

        return Image::make($androidApp->getAvatar())->response();
    }

    /**
     * Retrieve an uploaded file and store it as the AndroidApp's file
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request, AndroidApp $androidApp)
    {
        $this->authorize('setFile', $androidApp);

        $request->validate([
            'file' => 'required|max:102400'
        ]);

        $androidApp->setFile($request->file('file'));
        return response(null, 201);
    }

    /**
     * Download the AndroidApp's file
     *
     * @return \Illuminate\Http\Response
     */
    public function fileDownload(AndroidApp $androidApp)
    {
        $this->authorize('getFile', $androidApp);

        return $androidApp->getFile();
    }

    /**
     * Retrieve a single AndroidApp by package name
     *
     * @param  String  $packageName
     */
    public function byPackageName(String $packageName)
    {
        return new AndroidAppResource(
            AndroidApp::where('package_name', $packageName)->firstOrFail()
        );
    }

    /**
     * Get this AndroidApp's categories
     *
     * @param AndroidApp $androidApp
     * @return void
     */
    public function categories(AndroidApp $androidApp)
    {
        $this->authorize('view', $androidApp);

        return CategoryResource::collection(
            $androidApp->categories()->paginate(15)
        );
    }
}
