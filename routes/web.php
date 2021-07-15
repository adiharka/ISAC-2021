<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// User
use App\Http\Controllers\AkunController;
use App\Http\Controllers\HomeController;
// Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MemberController;


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

Route::get('/', function () {
    return view('landing-page');
})->name('index');

// Route::get('index', function () {
//     return view('welcome');
// })->name('index');

Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {

    Route::group(['middleware' => 'admin'], function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

        // PESERTA
        Route::get('peserta', [MemberController::class, 'memberlist'])->name('memberlist');
        // Route::get('peserta/olimpiade', [MemberController::class, 'olimpiade'])->name('admin.member.olimpiade.index');
        // Route::get('peserta/poster', [MemberController::class, 'poster'])->name('admin.member.poster.index');

        // TEAM
        Route::get('tim', [TeamController::class, 'teamlist'])->name('teamlist');
        Route::get('tim/olimpiade', [TeamController::class, 'olimpiade'])->name('admin.team.olimpiade.index');
        Route::get('tim/poster', [TeamController::class, 'poster'])->name('admin.team.poster.index');
        Route::get('tim/detail/{id}', [TeamController::class, 'detail'])->name('teamdetail');
        Route::put('tim/verifikasi/{id}', [TeamController::class, 'verifikasi'])->name('admin.verifikasi');

        Route::get('home', function () {
            return redirect()->route('dashboard');
        });

    });

    Route::group(['middleware' => 'user'], function () {
        // Index
        Route::get('home', [HomeController::class, 'index'])->name('user.index');

        // Akun
        Route::resource('akun', AkunController::class)->names('user.akun');
        Route::get('password', [AkunController::class, 'pass'])->name('user.akun.password');
        Route::post('password', [AkunController::class, 'changePass'])->name('user.akun.updatePassword');
        Route::put('bayar', [AkunController::class, 'bayar'])->name('user.akun.bayar');

        // Kontak
        Route::get('kontak', function () {
            return view('user.kontak.index');
        })->name('user.kontak.index');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


    // Route::get('/{any}', function () {
    //     return redirect()->route('dashboard');
    //   })->where('any', '.*');
