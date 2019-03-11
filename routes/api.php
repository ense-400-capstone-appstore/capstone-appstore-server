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

        Route::post('users/{user}/avatar', 'UserController@avatarUpload');
        Route::get('users/{user}/avatar', 'UserController@avatarDownload');

        /**
         * AndroidApps
         */
        Route::get('android_apps/package_name/{package_name}', 'AndroidAppController@byPackageName');

        Route::post('android_apps/{android_app}/file', 'AndroidAppController@fileUpload');
        Route::get('android_apps/{android_app}/file', 'AndroidAppController@fileDownload');

        Route::post('android_apps/{android_app}/avatar', 'AndroidAppController@avatarUpload');
        Route::get('android_apps/{android_app}/avatar', 'AndroidAppController@avatarDownload');

        Route::get('android_apps/{android_app}/categories', 'AndroidAppController@categories');

        /**
         * Categories
         */
        Route::get('categories/{category}/android_apps', 'CategoryController@androidApps');

        /**
         * Resources
         * https://laravel.com/docs/controllers#resource-controllers
         *
         * NOTE: Additional routes for resources should be defined *above*
         *       this statement to avoid conflicts
         */
        Route::apiResources([
            'android_apps' => 'AndroidAppController',
            'categories' => 'CategoryController',
            'users' => 'UserController'
        ]);
    });
});
