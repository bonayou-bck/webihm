<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ContactSocialController;
use App\Http\Controllers\Api\LangController;
use App\Http\Controllers\Api\LiveInController;
use App\Http\Controllers\Api\MiscController;
use App\Http\Controllers\Api\VideoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('blog')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        // get blog list (paginated)
        Route::get('/{page?}', 'index')->where('page', '[0-9]+');
        // get blog list (filtered: year or category or both) (paginated)
        Route::get('/filter/{page?}', 'indexFiltered')->where('page', '[0-9]+');
        // get blog single
        Route::get('/article/{slug}', 'indexSlug')->where('slug', '^[a-z0-9-]*$');
        // get blog last 3
        Route::get('/highlight', 'indexHighlight');
        // get blog category list
        Route::get('/categories', 'indexCategories');
        // get blog year list
        Route::get('/years', 'indexYears');
    });
});

Route::prefix('lang')->group(function () {
    Route::controller(LangController::class)->group(function () {
        Route::post('/get', 'postGet')->middleware('only.json');
        Route::post('/add', 'postInsert');
        Route::post('/add/json', 'postInsertJson')->middleware('only.json');
        Route::patch('/update', 'patchEdit')->middleware('only.json');
        Route::delete('/delete/{langid?}', 'delete')->where('langid', '^[a-z0-9-]*$');
    });
});

Route::prefix('contact')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        // get contact list
        Route::get('/{footer?}', 'index');
        Route::get('/social', 'getContactSocial');
        // get selected contact (filter by name)
        // ??
        // add contact
        Route::post('/add', 'postInsert')->middleware('only.json');
        Route::patch('/update', 'patchEdit')->middleware('only.json');
        Route::delete('/delete', 'delete')->middleware('only.json');
    });
});

Route::prefix('social')->group(function () {
    Route::controller(ContactSocialController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/add', 'postInsert')->middleware('only.json');
        Route::patch('/update', 'patchEdit')->middleware('only.json');
    });
});

Route::prefix('certificate')->group(function () {
    Route::controller(CertificateController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/{id?}', 'index')->where('id', '^[a-z0-9-]*$');
        Route::post('/add', 'postInsert');
        Route::post('/add/json', 'postInsertJson')->middleware('only.json');
        Route::patch('/update', 'patchEdit')->middleware('only.json');
        Route::delete('/delete/{langid?}', 'delete')->where('langid', '^[a-z0-9-]*$');
    });
});

Route::prefix('livein')->group(function () {
    Route::controller(LiveInController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/{id?}', 'index')->where('id', '^[a-z0-9-]*$');
        Route::post('/add', 'postInsert');
        Route::post('/add/json', 'postInsertJson')->middleware('only.json');
        Route::patch('/update', 'patchEdit')->middleware('only.json');
        Route::delete('/delete/{langid?}', 'delete')->where('langid', '^[a-z0-9-]*$');
    });
});

Route::prefix('video')->group(function () {
    Route::controller(VideoController::class)->group(function () {
        Route::get('/home', 'home');
        Route::get('/career', 'career');
    });
});

Route::prefix('misc')->group(function () {
    Route::controller(MiscController::class)->group(function () {
        Route::get('/cover/{type}', 'getCover')->where('type', '^[a-z0-9-]*$');
        Route::get('/cl', 'getCertificationLogo');
        // 
        Route::get('/sl/home', 'getSlideHome');
        Route::get('/sl/sustainability', 'getSlideSustain');
    });
});

// get certificate list (paginated)
// get certificate logo (with max logo 6)

// get live in people (all)

// key value:
// get about
// get vision
// get mission
// get objective
