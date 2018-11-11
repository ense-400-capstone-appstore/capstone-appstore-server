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
    Route::view('/', 'home')->name('home');

    // Authentication
    Route::get('login', 'AuthenticationController@login');
    Route::post('login', 'AuthenticationController@authenticate');
    Route::post('register', 'AuthenticationController@register');
    Route::get('logout', 'AuthenticationController@logout');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Override login route
    Route::view('login', 'login')->name('voyager.login');
});
