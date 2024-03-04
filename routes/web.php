<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

// public
Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('authlogin', [AuthController::class, 'authlogin'])->name('auth.authlogin');

// Group Private
Route::group(['middleware' => ['auth']], function () {
  // Admin
  Route::group(['middleware' => ['cekakses:admin']], function () {
    Route::get('dashboardadmin', [PerbaikanController::class, 'dashadmin'])->name('perbaikan.dashadmin');
  });
  // Pegawai
  Route::group(['middleware' => ['cekakses:pegawai']], function () {
    Route::get('dashboardpegawai', [PerbaikanController::class, 'dashpegawai'])->name('perbaikan.dashpegawai');
  });
});

// Ini route untuk perbaikan
Route::get('perbaikan', [PerbaikanController::class, 'index'])->name('perbaikan.index');
Route::get('perbaikan/view', [PerbaikanController::class, 'index'])->name('perbaikan.index');
Route::get('perbaikan/create', [PerbaikanController::class, 'create'])->name('perbaikan.create');
Route::post('perbaikan', [PerbaikanController::class, 'store'])->name('perbaikan.store');
Route::get('perbaikan/{id}/edit', [PerbaikanController::class, 'edit'])->name('perbaikan.edit');
Route::put('perbaikan/{id}', [PerbaikanController::class, 'update'])->name('perbaikan.update');
Route::delete('perbaikan/{id}', [PerbaikanController::class, 'destroy'])->name('perbaikan.destroy');
// Route::get('perbaikan/{id}', [PerbaikanController::class, 'show'])->name('perbaikan.show');


// Group route
// Route::prefix('admin')->group(function () {
//   Route::get('perbaikan', [PerbaikanController::class, 'index'])->name('admin.perbaikan.index');
//   // dashboard
//   Route::get('/dashboard', function () {
//     $d_meta = [
//       'title' => 'Dashboard',
//     ];
//     return view('dashboard.index', ['d_meta' => $d_meta]);
//   })->name('dashboard.index');
// });

Route::prefix('public')->group(function () {
  Route::get('/kontak', function () {
    return view('kontak');
  });
});
