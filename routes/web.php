<?php

use App\Http\Controllers\contactoController;
use App\Http\Controllers\gestionUsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\postController;
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

Route::get('/',home::class)->name('home'); 
Route::get('formulario',[contactoController::class,'formularioContacto'])->name('contacto.formulario');
Route::post('formulario',[contactoController::class,'envioMail'])->name('contacto.envio');
Route::get('login',[gestionUsuarioController::class,'ver_formulario'])->name('login')->middleware('guest');
Route::post('login',[gestionUsuarioController::class,'ingresar'])->name('ingreso_login');
Route::get('registro',[gestionUsuarioController::class,'ver_formularioRegistro'])->name('registro');
Route::post('registro',[gestionUsuarioController::class,'registrar_log'])->name('registro_login');
Route::get('cerrar_sesion',[gestionUsuarioController::class,'logout'])->name('cerrar_sesion');
Route::get('formularioPost',[postController::class,'formularioPost'])->name('post.formulario');
Route::post('registrarPost',[postController::class,'registrarPost'])->name('post.registrar');
Route::get('post/{id?}',[postController::class,'ver_post'])->name('post.ver');
Route::post('registrarComentario/{id?}',[postController::class,'registrarComentario'])->name('post.comentario');
Route::get('ver_blog',[postController::class,'ver_blog'])->name('post.blog');
Route::post('ver_blog',[postController::class,'ver_blogPost'])->name('post.blog');
