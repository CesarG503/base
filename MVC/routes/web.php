<?php 

use lib\Route;
use app\controller\IndexController;


Route::get("/",[IndexController::class,'Index']);

Route::post("/",[IndexController::class,'Crear']);
Route::post("/borrar",[IndexController::class,'Borrar']);
Route::post('/editar',[IndexController::class,'Editar']);
Route::post('/actualizar', [IndexController::class,'Actualizar']);

Route::dispatch();
?>
