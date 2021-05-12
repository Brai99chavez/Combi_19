<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChoferesController;
use App\Http\Controllers\CombisController;
use App\Http\Controllers\InsumosController;
use App\Http\Controllers\MembresiasController;
use App\Http\Controllers\publicController;
use App\Http\Controllers\ViajesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;


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

Route::get('/',[publicController::class,'publicHome'])->name('/');


Route::get('login', [publicController::class,'login'])->name('login');

Route::get('register', [publicController::class,'register'])->name('register');

Route::post('save_register',[RegisterController::class,'saveFormRegister'])->name('saveRegister');

Route::post('auth',[AuthController::class,'autenticacion'])->name('autenticacion');

Route::get('logOut', [AuthController::class,'logOut'])->name('logOut');

//ADMIN

        //ADMIN - VIAJES
Route::get('home_admin', [AdminController::class,'homeadmin'])->name('homeadmin');

Route::get('create_viaje',[ViajesController::class,'createviaje'])->name(('createviaje'));

Route::post('show_viaje',[ViajesController::class,'showviaje'])->name(('createviajeshow'));

Route::get('home_viajes',[ViajesController::class,'homeviajes'])->name(('homeviajes'));

Route::post('update_viajes',[ViajesController::class,'updateviajes'])->name(('updateviajes'));

Route::post('delete_viajes',[ViajesController::class,'deleteviajes'])->name(('deleteviajes'));
        //ADMIN - INSUMOS
Route::get('home_insumos',[InsumosController::class,'homeinsumos'])->name(('homeinsumos'));

Route::post('update_insumos',[InsumosController::class,'updateinsumos'])->name(('updateinsumos'));

Route::post('delete_insumos',[InsumosController::class,'deleteinsumos'])->name(('deleteinsumos'));

Route::post('show_insumo',[InsumosController::class,'showinsumo'])->name(('createinsumoshow'));

Route::get('create_insumo',[InsumosController::class,'createinsumo'])->name(('createinsumo'));
        //ADMIN - MEMBRESIAS
Route::get('home_membresias',[MembresiasController::class,'homemembresias'])->name(('homemembresias'));

Route::post('update_membresias',[MembresiasController::class,'updatemembresias'])->name(('updatemembresias'));

Route::post('update_membresias_process',[MembresiasController::class,'updatemembresiasprocess'])->name(('updatemembresiasprocess'));

        //ADMIN - CHOFERES
Route::get('home_choferes',[ChoferesController::class,'homechoferes'])->name(('homechoferes'));
        //ADMIN - COMBIS
Route::get('home_combis',[CombisController::class,'homecombis'])->name(('homecombis'));


//USUARIO

Route::get('home', [userController::class,'homeUser'])->name('homeUser');
