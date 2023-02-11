<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BusLineController;
use App\Http\Controllers\Api\ChildController;
use App\Http\Controllers\Api\ChildImageController;
use App\Http\Controllers\Api\GuardianController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\LineSupervisorController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\HomeworkAnswerController;
use App\Http\Controllers\Api\HomeworkController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\TeacherCertificateController;
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

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['namespace' => 'App\Http\Controllers\Api', /*'middleware' => 'auth:sanctum'*/], function () {
    Route::apiResource('children', ChildController::class);
    Route::apiResource('guardians', GuardianController::class);
    Route::apiResource('teachers', TeacherController::class);
    Route::apiResource('classrooms', ClassroomController::class);
    Route::apiResource('bus-lines', BusLineController::class);
    Route::apiResource('line-supervisors', LineSupervisorController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('food', FoodController::class);
    Route::apiResource('homeworks', HomeworkController::class);
    Route::apiResource('reports', ReportController::class);
    Route::apiResource('homework-answers', HomeworkAnswerController::class);
    Route::apiResource('teacher-certificates', TeacherCertificateController::class);
    Route::apiResource('child-images', ChildImageController::class)->except('update');
    Route::apiResource('teacher-certificates', TeacherCertificateController::class)->except('update');
    Route::post('/child-images/{id}', [ChildImageController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });
