<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\AgendaAcaraController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\AccessController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/surat-keluar', [DashboardController::class, 'suratKeluar'])->name('surat-keluar.index');
    Route::resource('surat-keluar', SuratKeluarController::class);

    Route::get('/surat-masuk', [DashboardController::class, 'suratMasuk'])->name('surat-masuk.index');
    Route::resource('surat-masuk', SuratMasukController::class);

    Route::get('/agenda-acara', [DashboardController::class, 'agendaAcara'])->name('agenda-acara.index');
    Route::resource('agenda-acara', AgendaAcaraController::class);

    Route::get('/ruangan', [DashboardController::class, 'ruangan'])->name('ruangan.index');
    Route::resource('ruangan', RuanganController::class);
});

Route::group(['middleware' => ['role:Sekretaris']], function () {
    Route::resource('surat-keluar', SuratKeluarController::class);
    Route::resource('agenda-acara', AgendaAcaraController::class);
});

Route::group(['middleware' => ['role:Sekretaris,Ketua-UKM,BEM,Kemahasiswaan']], function () {
    Route::resource('surat-masuk', SuratMasukController::class);
});

Route::group(['middleware' => ['role:BAU']], function () {
    Route::resource('ruangan', RuanganController::class);
    Route::get('/access', [AccessController::class, 'index'])->name('access.index');
    Route::post('/access/update-role/{id}', [AccessController::class, 'updateRole'])->name('access.updateRole');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
