<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\StudentsController;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegistrasiController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

// Route::get('/', function () {
//     return view('/home');
// });

Route::get('/registrasi', [RegistrasiController::class, 'registrasiUser'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'registrasiUserPost']);
Route::get('/admin/register', [RegistrasiController::class, 'registrasiAdmin'])->middleware('auth');
Route::post('/admin/register', [RegistrasiController::class, 'registrasiAdminPost'])->middleware('auth');
Route::get('/', [UserController::class, 'index']);
Route::get('/login', [UserController::class, 'index'])->middleware('guest');
Route::post('/login', [UserController::class, 'store'])->name('login');
Route::post('/logout', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/home', [StudentsController::class, 'index'])->middleware('auth');
Route::get('/student', [StudentsController::class, 'index'])->middleware('auth');
Route::get('/student/create', [StudentsController::class, 'create'])->middleware('auth');
Route::post('/student/create', [StudentsController::class, 'store'])->middleware('auth');
Route::get('/student/{student}', [StudentsController::class, 'show'])->middleware('auth');
Route::delete('/student/{student}', [StudentsController::class, 'destroy'])->middleware('auth');
Route::get('/student/{student}/edit', [StudentsController::class, 'edit'])->middleware('auth');
Route::put('/student/{student}', [StudentsController::class, 'update'])->middleware('auth');
Route::post('/student/{student}', [StudentsController::class, 'updateStatus'])->middleware('auth');

//registrasi

//UNTUK MAHASISWA
Route::get('/mahasiswa', [StudentsController::class, 'mahasiswa'])->middleware('auth');
Route::get('/mahasiswa/show', [StudentsController::class, 'daftarMhs'])->middleware('auth')->name('Daftar-Mahasiswa');
Route::get('/mahasiswa/create', [StudentsController::class, 'daftarShow'])->middleware('auth');
Route::post('/mahasiswa/create', [StudentsController::class, 'daftarPost'])->middleware('auth');


// Rute untuk mengirim email reset password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Rute untuk reset password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//Route::get('/reset-password/{token}', [ResetPasswordController::class, 'credentials'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
