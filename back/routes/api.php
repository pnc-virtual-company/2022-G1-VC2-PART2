<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\WorkexperienceController;
use App\Http\Controllers\UnivercityController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\AlumniSkillController;


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

Route::post('useralumni', [UserController::class, "store"]);
Route:: post ('company', [CompanyController::class, "store"]);
Route:: post ("workexperience", [WorkexperienceController::class, "store"]);

Route:: post ("skill", [SkillController::class, "store"]);
Route:: post ("alumniSkill", [AlumniSkillController::class, "store"]);
Route:: post ("univercity", [UnivercityController::class, "store"]);
Route:: post ("education", [EducationController::class, "store"]);

// =================================================================Update

Route::put ("alumniprofile/{id}", [UserController::class, "uploadAlumniProfile"]);
Route::put('alumnicover/{id}',[UserController::class, "uploadAlumniCover"]);
Route::put('alumni/{id}',[UserController::class, "update"]);
Route::put('workexperience/{id}',[WorkexperienceController::class, "update"]);
Route::put('company/{id}',[CompanyController::class, "update"]);

Route:: put ("univercity", [UnivercityController::class, "update"]);
Route:: put ("education", [EducationController::class, "update"]);
Route:: put ("skill", [SkillController::class, "update"]);
Route:: put ("alumniSkill", [AlumniSkillController::class, "update"]);

// =================================================================Get

Route::get('alumni/{id}',[UserController::class, "showAlumni"]);
Route::get('workexperience',[WorkexperienceController::class,"index"]);
Route::get('workexperience/{id}',[WorkexperienceController::class,"show"]);
Route::get("company/{id}",[CompanyController::class,"show"]);
Route::get("companies",[CompanyController::class,"index"]);
