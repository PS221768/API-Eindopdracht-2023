<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\ReasonController;

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

// Students
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);

// This will be the only time I write this, but seeing as you only influense one item I removed the s, this is purely because I like it...
Route::get('/student/{id}', [StudentController::class, 'show']);
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::delete('/student/{id}', [StudentController::class, 'destroy']);

Route::get('/classes', [ClassController::class, 'index']);
Route::post('/classes', [ClassController::class, 'store']);
Route::get('/class/{id}', [ClassController::class, 'show']);
Route::put('/class/{id}', [ClassController::class, 'update']);
Route::delete('/class/{id}', [ClassController::class, 'destroy']);

Route::get('/reasons', [ReasonController::class, 'index']);

// relational part

Route::get('/students/{student_id}/classes', [StudentClassController::class, 'getClassesByStudent']);
Route::get('/classes/{class_id}/students', [StudentClassController::class, 'getStudentsByClass']);
Route::post('/students/classes', [StudentClassController::class, 'assignClassToStudent']);
Route::delete('/students/classes', [StudentClassController::class, 'removeClassFromStudent']);
