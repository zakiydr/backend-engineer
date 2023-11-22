<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AuthController;

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


// Patient Route
Route::get('/patient', [PatientController::class, 'index']);
Route::post('/patient', [PatientController::class, 'store'])->middleware('auth:sanctum');
Route::get('/patient/{id}', [PatientController::class, 'show']);
Route::put('/patient/{id}', [PatientController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/patient/{id}', [PatientController::class, 'destroy'])->middleware('auth:sanctum');

// Authentication Route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
