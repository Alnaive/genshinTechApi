<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CharacterController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('builds', BuildController::class);
Route::apiResource('characters', CharacterController::class);
Route::GET('u/{uid}', [WelcomeController::class, 'uid']);
Route::GET('home', [WelcomeController::class, 'index']);
Route::GET('explore', [WelcomeController::class, 'explore']);
Route::GET('showcase/{uid?}', [BuildController::class, 'showcaseUID']);
Route::GET('build/{id?}', [BuildController::class, 'showBuild']);