<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\Controllers\AlumniController;

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
Route::put('alumni/{id}',[AlumniController::class, "update"]);
Route::put('alumniprofile/{id}',[AlumniController::class, "updateProfile"]);

Route:: post ("users", [UserController::class, "createUser"]);
Route:: post ("alumni", [AlumniController::class, "store"]);
Route::put('alumni/{id}',[AlumniController::class, "update"]);