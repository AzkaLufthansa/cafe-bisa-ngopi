<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\MenuController;
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
    Route::get('/transaksi', [DashboardController::class, 'transaksi']);
    Route::get('/buat_transaksi', [DashboardController::class, 'buat_transaksi']);
    Route::get('/laporan_pendapatan', [DashboardController::class, 'laporan_pendapatan']);
    Route::get('/log_aktivitas', [DashboardController::class, 'log_aktivitas']);

    Route::resource('menu', MenuController::class);
    Route::resource('user', DashboardUserController::class);
});