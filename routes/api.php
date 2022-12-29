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
Route::post('login', 'App\Http\Controllers\Api\ApiEndpoints@login');
Route::post('logout', 'App\Http\Controllers\Api\ApiEndpoints@logout')
    ->middleware('auth:sanctum');
Route::post('isLogged', function (Request $request) {
    return auth('sanctum')->check();
});