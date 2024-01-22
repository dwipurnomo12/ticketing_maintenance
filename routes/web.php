<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InsidenController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProgresController;
use App\Http\Controllers\TindakLanjutController;

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



Auth::routes();
Route::middleware('auth')->group(function () {
    Route::group(['middleware'  => 'CheckRole:superadmin,admin,agen,devops'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [HomeController::class, 'index']);

        Route::resource('/laporan', LaporanController::class);
    });

    Route::group(['middleware'  => 'CheckRole:superadmin'], function () {
        Route::resource('/users', UsersController::class);

        Route::get('/report', [ReportController::class, 'index']);
        Route::get('/report/cetak-laporan', [ReportController::class, 'cetakLaporan']);
    });

    Route::group(['middleware'  => 'CheckRole:admin'], function () {
        Route::get('/tindak-lanjut', [TindakLanjutController::class, 'index']);
        Route::post('/tindak-lanjut/{id}/approve', [TindakLanjutController::class, 'approve']);
        Route::post('/tindak-lanjut/{id}/reject', [TindakLanjutController::class, 'reject']);
    });

    Route::group(['middleware'  => 'CheckRole:superadmin,admin'], function () {
        Route::get('/insiden', [InsidenController::class, 'index']);
    });

    Route::group(['middleware'  => 'CheckRole:devops'], function () {
        Route::get('/progres', [ProgresController::class, 'index']);
        Route::get('/progres/balas/{id}', [ProgresController::class, 'balas']);
        Route::post('/progres', [ProgresController::class, 'store']);
    });
});
