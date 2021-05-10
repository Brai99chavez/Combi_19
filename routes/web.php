<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\userController;

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


//PUBLICO
Route::get('/', [publicController::class,'publicHome']);

Route::get('login', [publicController::class,'login'])->name('login');

Route::get('register', [publicController::class,'register'])->name('register');

Route::post('saveRegister',[publicController::class,'saveFormRegister'])->name('saveRegister');

//USUARIO
Route::post('auth',[userController::class,'autenticacion'])->name('autenticacion');
Route::get('home', [userController::class,'homeUser'])->name('homeUser');

//ADMIN

Route::get('homeadmin', [AdminController::class,'homeadmin'])->name('homeadmin');