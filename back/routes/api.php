<?php

use App\Http\Controllers\AlumniSkillController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkexperienceController;
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
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// =====================User login===============================

Route::post('login',[UserController::class, "login"]);
Route::get('logout',[UserController::class, "logout"]);

// ======================Private user============================
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('alumni/{id}',[UserController::class, "showAlumni"]);
    Route::get('workexperience',[WorkexperienceController::class,"index"]);
    Route::get('workexperience/{id}',[WorkexperienceController::class,"show"]);
    Route::get("company/{id}",[CompanyController::class,"show"]);
    Route::get("companies",[CompanyController::class,"getAllCompanies"]);
});

// ======================Reset password==============================
Route::put('resetPassword/{id}',[UserController::class, 'resetpassword']);

// =======================Create New===============================
Route::post('useralumni', [UserController::class, "store"]);
Route::post('company', [CompanyController::class, "createCompany"]);
Route::post("workexperience", [WorkexperienceController::class, "addExperience"]);

Route::post("alumniSkill", [AlumniSkillController::class, "store"]);
Route::post("university/create", [UniversityController::class, "createUniversity"]);
Route::post("education", [EducationController::class, "AddEducation"]);
Route::get("alumniEdu/{alumni_id}", [EducationController::class, "getAlumniEdu"]);
Route::put("education/{id}", [EducationController::class, "updateEducation"]);

// =========================Update====================================

Route::put("alumniprofile/{id}", [UserController::class, "uploadAlumniProfile"]);
Route::put('alumnicover/{id}', [UserController::class, "uploadAlumniCover"]);
Route::put('alumni/{id}', [UserController::class, "update"]);
Route::put('workexperience/{id}', [WorkexperienceController::class, "update"]);
Route::put('company/{id}', [CompanyController::class, "update"]);

Route::put("university", [UniversityController::class, "update"]);
Route::put("education", [EducationController::class, "update"]);
Route::put("skill", [SkillController::class, "update"]);
Route::put("alumniSkill", [AlumniSkillController::class, "update"]);

// ===========================Get========================================

// Route::get('alumni/{id}',[UserController::class, "showAlumni"]);
// Route::get('workexperience',[WorkexperienceController::class,"index"]);
// Route::get('workexperience/{id}',[WorkexperienceController::class,"show"]);
// Route::get("company/{id}",[CompanyController::class,"show"]);
// Route::get("companies",[CompanyController::class,"index"]);
Route::get("getinfo",[UserController::class, 'getInfoByToken']);
Route::get("universities", [UniversityController::class, "getUniversities"]);
Route::get("skills", [SkillController::class, "index"]);
Route::get("alumniSkill/{alumni_id}", [AlumniSkillController::class, "show"]);

// =================================================================Remove
Route::delete("alumniSkill/{id}", [AlumniSkillController::class, "destroy"]);
Route::delete("education/remove/{id}", [EducationController::class, "removeEdu"]);
Route::delete("experience/remove/{id}", [WorkexperienceController::class, "removeExper"]);
