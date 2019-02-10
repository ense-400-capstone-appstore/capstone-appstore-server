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
        /**
         * Authentication
         */
        Route::post('login', 'AuthenticationController@authenticate')->name('login');

        /**
         * Users
         */
        Route::get('users/current', 'UserController@current');

        Route::post('users/avatar', 'UserController@avatarUpload');
        Route::get('users/avatar', 'UserController@avatarDownload');

        /**
         * AndroidApps
         */
        Route::post('android_apps/file', 'AndroidAppController@fileUpload');
        Route::get('android_apps/file', 'AndroidAppController@fileDownload');

        Route::post('android_apps/avatar', 'AndroidAppController@avatarUpload');
        Route::get('android_apps/avatar', 'AndroidAppController@avatarDownload');

        /**
         * Resources
         * https://laravel.com/docs/controllers#resource-controllers
         *
         * NOTE: Additional routes for resources should be defined *above*
         *       this statement to avoid conflicts
         */
        Route::apiResources([
            'android_apps' => 'AndroidAppController',
            'users' => 'UserController'
        ]);
    });
});
