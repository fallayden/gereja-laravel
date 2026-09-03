<?php

use App\Http\Controllers\Admin\AdminMagazineController;
use App\Http\Controllers\Admin\AdminWartaController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\PedangRohController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WartaController;
use Illuminate\Support\Facades\Route;

// ==================== PUBLIK ====================
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/tentang', [PublicController::class, 'about'])->name('about');

Route::prefix('warta-jemaat')->name('warta.')->group(function () {
    Route::get('/', [WartaController::class, 'index'])->name('index');
    Route::get('/{slug}', [WartaController::class, 'show'])->name('show');
    Route::get('/lampiran/{attachment}/baca', [WartaController::class, 'viewAttachment'])->name('view-attachment');
    Route::get('/lampiran/{attachment}/unduh', [WartaController::class, 'downloadAttachment'])->name('download-attachment');
});

Route::prefix('pedang-roh')->name('pedang-roh.')->group(function () {
    Route::get('/', [PedangRohController::class, 'index'])->name('index');
    Route::get('/{magazine}/baca', [PedangRohController::class, 'view'])->name('view');
    Route::get('/{magazine}/unduh', [PedangRohController::class, 'download'])->name('download');
});

// ==================== LOGIN ADMIN ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================== ADMIN (HANYA 2 FITUR CRUD) ====================
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.warta.index');
    })->name('dashboard');

    Route::resource('warta', AdminWartaController::class)
        ->except(['show'])
        ->parameters(['warta' => 'warta']);
    Route::resource('pedang-roh', AdminMagazineController::class)
        ->except(['show']);
});
