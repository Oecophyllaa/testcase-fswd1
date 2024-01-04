<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CutiController;
use App\Http\Controllers\API\KaryawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// AUTH
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

  // Karyawan
  Route::get('/karyawan', [KaryawanController::class, 'index']);
  Route::post('/karyawan', [KaryawanController::class, 'store']);
  Route::get('/karyawan/{id}', [KaryawanController::class, 'show']);
  Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
  Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);

  Route::get('/karyawan/recent/{limit}', [KaryawanController::class, 'recent']);

  // Cuti
  Route::get('/cuti', [CutiController::class, 'index']);
  Route::get('/sisa-cuti', [CutiController::class, 'show']);
});
