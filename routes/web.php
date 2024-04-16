<?php

use App\Http\Controllers\KategoriControrller;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserControrller;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/kategori', [KategoriControrller::class, 'index']);

Route::prefix('/user')->group(function () {
    Route::get('/', [UserControrller::class, 'index']);
    Route::post('/list', [UserControrller::class, 'list']);
    Route::get('/create', [UserControrller::class, 'create']);
    Route::post('/', [UserControrller::class, 'store']);
    Route::get('/{id}', [UserControrller::class, 'show']);
    Route::get('/{id}/edit', [UserControrller::class, 'edit']);
    Route::put('/{id}', [UserControrller::class, 'update']);
    Route::delete('/{id}', [UserControrller::class, 'destroy']);
});

Route::prefix('/kategori')->group(function () {
    Route::get('/', [KategoriControrller::class, 'index']);
    Route::get('/create', [KategoriControrller::class, 'create']);
    Route::post('/', [KategoriControrller::class, 'store']);
    Route::get('/edit/{id}', [KategoriControrller::class, 'edit'])->name('kategori.edit');
    Route::put('/update/{id}', [KategoriControrller::class, 'update'])->name('kategori.update');
    Route::get('/delete/{id}', [KategoriControrller::class, 'destroy'])->name('kategori.delete');
});

Route::resource('level', LevelController::class);
Route::post('/level/list', [LevelController::class, 'list']);

Route::resource('m_user', POSController::class);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
