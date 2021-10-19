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
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', ['App\Http\Controllers\AuthController', 'login']);
    Route::post('/register', ['App\Http\Controllers\AuthController', 'register']);
    Route::post('/logout', ['App\Http\Controllers\AuthController', 'logout']);
    Route::post('/refresh', ['App\Http\Controllers\AuthController', 'refresh']);
    Route::get('/user-profile', ['App\Http\Controllers\AuthController', 'userProfile']);
});


Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'v1'

], function ($router) {
    Route::get('/people', ['App\Http\Controllers\PeopleController', 'index']);
    Route::get('/people/{id}', ['App\Http\Controllers\PeopleController', 'show']);
    Route::get('/film', ['App\Http\Controllers\FilmController', 'index']);
    Route::get('/film/{id}', ['App\Http\Controllers\FilmController', 'show']);
    Route::get('/planet', ['App\Http\Controllers\PlanetController', 'index']);
    Route::get('/planet/{id}', ['App\Http\Controllers\PlanetController', 'show']);
    Route::get('/starship', ['App\Http\Controllers\StarshipController', 'index']);
    Route::get('/starship/{id}', ['App\Http\Controllers\StarshipController', 'show']);
    Route::get('/vehicle', ['App\Http\Controllers\VehicleController', 'index']);
    Route::get('/vehicle/{id}', ['App\Http\Controllers\VehicleController', 'show']);
});

Route::any('{any}', function(){
    return response()->json([
    	'status' => 'error',
        'message' => 'Resource not found'], 404);
})->where('any', '.*');