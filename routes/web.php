<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageVideoController;
use App\Http\Controllers\LanguageContentController;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BeritaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::view('/tentang', 'pages.tentang')->name('pages.tentang');
Route::view('/berita', 'pages.berita')->name('pages.berita');
Route::view('/keberlanjutan', 'pages.keberlanjutan')->name('pages.keberlanjutan');
Route::view('/fasilitas', 'pages.fasilitas')->name('pages.fasilitas');
Route::get('/sertifikat', [DashboardController::class, 'sertifikat'])->name('pages.sertifikat');
Route::get('/keberlanjutan', [DashboardController::class, 'keberlanjutan'])->name('pages.keberlanjutan');
Route::get('/berita-detail/{id}', [DashboardController::class, 'beritadetail'])->name('pages.berita-detail');
Route::get('/fasilitas', [DashboardController::class, 'fasilitas'])->name('pages.fasilitas');

Route::controller(DashboardController::class)->group(function () { 
    Route::get('/berita', 'berita')->name('berita'); 
});

Route::prefix('admin')->name('admin.')->middleware(['auth','is_admin'])->group(function () {
  Route::get('/', [AdminController::class, 'index'])->name('dashboard');

  //berita resource routes
  Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
  Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita{id}');
  Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita{id}');
  Route::post('/berita-create', [BeritaController::class, 'store'])->name('berita-create');
  Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita-delete');

  // Sertifikat resource routes
  Route::get('/sertifikat', [\App\Http\Controllers\admin\SertifikatController::class, 'index'])->name('sertifikat');
  Route::get('/sertifikat/{id}', [\App\Http\Controllers\admin\SertifikatController::class, 'show'])->name('sertifikat{id}');
  Route::put('/sertifikat/{id}', [\App\Http\Controllers\admin\SertifikatController::class, 'update'])->name('sertifikat{id}');
  Route::post('/sertifikat-create', [\App\Http\Controllers\admin\SertifikatController::class, 'store'])->name('sertifikat-create');
  Route::delete('/sertifikat/{id}', [\App\Http\Controllers\admin\SertifikatController::class, 'destroy'])->name('sertifikat-delete');
  
  // Keberlanjutan resource routes
  Route::get('/keberlanjutan', [\App\Http\Controllers\admin\KeberlanjutanController::class, 'index'])->name('keberlanjutan');
  Route::get('/keberlanjutan/{id}', [\App\Http\Controllers\admin\KeberlanjutanController::class, 'show'])->name('keberlanjutan{id}');
  Route::put('/keberlanjutan/{id}', [\App\Http\Controllers\admin\KeberlanjutanController::class, 'update'])->name('keberlanjutan{id}');
  Route::post('/keberlanjutan-create', [\App\Http\Controllers\admin\KeberlanjutanController::class, 'store'])->name('keberlanjutan-create');
  Route::delete('/keberlanjutan/{id}', [\App\Http\Controllers\admin\KeberlanjutanController::class, 'destroy'])->name('keberlanjutan-delete');

  Route::get('/fasilitas', [\App\Http\Controllers\admin\FasilitasController::class, 'index'])->name('fasilitas');
  Route::get('/fasilitas/{id}', [\App\Http\Controllers\admin\FasilitasController::class, 'show'])->name('fasilitas{id}');
  Route::put('/fasilitas/{id}', [\App\Http\Controllers\admin\FasilitasController::class, 'update'])->name('fasilitas{id}');
  Route::post('/fasilitas-create', [\App\Http\Controllers\admin\FasilitasController::class, 'store'])->name('fasilitas-create');
  Route::delete('/fasilitas/{id}', [\App\Http\Controllers\admin\FasilitasController::class, 'destroy'])->name('fasilitas-delete');
});

Route::get('/linkstorage', function () {
  Artisan::call('storage:link');
});

Route::middleware('guest')->group(function () {
  Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
  // handle login form submit (AuthenticatesUsers trait)
  Route::post('/login', [LoginController::class, 'login']);
  Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
  Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
});

// logout route (hanya untuk user login)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
