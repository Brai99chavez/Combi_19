<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CombisController;
use App\Http\Controllers\InsumosController;
use App\Http\Controllers\MembresiasController;
use App\Http\Controllers\publicController;
use App\Http\Controllers\ViajesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ciudadesController;
use App\Http\Controllers\empleadosController;
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
        //ADMIN - CIUDADES

Route::get('home_ciudades', [ciudadesController::class,'showCiudades'])->name('homeciudades');
        //ADMIN - VIAJES
Route::get('home_admin', [AdminController::class,'homeadmin'])->name('homeadmin');

Route::get('create_viaje',[ViajesController::class,'createviaje'])->name(('createviaje'));

Route::post('show_viaje',[ViajesController::class,'createviajeprocess'])->name(('createviajeshow'));

Route::get('home_viajes',[ViajesController::class,'homeviajes'])->name(('homeviajes'));

Route::post('update_viajes',[ViajesController::class,'updateviajes'])->name(('updateviajes'));

Route::post('update_viajes1', [ViajesController::class,'updateviajes1'])->name('updateviajes1');


Route::post('delete_viajes',[ViajesController::class,'deleteviajes'])->name(('deleteviajes'));

Route::post('cargando_insumos',[ViajesController::class,'createviajeprocess_insumos'])->name(('createviajeprocess_insumos'));

        //ADMIN - INSUMOS
Route::get('home_insumos',[InsumosController::class,'homeinsumos'])->name(('homeinsumos'));

Route::post('update_insumos',[InsumosController::class,'updateinsumos'])->name(('updateinsumos'));

Route::post('update_insumo1', [InsumosController::class,'updateinsumos1'])->name(('updateinsumos1'));   

Route::post('delete_insumos',[InsumosController::class,'deleteinsumos'])->name(('deleteinsumos'));

Route::post('show_insumo',[InsumosController::class,'showinsumo'])->name(('createinsumoshow'));

Route::get('create_insumo',[InsumosController::class,'createinsumo'])->name(('createinsumo'));

       //ADMIN - MEMBRESIAS
Route::get('home_membresias',[MembresiasController::class,'homemembresias'])->name(('homemembresias'));

Route::post('update_membresias',[MembresiasController::class,'updatemembresias'])->name(('updatemembresias'));

Route::post('update_membresias_process',[MembresiasController::class,'updatemembresiasprocess'])->name(('updatemembresiasprocess'));

        //ADMIN - EMPLEADOS
Route::get('create_empleado',[empleadosController::class,'createEmp'])->name(('createEmp'));

Route::post('save_register',[empleadosController::class,'saveReg'])->name('saveRegister');

Route::post('update_empleado',[empleadosController::class,'updateEmp'])->name(('updateEmp'));

Route::post('save_empleado',[empleadosController::class,'saveEmp'])->name(('saveEmp'));

Route::post('delete_empleado',[empleadosController::class,'deleteEmp'])->name(('deleteEmp'));

Route::get('empleados',[empleadosController::class,'showEmp'])->name(('homeEmp'));
        //ADMIN - COMBIS
Route::get('combis',[CombisController::class,'homecombis'])->name(('homecombis'));

Route::get('create_combi',[CombisController::class,'createcombis'])->name(('createcombis'));

Route::post('create_combi_process',[CombisController::class,'createcombisprocess'])->name(('createcombisprocess'));

Route::post('update_combi',[CombisController::class,'updateCombi'])->name(('updatecombi'));

Route::post('update_combi_process',[CombisController::class,'updateCombiProcess'])->name(('updatecombiprocess'));

//USUARIO

Route::get('home', [userController::class,'homeUser'])->name('homeUser');
