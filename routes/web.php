<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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
    return view('home', [
        'title' => 'Home'
    ]);
})->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/laporan_pendapatan', [DashboardController::class, 'laporan_pendapatan']);
    Route::get('/ubah_periode', [DashboardController::class, 'ubah_periode']);
    Route::get('/log_aktivitas', [DashboardController::class, 'log_aktivitas']);
    
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/buat_transaksi', [TransaksiController::class, 'buat_transaksi']);
    Route::get('/get_harga/{menu}', [TransaksiController::class, 'get_harga']);
    Route::post('/store', [TransaksiController::class, 'store']);

    Route::resource('menu', MenuController::class)->middleware('permission:mengelola-menu');
    Route::resource('user', DashboardUserController::class)->middleware('permission:mengelola-user');
});