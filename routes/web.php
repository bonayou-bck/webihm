<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageVideoController;
use App\Http\Controllers\LanguageContentController;

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

// ===== TEMPLATE (exactly as provided) =====
// Route::view('/', 'dashboard')->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::view('/tentang', 'pages.tentang')->name('pages.tentang');
Route::view('/berita', 'pages.berita')->name('pages.berita');
Route::view('/keberlanjutan', 'pages.keberlanjutan')->name('pages.keberlanjutan');
Route::view('/fasilitas', 'pages.fasilitas')->name('pages.fasilitas');
Route::get('/sertifikat', [DashboardController::class, 'sertifikat'])->name('pages.sertifikat');
Route::get('/keberlanjutan', [DashboardController::class, 'keberlanjutan'])->name('pages.keberlanjutan');
Route::get('/berita-detail/{id}', [DashboardController::class, 'beritadetail'])->name('pages.berita-detail');
Route::get('/fasilitas', [DashboardController::class, 'fasilitas'])->name('pages.fasilitas');

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard'); 
    Route::get('/berita', 'berita')->name('berita'); 
});

Route::prefix('admin')->name('admin.')->group(function () {
  Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

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

// ===== OPTIONAL: Backend endpoints for create/edit/draft/reject (can coexist) =====
// Route::prefix('blog')->group(function () {
//     Route::post('/create', [BlogController::class, 'postCreate'])->name('admin.blog.create');
//     Route::get('/edit/{slugOrId}', [BlogController::class, 'edit'])->name('admin.blog.edit')->where('slugOrId','^[A-Za-z0-9-_]+$');
//     Route::post('/update/{id}', [BlogController::class, 'postUpdate'])->name('admin.blog.update')->whereNumber('id');
//     Route::get('/to-draft/{id}', [BlogController::class, 'toDraft'])->name('admin.blog.toDraft')->whereNumber('id');
//     Route::post('/reject/{id}', [BlogController::class, 'postReject'])->name('admin.blog.reject')->whereNumber('id');
//     Route::get('/history/{id?}', [BlogController::class, 'history'])->name('admin.blog.history')->whereNumber('id');
// });

// //Language Translation
// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
// // echo Hash::make('123');
// // Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

// //Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// // Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/linkstorage', function () {
  Artisan::call('storage:link');
});

// Route::get('/', function() {
//   return redirect('/home');
// });
// Route::get('/home', function() {
//   return redirect('/home');
// });
// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// dashboard


// blog
Route::prefix('blog')->group(function () {
  Route::controller(BlogController::class)->group(function () {
      Route::get('/', 'index');

      Route::get('/create', 'create');
      Route::post('/create', 'postCreate')->name('blog.create');
      Route::post('/update/{id?}', 'postCreate')
        ->where('id', '[0-9]+')
        ->name('blog.update');
      Route::get('/edit/{slug?}', 'edit')->where('slug', '^[a-z0-9-]*$');
      Route::post('/reject/{id?}', 'postReject')->where('id', '[0-9]+');
      Route::get('/to-draft/{id}', 'sendToDraft')->where('id', '[0-9]+');
      
      Route::middleware(['role:' . USER_ROLE_SUPER])->group(function () {
        Route::get('/categories', 'categories');
        Route::post('/categories/create', 'postCatCreate')->name('blog.category.create');
        Route::post('/categories/update/{id}', 'postCatCreate')
          ->where('id', '[0-9]+')
          ->name('blog.category.update');
  
        Route::get('/categories/delete/{id}', 'delete')
          ->where('id', '[0-9]+')
          ->name('blog.category.delete');
          
        Route::get('/approval', 'approval');

        Route::get('/history', 'history');
        Route::get('/history/{id?}', 'history')->where('id', '[0-9]+');
      });

  });
});

Route::middleware(['role:' . USER_ROLE_SUPER])->group(function () {

  // account
  Route::prefix('account')->group(function () {
    Route::controller(AccountController::class)->group(function () {
        // Route::get('/', function() {
        //   return abort(404);
        // });
        Route::get('/', 'index');
        Route::post('/create', 'postCreateEdit')->name('account.create');
        Route::post('/update/{id}', 'postCreateEdit')->where('id', '[0-9]+')->name('account.update');
        Route::post('/reset/{id}', 'postResetPassword')->where('id', '[0-9]+')->name('account.resetPassword');
        Route::get('/remove/{id}', 'remove')->where('id', '[0-9]+')->name('account.remove');
    });
  });

  // certificate
  Route::prefix('certificate')->group(function () {
    Route::controller(CertificateController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'postCreate')
          ->name('certificate.create');
        Route::get('/edit/{id?}', 'edit')->where('id', '[0-9]+');
        Route::post('/update/{id?}', 'postCreate')
          ->where('id', '[0-9]+')
          ->name('certificate.update');
        Route::get('/delete/{id}', 'toggleInactive')
          ->where('id', '[0-9]+')
          ->name('certificate.delete');
    });
  });
  
  // contact
  Route::prefix('contact')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'postCreate')->name('contact.add');
        Route::get('/edit/{id?}', 'edit')->where('id', '[0-9]+');
        Route::post('/update/{id?}', 'postCreate')
          ->where('id', '[0-9]+')
          ->name('contact.update');
        Route::get('/delete/{id?}', 'delete')->where('id', '[0-9]+')->name('contact.delete');
        Route::post('/social/update', 'postSocialUpdate')->name('contact.social.update');
        Route::get('/set/footer/{id?}/{state?}', 'setFooter')->where('id', '[0-9]+')->where('state', '[0-1]+');
    });
  });
  
  // language content
  Route::prefix('language-content')->group(function () {
    Route::controller(LanguageContentController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'postCreate')->name('lc.add');
        Route::get('/edit/{id?}', 'edit')->where('id', '[0-9]+');
        Route::post('/update/{id?}', 'postCreate')
          ->where('id', '[0-9]+')
          ->name('lc.update');
        Route::get('/delete/{id?}', 'delete')
          ->where('id', '[0-9]+')
          ->name('lc.delete');
    });
  });
  
  // image video
  Route::prefix('image-video')->group(function () {
    Route::controller(ImageVideoController::class)->group(function () {
        Route::get('/cover', 'cover');
        Route::post('/cover/upload', 'coverUpload')
          ->name('cover.upload');
        Route::get('/cover/remove/{id?}', 'coverRemove')
          ->where('id', '[0-9]+')
          ->name('cover.remove');
        
        Route::get('/slide', 'slide');
        Route::post('/slide/upload/{group_id?}', 'slideUpload')
          ->where('group_id', '[0-9]+')
          ->name('slide.upload');
        Route::get('/slide/remove/{id?}', 'slideRemove')
          ->where('id', '[0-9]+')
          ->name('slide.remove');
  
        Route::get('/certification-logo', 'certLogo');
        Route::post('/certification-logo/upload/{group_id?}', 'certLogoUpload')
          ->name('certlogo.upload');
        Route::get('/certification-logo/remove/{id?}', 'certLogoRemove')
          ->where('id', '[0-9]+')
          ->name('certlogo.remove');
        
        Route::get('/video', 'video');
        Route::post('/video/upload/{group_id}', 'videoUpload')
          ->where('group_id', '[0-9]+')
          ->name('video.upload');
        Route::post('/video/upload/update/{group_id}/{id}', 'videoUpload')
          ->where('group_id', '[0-9]+')
          ->where('id', '[0-9]+')
          ->name('video.upload.update');
        Route::get('/video/remove/{id?}', 'videoRemove')
          ->where('id', '[0-9]+')
          ->name('video.remove');
    });
  });

});

