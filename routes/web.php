<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\KaryawanController as AdminKaryawanController;
use App\Http\Controllers\Admin\CutiController as AdminCutiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  // return view('welcome');
  return redirect()->route('admin.dashboard');
});

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {

  // DASHBOARD
  Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

  // KARYAWAN
  Route::resource('karyawan', AdminKaryawanController::class);

  // CUTI
  Route::get('/sisa-cuti', [AdminCutiController::class, 'show'])->name('cuti.sisa-cuti');
  Route::resource('cuti', AdminCutiController::class)->except(['show']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
