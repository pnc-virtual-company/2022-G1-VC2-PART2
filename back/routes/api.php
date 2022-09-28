<?php

use App\Http\Controllers\AlumniSkillController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkexperienceController;
use App\Http\Controllers\SendMailController;
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
    Route::get('userAlumni',[UserController::class, "getAlumniUsers"]);
    Route::get('userEro',[UserController::class, "getEroUsers"]);
    Route::get("alumniSkill/{alumni_id}", [AlumniSkillController::class, "show"]);
    Route::get('workexperience',[WorkexperienceController::class,"index"]);
    Route::get('workexperience/{id}',[WorkexperienceController::class,"show"]);
    Route::get("company/{id}",[CompanyController::class,"show"]);
    Route::get("companies",[CompanyController::class,"getAllCompanies"]);
    Route::get("skills", [SkillController::class, "index"]);
});

// ======================Reset password==============================
Route::post('resetPassword/{id}',[UserController::class, 'resetPassword']);
Route::post('forgetPassword/',[UserController::class, 'forgetPassword']);
Route::post('resetPwAfterVerify/{id}',[UserController::class, 'resetPwAfterVerify']);


// =======================Create New===============================
Route::post('inviteAlumni', [UserController::class, "inviteAlumni"]);
Route::post('register', [UserController::class, "register"]);
Route::post('skill', [SkillController::class, "store"]);
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
Route::put('alumniInfo/{id}', [UserController::class, "fillInfo"]);
Route::put('workexperience/{id}', [WorkexperienceController::class, "update"]);
Route::put('company/{id}', [CompanyController::class, "update"]);

Route::put("university", [UniversityController::class, "update"]);
Route::put("education", [EducationController::class, "update"]);
Route::put("skill", [SkillController::class, "update"]);
Route::put("alumniSkill", [AlumniSkillController::class, "update"]);
Route::put("approve/{id}", [UserController::class, "approve"]);

// ===========================Get========================================

// Route::get('alumni/{id}',[UserController::class, "showAlumni"]);
// Route::get('workexperience',[WorkexperienceController::class,"index"]);
// Route::get('workexperience/{id}',[WorkexperienceController::class,"show"]);
// Route::get("company/{id}",[CompanyController::class,"show"]);
Route::get("companies",[CompanyController::class,"getAllCompanies"]);
Route::get("getinfo",[UserController::class, 'getInfoByToken']);
Route::get("getAlumnis",[UserController::class, 'getAlumniUsers']);
Route::get("universities", [UniversityController::class, "getUniversities"]);
Route::get("alumniSkill/{alumni_id}", [AlumniSkillController::class, "show"]);
Route::get("alumniExplores", [UserController::class, "getExploreAlumni"]);
Route::get("getEmail/{email}", [UserController::class, "getEmail"]);


// ============================Remove=====================================
Route::delete("alumniSkill/{id}", [AlumniSkillController::class, "destroy"]);
Route::delete("removeUser/{id}", [UserController::class, "destroy"]);
Route::delete("education/remove/{id}", [EducationController::class, "removeEdu"]);
Route::delete("experience/remove/{id}", [WorkexperienceController::class, "removeExper"]);
Route::delete("companies/{id}",[CompanyController::class,"destroy"]);
Route::delete("university/{id}",[UniversityController::class,"destroy"]);

// =================================================================SendMailController
Route::post('sendVerifyCode',[SendMailController::class, "sendVerifyCode"]);
Route::post('sendRegister',[SendMailController::class, "sendRegister"]);
Route::post('sendRemoveAccount/{id}',[SendMailController::class, "sendRemoveAccount"]);


Route::post('rejectAlumni/{id}',[SendMailController::class, "rejectAlumni"]);
Route::post('approveAlumni/{id}',[SendMailController::class, "approveAlumni"]);


