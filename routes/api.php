<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth',
    'as' => 'user.'
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup')->name('sigup');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('user', 'AuthController@user')->name('user');
    });
});

Route::group([
    'prefix' => 'admin-auth',
    'as' => 'admin.'
], function () {
    Route::post('login', 'AdminAuthController@login')->name('login');
    Route::post('signup', 'AdminAuthController@signup')->name('sigup');

    Route::group([
        'middleware' => 'auth:admin'
    ], function () {
        Route::get('logout', 'AdminAuthController@logout')->name('logout');
        Route::get('user', 'AdminAuthController@user')->name('user');
    });
});
