<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\WorkexperienceController;

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

// ===============================================================Create 
Route:: post ("user", [UserController::class, "store"]);
Route:: post ("alumni", [AlumniController::class, "store"]);
Route:: post ("company", [CompanyController::class, "store"]);
Route:: post ("workexperience", [WorkexperienceController::class, "store"]);
Route::put('alumnicover/{id}',[AlumniController::class, "uploadAlumniCover"]);

// =================================================================Update

Route::put('alumni/{id}',[AlumniController::class, "update"]);
Route::put('alumniprofile/{id}',[AlumniController::class, "updateAlumniProfile"]);
Route::put('company/{id}',[AlumniController::class, "update"]);
Route::put('workexperience/{id}',[WorkexperienceController::class, "update"]);

// =================================================================Get
Route::get('alumnis',[AlumniController::class, "index"]);
Route::get('alumni/{id}',[AlumniController::class, "show"]);
Route::get('company',[AlumniController::class, "index"]);