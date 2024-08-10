<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisProduksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PukController;
use App\Http\Controllers\UserController;

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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login/auth', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register/store', [LoginController::class, 'registerStore'])->name('register.store');

Route::group(['middleware' => 'auth'], function () {
  // home
  Route::get('home', [HomeController::class, 'index'])->name('home');
  Route::get('home/{id}/getPuk', [HomeController::class, 'getPuk'])->name('home.get_puk');
  Route::get('home/create', [HomeController::class, 'create'])->name('home.create');
  Route::get('home/{id}/dataPuk', [HomeController::class, 'dataPuk'])->name('home.dataPuk');
  Route::post('home/store', [HomeController::class, 'store'])->name('home.store');
  Route::get('home/{id}/show', [HomeController::class, 'show'])->name('home.show');
  Route::get('home/{id}/edit', [HomeController::class, 'edit'])->name('home.edit');
  Route::put('home/{id}/update', [HomeController::class, 'update'])->name('home.update');

  // logout
  Route::post('login/logout', [LoginController::class, 'logout'])->name('logout');

  // puk
  Route::get('puk', [PukController::class, 'index'])->name('puk');
  Route::get('puk/create', [PukController::class, 'create'])->name('puk.create');
  Route::post('puk/store', [PukController::class, 'store'])->name('puk.store');
  Route::get('puk/{id}/edit', [PukController::class, 'edit'])->name('puk.edit');
  Route::put('puk/{id}/update', [PukController::class, 'update'])->name('puk.update');
  Route::get('puk/{id}/delete', [PukController::class, 'delete'])->name('puk.delete');

  // jenis produksi
  Route::get('jenisProduksi', [JenisProduksiController::class, 'index'])->name('jenisProduksi');
  Route::get('jenisProduksi/create', [JenisProduksiController::class, 'create'])->name('jenisProduksi.create');
  Route::post('jenisProduksi/store', [JenisProduksiController::class, 'store'])->name('jenisProduksi.store');
  Route::get('jenisProduksi/{id}/edit', [JenisProduksiController::class, 'edit'])->name('jenisProduksi.edit');
  Route::put('jenisProduksi/{id}/update', [JenisProduksiController::class, 'update'])->name('jenisProduksi.update');
  Route::get('jenisProduksi/{id}/delete', [JenisProduksiController::class, 'delete'])->name('jenisProduksi.delete');

  // laporan
  Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');
  Route::get('laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
  Route::get('laporan/{id}/dataPuk', [LaporanController::class, 'dataPuk'])->name('laporan.dataPuk');
  Route::post('laporan/store', [LaporanController::class, 'store'])->name('laporan.store');
  Route::get('laporan/{id}/print', [LaporanController::class, 'print'])->name('laporan.print');
  Route::get('laporan/{id}/show', [LaporanController::class, 'show'])->name('laporan.show');
  Route::get('laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
  Route::put('laporan/{id}/update', [LaporanController::class, 'update'])->name('laporan.update');
  Route::get('laporan/{id}/delete', [LaporanController::class, 'delete'])->name('laporan.delete');
});
