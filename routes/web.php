<?php

use App\Http\Controllers\KategoriControrller;
use App\Http\Controllers\LevelController;
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

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriControrller::class, 'index']);
Route::get('/user', [UserControrller::class, 'index']);
Route::get('/user/tambah', [UserControrller::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserControrller::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserControrller::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserControrller::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserControrller::class, 'hapus']);
