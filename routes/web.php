<?php

use App\Http\Controllers\Cks;
use App\Http\Controllers\Home;
use App\Http\Controllers\Komunikasi;
use App\Http\Controllers\Layout;
use App\Http\Controllers\Wodesain;
use App\Http\Controllers\UserController;
use App\Models\Modelcks;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Layout::class, 'status'])->name('home')->middleware('auth');



Route::controller(Layout::class)->middleware('auth')->group(function () {
    Route::get('/layout/home', 'home');
    Route::get('/layout/home', 'status');
    Route::get('/layout/index', 'index');
    Route::get('/layout/report/grafik', 'grafik')->name('layout.grafik');
    Route::get('/layout/add', 'add', 'tgl_id')->name('layout.add');
    Route::get('/layout/add/internal', 'addin', 'tgl_id')->name('layout.addin');

    Route::get('/layout/all', 'all')->name('layout.all');
    Route::get('/layout/warning', 'lateptpp')->name('layout.lateptpp');
    Route::get('/layout/list/dari', 'dari')->name('layout.dari');
    Route::get('/layout/list/untuk', 'untuk')->name('layout.untuk');
    Route::get('/layout/list/cancel', 'cancel')->name('layout.cancel');
    Route::get('/layout/list/close', 'close')->name('layout.close');
    Route::get('/layout/list/unclose', 'unclose')->name('layout.unclose');
    Route::get('/layout/list/confirm', 'confirm')->name('layout.confirm');
    Route::get('/layout/list/confbm', 'confbm')->name('layout.confbm');
    Route::get('/layout/list/ditolak', 'ditolak')->name('layout.ditolak');
    Route::get('/layout/list/draft', 'draft')->name('layout.draft');

    Route::get('/confirm/{kode}', 'confirm_stat')->name('layout.confstat');
    Route::get('/close/{kode}', 'close_stat')->name('layout.closestat');
    Route::get('/terima/{kode}', 'terima_stat')->name('layout.terimastat');
    Route::get('/confbm/{kode}', 'confbm_stat')->name('layout.confbmstat');
    Route::post('/tolak/{kode}', 'tolak_stat')->name('layout.tolakstat');
    Route::post('/cancel/{kode}', 'cancel_stat')->name('layout.cancelstat');

    Route::get('/layout/detail/{kode}', 'detail')->name('layout.detail');
    Route::get('/layout/detail/edit/{kode}', 'edit', 'tgl_id')->name('layout.edit');
    Route::get('/layout/detail/revisi/{kode}', 'revisi', 'tgl_id')->name('layout.revisi');

    Route::get('/layout/galeri/foto', 'foto')->name('layout.foto');
    Route::get('/layout/galeri/video', 'video')->name('layout.video');
    Route::get('/layout/galeri/pdf', 'pdf')->name('layout.pdf');

    Route::post('addptpp', [Layout::class, 'addptpp_action'])->name('addptpp.action');
    Route::post('editptpp', [Layout::class, 'editptpp_action'])->name('editptpp.action');
    Route::post('revisiptpp', [Layout::class, 'revisiptpp_action'])->name('revisiptpp.action');
});

Route::controller(Komunikasi::class)->middleware('auth')->group(function () {
    Route::get('/komunikasi/dashboard', 'home')->name('komunikasi.home');
    Route::get('/komunikasi/add/internal', 'addinternal')->name('add.internal');
    Route::get('/komunikasi/add/eksternal', 'addeksternal')->name('add.eksternal');
    Route::get('/komunikasi/list/internal', 'internal')->name('list.internal');
    Route::get('/komunikasi/list/eksternal', 'eksternal')->name('list.eksternal');


    Route::post('addkomint', 'addkomint_action')->name('addkomint.action');
    Route::post('addkomeks', 'addkomeks_action')->name('addkomeks.action');
});

Route::controller(Home::class)->middleware('auth')->group(function () {
    Route::get('/home/index', 'index');
    Route::get('/home/tambah', 'add');
    Route::get('/home/profile', 'profile');
    Route::get('/home/datasoft', 'datasoft');
    Route::post('/home/simpan', 'save');
    Route::get('/home/edit/{id}', 'edit');
    // Route::put('/home/update', 'update');
    Route::delete('/home/hapus/{id}', 'hapus');

    Route::get('/home/restore/{id}', 'restore');
    Route::delete('/home/forceDelete/{id}', 'forceDelete');
});

Route::controller(UserController::class,)->middleware('guest')->group(function () {
    // Route::get('register', 'register')->name('register');
    // Route::post('register', 'register_action')->name('register.action');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'login_action')->name('login.action');
});
Route::get('password', [UserController::class, 'password'])->middleware('auth')->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('user/profile', [UserController::class, 'user_profile'])->name('user_profile');
Route::post('user/profile/update', [UserController::class, 'update_profile'])->name('update_profile');

//log-viewers
Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::post('import', [Layout::class, 'import'])->name('import');
Route::get('export', [Layout::class, 'export'])->name('export');

Route::group(['middleware' => 'wodesain'], function () {
    Route::controller(Wodesain::class)->middleware('auth')->group(function () {
        Route::get('/wodesain', 'home')->name('wodesain.home');
        Route::get('/wodesain/home', 'home')->name('wodesain.home');
        Route::get('/wodesain/add/desain', 'add')->name('wodesain.add.desain');
        Route::get('/wodesain/add/ukuran', 'addukuran')->name('wodesain.add.ukuran');
        Route::post('addwo', 'addwo_action')->name('addwo.action');
        Route::get('/wodesain/list/wodesain', 'wodesain')->name('wodesain');
        Route::get('/wodesain/list/woukuran', 'woukuran')->name('woukuran');
        Route::get('/wodesain/desain/detail/{id}', 'desaindetail')->name('desaindetail');
        Route::get('/wodesain/masterdesain', 'masterdesain')->name('masterdesain');
        Route::delete('/wodesain/masterdesain/hapus/{id}', 'hapus_masterdesain');
        Route::get('/wodesain/masterdesain/update/{id}', 'update_masterdesain');
        Route::post('/wodesain/masterdesain/update/action', 'update_action')->name('update.action');
        Route::get('/wodesain/masterdesain/hapus', 'masterdesainhapus')->name('masterdesain.hapus');
        Route::get('/wodesain/masterdesain/restore/{id}', 'restore');
    });
});

Route::group(['middleware' => 'cks'], function () {
    Route::controller(Cks::class)->middleware('auth')->group(function () {
        Route::get('/cks', 'home')->name('cks.home');
        Route::get('/cks/dashboard', 'home')->name('cks.home');
    });
});
