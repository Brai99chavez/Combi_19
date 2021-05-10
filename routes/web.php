<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ViajesController;
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

//ADMIN

Route::get('homeadmin', [AdminController::class,'homeadmin'])->name('homeadmin');

Route::get('createviaje',[ViajesController::class,'createviaje'])->name(('createviaje'));

Route::post('createviajeshow',[ViajesController::class,'showviaje'])->name(('createviajeshow'));

Route::get('homeviajes',[ViajesController::class,'homeviajes'])->name(('homeviajes'));

Route::get('updateviajes',[ViajesController::class,'updateviajes'])->name(('updateviajes'));

Route::get('deleteviajes',[ViajesController::class,'deleteviajes'])->name(('deleteviajes'));

//USUARIO
Route::post('auth',[userController::class,'autenticacion'])->name('autenticacion');

Route::get('home', [userController::class,'homeUser'])->name('homeUser');

