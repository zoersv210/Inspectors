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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'namespace' => 'Inspectors',
    'prefix' => 'auth/inspectors'

], function () {
    Route::post('login', 'AuthController@login');
    Route::post('reset', 'ForgotPasswordController@forgot');
});

Route::group([

    'middleware' => 'auth:inspector',
    'namespace' => 'Inspectors',
    'prefix' => 'inspector'

], function ($router) {
    Route::get('get-profile', 'InspectorController@getProfile')->middleware('blocked');
    Route::post('edit-profile', 'InspectorController@editProfile')->middleware('blocked');
    Route::post('refresh-token', 'AuthController@refresh');
    Route::post('logout', 'AuthController@logout');
});
