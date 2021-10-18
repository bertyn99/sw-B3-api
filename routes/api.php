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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', ['App\Http\Controllers\AuthController', 'login']);
    Route::post('/register', ['App\Http\Controllers\AuthController', 'register']);
    Route::post('/logout', ['App\Http\Controllers\AuthController', 'logout']);
    Route::post('/refresh', ['App\Http\Controllers\AuthController', 'refresh']);
    Route::get('/user-profile', ['App\Http\Controllers\AuthController', 'userProfile']);
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'

], function ($router) {
    Route::get('/people', ['App\Http\Controllers\PeopleController', 'index']);
    Route::get('/people/{id}', ['App\Http\Controllers\PeopleController', 'show']);
    Route::get('/film', ['App\Http\Controllers\FilmController', 'index']);
    Route::get('/film/{id}', ['App\Http\Controllers\FilmController', 'show']);
    Route::get('/planet', ['App\Http\Controllers\PlanetController', 'index']);
    Route::get('/planet/{id}', ['App\Http\Controllers\PlanetController', 'show']);
});
