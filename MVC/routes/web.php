<?php 

use lib\Route;
use app\controller\IndexController;


Route::get('/',[IndexController::class,'Index']);
Route::post('/',[IndexController::class,'Eliminar']);
Route::post('/estudiante',[IndexController::class,'Agregar']);

Route::post('/editar',[IndexController::class,'Editar']);
Route::post('/actualizar',[IndexController::class,'Actualizar']);

Route::dispatch();

?>
