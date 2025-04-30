<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\MapelController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

//     Route::resource('guru', GuruController::class);
//     Route::resource('siswa', SiswaController::class);
//     Route::resource('mapel', MapelController::class);
// });