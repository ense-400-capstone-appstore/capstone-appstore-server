<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::namespace('ApiControllers')->name('api.')->group(function () {
    Route::namespace('V1')->name('v1.')->prefix('v1')->group(function () {
        // Authentication
        Route::post('login', 'AuthenticationController@authenticate');
        Route::post('register', 'AuthenticationController@register');

        // Resources
        Route::resource('android_apps', 'AndroidAppController');
        Route::get('user', function (Request $request) {
            return $request->user();
        });
        
        // Error handling fallbacks
        Route::name('errors.')->group(function () {
            Route::get('404', function () {
                return response()->json(['message' => 'Not Found.'], 404);
            })->name('404');
        });
    });
});
