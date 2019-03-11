<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::namespace('WebControllers')->group(function () {
    Route::get('/', 'AppController@home')->name('home');

    // Authentication
    Route::get('login', 'AuthenticationController@login')->name('login');
    Route::post('login', 'AuthenticationController@authenticate');
    Route::post('register', 'AuthenticationController@register');
    Route::get('logout', 'AuthenticationController@logout');

    Route::resource('users', 'UserController')->only('show', 'update');
    Route::resource('android_apps', 'AndroidAppController')->only('index', 'show', 'update');
    Route::resource('categories', 'CategoryController')->only('index', 'show');

    /**
     * AndroidApps
     */
    Route::post('android_apps/{android_app}/file', 'AndroidAppController@fileUpload');
    Route::get('android_apps/{android_app}/file', 'AndroidAppController@fileDownload');

    Route::post('android_apps/{android_app}/avatar', 'AndroidAppController@avatarUpload');
    Route::get('android_apps/{android_app}/avatar', 'AndroidAppController@avatarDownload');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Override login route
    Route::view('login', 'login')->name('voyager.login');
});
