<?php

use App\Http\Controllers\KategoriControrller;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserControrller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori', [KategoriControrller::class, 'index']);

Route::prefix('/user')->group(function () {
    Route::get('/', [UserControrller::class, 'index']);
    Route::get('/tambah', [UserControrller::class, 'tambah']);
    Route::post('/tambah_simpan', [UserControrller::class, 'tambah_simpan']);
    Route::get('/ubah/{id}', [UserControrller::class, 'ubah']);
    Route::put('/ubah_simpan/{id}', [UserControrller::class, 'ubah_simpan']);
    Route::get('/hapus/{id}', [UserControrller::class, 'hapus']);
});

Route::prefix('/kategori')->group(function () {
    Route::get('/', [KategoriControrller::class, 'index']);
    Route::get('/create', [KategoriControrller::class, 'create']);
    Route::post('/', [KategoriControrller::class, 'store']);
    Route::get('/edit/{id}', [KategoriControrller::class, 'edit'])->name('kategori.edit');
    Route::put('/update/{id}', [KategoriControrller::class, 'update'])->name('kategori.update');
    Route::get('/delete/{id}', [KategoriControrller::class, 'destroy'])->name('kategori.delete');
});

Route::prefix('/level')->group(function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
    Route::put('/update/{id}', [LevelController::class, 'update'])->name('level.update');
    Route::get('/delete/{id}', [LevelController::class, 'destroy'])->name('level.delete');
});

Route::resource('m_user', POSController::class);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
