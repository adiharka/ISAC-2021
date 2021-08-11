<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// User
use App\Http\Controllers\AkunController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SoalController;
// Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminSoalController;
use App\Http\Controllers\AdminJawabanController;


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
        Route::get('tim/olimpiade/{id}', [TeamController::class, 'showOlim'])->name('admin.team.olimpiade.show');
        Route::get('tim/poster', [TeamController::class, 'poster'])->name('admin.team.poster.index');
        Route::get('tim/detail/{id}', [TeamController::class, 'detail'])->name('teamdetail');
        Route::put('tim/verifikasi/{id}', [TeamController::class, 'verifikasi'])->name('admin.verifikasi');

        // SOAL
        // Route::get('jawaban', [AdminSoalController::class, 'index'])->name('admin.jawaban.index');
        Route::get('soal', [AdminSoalController::class, 'index'])->name('admin.soal.index');
        Route::get('soal/{id}', [AdminSoalController::class, 'show'])->name('admin.soal.show');
        Route::put('soal/{id}', [AdminSoalController::class, 'edit'])->name('admin.soal.edit');
        Route::get('calculate/{id}', [AdminSoalController::class, 'calculate'])->name('admin.soal.calculate');

        // JAWABAN
        Route::get('jawaban', [AdminJawabanController::class, 'index'])->name('admin.answer.index');
        Route::get('jawaban/{id}', [AdminJawabanController::class, 'show'])->name('admin.answer.show');

        Route::get('home', function () {
            return redirect()->route('dashboard');
        });
    });

    Route::group(['middleware' => 'user'], function () {
        // INDEX
        Route::get('home', [HomeController::class, 'index'])->name('user.index');

        // AKUN
        Route::resource('akun', AkunController::class)->names('user.akun');
        Route::get('password', [AkunController::class, 'pass'])->name('user.akun.password');
        Route::post('password', [AkunController::class, 'changePass'])->name('user.akun.updatePassword');
        Route::put('bayar', [AkunController::class, 'bayar'])->name('user.akun.bayar');

        // SOAL
        Route::get('attempt/{id}', [SoalController::class, 'attempt'])->name('user.soal.attempt');
        Route::get('detail/{id}', [SoalController::class, 'detail'])->name('user.soal.detail');
        Route::get('take/{id}', [SoalController::class, 'take'])->name('user.soal.take');
        Route::get('end/{id}', [SoalController::class, 'end'])->name('user.soal.end');
        Route::get('attempt/{id}/{no}', [SoalController::class, 'show'])->name('user.soal.show');
        Route::put('attempt/{id}/{update}/{show}', [SoalController::class, 'update'])->name('user.soal.update');

        // KONTAK
        Route::get('kontak', function () {
            return view('user.kontak.index');
        })->name('user.kontak.index');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


    // Route::get('/{any}', function () {
    //     return redirect()->route('dashboard');
    //   })->where('any', '.*');
