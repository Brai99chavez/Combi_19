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

Route::get('registerEleccion', [publicController::class,'registerEleccion'])->name('registerEleccion');

Route::get('registerGolden', [publicController::class,'registerGolden'])->name('registerGolden');

Route::post('guardarRegistro',[RegisterController::class,'guardarRegistro'])->name('guardarRegistro');

Route::post('guardarRegistroGolden',[publicController::class,'guardarRegistroGolden'])->name('guardarRegistroGolden');

Route::post('auth',[AuthController::class,'autenticacion'])->name('autenticacion');

Route::get('logOut', [AuthController::class,'logOut'])->name('logOut');

//ADMIN
        //ADMIN - CIUDADES

Route::get('home_ciudades', [ciudadesController::class,'showCiudades'])->name('homeciudades');

Route::get('create_ciudad', [ciudadesController::class,'createciudades'])->name('createciudad');

Route::post('create_ciudad_process', [ciudadesController::class,'createciudadesprocess'])->name('createciudadprocess');

Route::post('update_ciudad',[ciudadesController::class,'updateCiudad'])->name(('updateciudad'));

Route::post('update_ciudad_process',[ciudadesController::class,'updateCiudadProcess'])->name(('updateciudadprocess'));

Route::post('delete_ciudad',[ciudadesController::class,'deleteCiudad'])->name(('deleteciudad'));

        //ADMIN - VIAJES
Route::get('home_admin', [AdminController::class,'homeadmin'])->name('homeadmin');

Route::get('create_viaje',[ViajesController::class,'createviaje'])->name(('createviaje'));

Route::post('working',[ViajesController::class,'createviajeprocess'])->name(('createviajeprocess'));

Route::get('home_viajes',[ViajesController::class,'homeviajes'])->name(('homeviajes'));

Route::get('update_viajes',[ViajesController::class,'updateviajes'])->name(('updateviajes'));

Route::post('update_viajes_process',[ViajesController::class,'updateviajesprocess'])->name(('updateviajesprocess'));

Route::post('delete_viajes',[ViajesController::class,'deleteviajes'])->name(('deleteviajes'));

Route::get('insumosviaje_edit',[ViajesController::class,'editinsumosviaje'])->name(('insumosviaje_edit'));

Route::post('insumosviaje_processing',[ViajesController::class,'editinsumosviaje_process'])->name(('insumosviaje.edit.process'));

Route::get('viaje_validation',[ViajesController::class,'filtrardatosviaje'])->name(('filtrardatosviaje'));

Route::post('createviajeprocess_insumos',[ViajesController::class,'createviajeprocess_insumos'])->name(('createviajeprocess_insumos'));

Route::post('addInsumos',[ViajesController::class,'addInsumos'])->name(('addInsumos'));

Route::post('addInsumos_process',[ViajesController::class,'addInsumos_process'])->name(('addInsumos.process'));



        //ADMIN - INSUMOS
Route::get('home_insumos',[InsumosController::class,'homeinsumos'])->name(('homeinsumos'));

Route::post('update_insumos',[InsumosController::class,'updateinsumos'])->name(('updateinsumos'));  

Route::post('update_insumos1',[InsumosController::class,'updateinsumos1'])->name(('updateinsumos1'));  

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

Route::get('update_empleado',[empleadosController::class,'updateEmp'])->name(('updateEmp'));

Route::post('save_empleado',[empleadosController::class,'saveEmp'])->name(('saveEmp'));

Route::post('delete_empleado',[empleadosController::class,'deleteEmp'])->name(('deleteEmp'));

Route::get('empleados',[empleadosController::class,'showEmp'])->name(('homeEmp'));
        
        //ADMIN - COMBIS
Route::get('combis',[CombisController::class,'homecombis'])->name(('homecombis'));

Route::get('create_combi',[CombisController::class,'createcombis'])->name(('createcombis'));

Route::post('create_combi_process',[CombisController::class,'createcombisprocess'])->name(('createcombisprocess'));

Route::post('update_combi',[CombisController::class,'updateCombi'])->name(('updatecombi'));

Route::post('update_combi_process',[CombisController::class,'updateCombiProcess'])->name(('updatecombiprocess'));

Route::post('delete_combi',[CombisController::class,'deleteCombi'])->name(('deleteCombi'));

//USUARIO

Route::get('home', [userController::class,'homeUser'])->name('homeUser');
            
Route::get('editarPerfilCliente', [userController::class,'editarPerfilCliente'])->name('editarPerfilCliente');

Route::post('saveCli', [RegisterController::class,'saveCli'])->name('saveCli');
