<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\practicascontroller;
use App\Http\Controllers\mascotascontroller;
use App\Http\Controllers\ventascontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\empleadoscontroller;
use App\Mail\notificacion;

Route::get('/', function () 
{
    return view('welcome');
});

Route::get('vista1', [practicascontroller::class, 'vista1']);
Route::get('vista2', [practicascontroller::class, 'vista2']);
Route::get('vista3', [practicascontroller::class, 'vista3']);

Route::get('altamascotas', [mascotascontroller::class, 'altamascotas'])->name('altamascotas'); //mascotas
Route::POST('guardamascota', [mascotascontroller::class, 'guardamascota'])->name('guardamascota');  //mascotas
Route::get('reportemascota', [mascotascontroller::class, 'reportemascota'])->name('reportemascota');  //mascotas
Route::get('editamascota/{idma}', [mascotascontroller::class, 'editamascota'])->name('editamascota');  //mascotas
Route::get('inicio', [logincontroller::class, 'inicio'])->name('inicio');
Route::POST('guardacambios', [mascotascontroller::class, 'guardacambios'])->name('guardacambios');  //mascotas
Route::get('desactivamascota/{idma}', [mascotascontroller::class, 'desactivamascota'])->name('desactivamascota');  //mascotas
Route::get('activamascota/{idma}', [mascotascontroller::class, 'activamascota'])->name('activamascota');
Route::get('eliminamascota/{idma}', [mascotascontroller::class, 'eliminamascota'])->name('eliminamascota');
Route::get('login', [logincontroller::class, 'login'])->name('login');
Route::POST('validar', [logincontroller::class, 'validar'])->name('validar');
Route::get('cerrarsesion', [logincontroller::class, 'cerrarsesion'])->name('cerrarsesion');
Route::get('crearventa', [ventascontroller::class, 'crearventa'])->name('crearventa');
Route::get('infocliente', [ventascontroller::class, 'infocliente'])->name('infocliente');
Route::get('infoproducto', [ventascontroller::class, 'infoproducto'])->name('infoproducto');
Route::get('detalleproducto', [ventascontroller::class, 'detalleproducto'])->name('detalleproducto');
Route::get('infodesc', [ventascontroller::class, 'infodesc'])->name('infodesc');
Route::get('agregaelemento', [ventascontroller::class, 'agregaelemento'])->name('agregaelemento');
Route::get('reporteventas', [ventascontroller::class, 'reporteventas'])->name('reporteventas');
Route::get('editaventa/{idven}', [ventascontroller::class, 'editaventa'])->name('editaventa');
Route::get('borraventas', [ventascontroller::class, 'borraventas'])->name('borraventas');




Route::get('altadisco', [dianacontroller::class, 'altadisco'])->name('altadisco');
Route::POST('guardadisco', [dianacontroller::class, 'guardadisco'])->name('guardadisco');


Route::get('altajuegos', [dianacontroller::class, 'altajuegos'])->name('altajuegos');
Route::POST('guardajuego', [dianacontroller::class, 'guardajuego'])->name('guardajuego');

Route::get('reporteprod', [dianacontroller::class, 'reporteprod'])->name('reporteprod'); 
Route::get('editaproducto/{idp}', [dianacontroller::class, 'editaproducto'])->name('editaproducto'); 


Route::get('altaemp', [empleadoscontroller::class, 'altaemp'])->name('altaemp');
Route::POST('guardaempleado', [empleadoscontroller::class, 'guardaempleado'])->name('guardaempleado');
Route::get('veremp', [empleadoscontroller::class, 'veremp'])->name('veremp'); 

Route::get('newpassword', [logincontroller::class, 'newpassword'])->name('newpassword');
Route::get('validauser', [logincontroller::class, 'validauser'])->name('validauser');
Route::get('captchanuevo', [logincontroller::class, 'captchanuevo'])->name('captchanuevo');
Route::get('mandacorreo', [logincontroller::class, 'mandacorreo'])->name('mandacorreo');

Route::get('recupera',function (){

    Mail::to('dereckdownham2002@gmail.com')
        ->send(new notificacion("Diana"));
        return "Mensaje Enviado";
    
})->name('recupera');