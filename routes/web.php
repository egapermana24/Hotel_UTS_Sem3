<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenginapController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // redirect ke halaman login
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::post('logout', LoginController::class)->name('logout');
    Route::resource('kamar', KamarController::class);
    Route::resource('reservasi', ReservasiController::class);
    Route::resource('penginap', PenginapController::class);
    Route::resource('pengunjung', PengunjungController::class);
});

//Route search
Route::get('/searchKamar', [KamarController::class, 'search'])->name('searchKamar');
Route::get('/searchReservasi', [ReservasiController::class, 'search'])->name('searchReservasi');
Route::get('/searchPenginap', [PenginapController::class, 'search'])->name('searchPenginap');


Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);

    // Route::get('dashboard', [DashboardController::class, 'index']);
    // Route::resource('/kamar', KamarController::class);
    // Route::resource('/reservasi', ReservasiController::class);
    // Route::resource('/penginap', PenginapController::class);
    // Route::resource('/pengunjung', PengunjungController::class);
    // Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
    // Route::post('/login', [UserController::class, 'authenticate']);
    // Route::get('/logout', [UserController::class, 'logout']);
});
