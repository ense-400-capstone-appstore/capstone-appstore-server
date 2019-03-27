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
    Route::resource('android_apps', 'AndroidAppController');
    Route::resource('categories', 'CategoryController')->only('index', 'show');
    Route::resource('groups', 'GroupController');

    /**
     * AndroidApps
     */
    Route::post('android_apps/{android_app}/file', 'AndroidAppController@fileUpload');
    Route::get('android_apps/{android_app}/file', 'AndroidAppController@fileDownload');

    Route::post('android_apps/{android_app}/avatar', 'AndroidAppController@avatarUpload');
    Route::get('android_apps/{android_app}/avatar', 'AndroidAppController@avatarDownload');

    Route::post('android_apps/{android_app}/toggle_own/{user}', 'AndroidAppController@toggleOwn');

    /**
     * Users
     */
    Route::get('users/{user}/android_apps', 'UserController@androidApps');
    Route::get('users/{user}/created_android_apps', 'UserController@createdAndroidApps');
    Route::get('users/{user}/groups', 'UserController@groups');
    Route::get('users/{user}/created_groups', 'UserController@createdGroups');

    /**
     * Groups
     */
    Route::post('groups/{group}/toggle_member/{user}', 'GroupController@toggleMember');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Override login route
    Route::view('login', 'login')->name('voyager.login');
});
