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

Route::namespace('App\\Http\\Controllers\\Api')->group(function() {
    Route::prefix('teams')->group(function() {
        Route::get('/', 'TeamController@index');

        Route::post('create', 'TeamController@create');

        Route::prefix('{team}')->group(function() {
            Route::get('/', 'TeamController@show');
            Route::delete('/', 'TeamController@delete');

            Route::get('/members', 'TeamController@members');
        });
    });

    Route::prefix('members')->group(function() {
        Route::get('/', 'MemberController@index');

        Route::prefix('{member}')->group(function() {
            Route::get('/', 'MemberController@show');
            Route::delete('/', 'MemberController@delete');
        });
    });  
});