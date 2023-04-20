<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\SicknessAbsenceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);

Route::get('/classes', [ClassController::class, 'index']);
Route::post('/classes', [ClassController::class, 'store']);
Route::get('/classes/{id}', [ClassController::class, 'show']);
Route::put('/classes/{id}', [ClassController::class, 'update']);
Route::delete('/classes/{id}', [ClassController::class, 'destroy']);

Route::get('/reasons', [ReasonController::class, 'index']);

// relational part

Route::get('/students/{student_id}/classes', [StudentClassController::class, 'getClassesByStudent']);
Route::get('/classes/{class_id}/students', [StudentClassController::class, 'getStudentsByClass']);
Route::post('/students/classes', [StudentClassController::class, 'assignClassToStudent']);
Route::delete('/students/classes', [StudentClassController::class, 'removeClassFromStudent']);

Route::get('/sicknessAbsences', [SicknessAbsenceController::class, 'index']);
Route::get('/sicknessAbsences/{id}', [SicknessAbsenceController::class, 'show']);
Route::post('/sicknessAbsences', [SicknessAbsenceController::class, 'store']);
Route::put('/sicknessAbsences/{id}', [SicknessAbsenceController::class, 'update']);
Route::delete('/sicknessAbsences/{id}', [SicknessAbsenceController::class, 'destroy']);
