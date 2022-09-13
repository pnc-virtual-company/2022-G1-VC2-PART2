<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
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
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// ===============================================================Create 

Route:: post ('useralumni', [UserController::class, "store"]);
Route:: post ('company', [CompanyController::class, "store"]);
Route:: post ("workexperience", [WorkexperienceController::class, "store"]);

// =================================================================Update

Route::put ("alumniprofile/{id}", [UserController::class, "uploadAlumniProfile"]);
Route::put('alumnicover/{id}',[UserController::class, "uploadAlumniCover"]);
Route::put('alumni/{id}',[UserController::class, "update"]);
Route::put('workexperience/{id}',[WorkexperienceController::class, "update"]);
Route::put('company/{id}',[CompanyController::class, "update"]);

// =================================================================Get

Route::get('alumni/{id}',[UserController::class, "showAlumni"]);
Route::get('workexperience',[WorkexperienceController::class,"index"]);
Route::get('workexperience/{alumni_id}',[WorkexperienceController::class,"show"]);
Route::get("companies",[CompanyController::class,"index"]);