<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChoferesController;
use App\Http\Controllers\CombisController;
use App\Http\Controllers\InsumosController;
use App\Http\Controllers\MembresiasController;
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

        //ADMIN - VIAJES
Route::get('homeadmin', [AdminController::class,'homeadmin'])->name('homeadmin');

Route::get('createviaje',[ViajesController::class,'createviaje'])->name(('createviaje'));

Route::post('viajeshow',[ViajesController::class,'showviaje'])->name(('createviajeshow'));

Route::get('homeviajes',[ViajesController::class,'homeviajes'])->name(('homeviajes'));

Route::get('updateviajes/{id_viaje}',[ViajesController::class,'updateviajes'])->name(('updateviajes'));

Route::get('deleteviajes',[ViajesController::class,'deleteviajes'])->name(('deleteviajes'));

/////////////////////////////////////////////////////////////////////////////////////////////////////////
        //ADMIN - INSUMOS
Route::get('homeinsumos',[InsumosController::class,'homeinsumos'])->name(('homeinsumos'));

Route::get('updateinsumos/{id_insumo}',[InsumosController::class,'updateinsumos'])->name(('updateinsumos'));

Route::get('deleteinsumos/{id_insumo}',[InsumosController::class,'deleteinsumos'])->name(('deleteinsumos'));

Route::post('insumoshow',[InsumosController::class,'showinsumo'])->name(('createinsumoshow'));

Route::get('createinsumo',[InsumosController::class,'createinsumo'])->name(('createinsumo'));
/////////////////////////////////////////////////////////////////////////////////////////////////////////
        //ADMIN - MEMBRESIAS
Route::get('homemembresias',[MembresiasController::class,'homemembresias'])->name(('homemembresias'));
/////////////////////////////////////////////////////////////////////////////////////////////////////////
        //ADMIN - CHOFERES
Route::get('homechoferes',[ChoferesController::class,'homechoferes'])->name(('homechoferes'));
/////////////////////////////////////////////////////////////////////////////////////////////////////////
        //ADMIN - COMBIS
Route::get('homecombis',[CombisController::class,'homecombis'])->name(('homecombis'));
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//USUARIO
Route::post('auth',[userController::class,'autenticacion'])->name('autenticacion');

Route::get('home', [userController::class,'homeUser'])->name('homeUser');

