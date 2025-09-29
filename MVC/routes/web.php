<?php 

use lib\Route;
use app\controller\ControllerIndex;


Route::get('/',[ControllerIndex::class,'Index']);

Route::get('/form', [ControllerIndex::class,'Form']);

Route::get('/cam',[ControllerIndex::class,'Cam']);

Route::get('/landin',[ControllerIndex::class,'Landin']);

Route::post('/form',[ControllerIndex::class,'FormPost']);

Route::post('/',[ControllerIndex::class,'IndexPost']);

Route::post('/borrar',[ControllerIndex::class,'Delete']);

Route::dispatch();
?>
