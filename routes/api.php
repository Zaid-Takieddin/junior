<?php

use App\Http\Controllers\Api\BusLineController;
use App\Http\Controllers\Api\ChildController;
use App\Http\Controllers\Api\ChildParentController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\LineSupervisorController;
use App\Http\Controllers\Api\TeacherController;
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

Route::group(['namespace' => 'App\Http\Controllers\Api'], function() {
    Route::apiResource('children', ChildController::class);
    Route::apiResource('parents', ChildParentController::class);
    Route::apiResource('teachers', TeacherController::class);
    Route::apiResource('classrooms', ClassroomController::class);
    Route::apiResource('bus-lines', BusLineController::class);
    Route::apiResource('line-supervisors', LineSupervisorController::class);
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
