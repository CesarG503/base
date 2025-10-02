<?php 

use lib\Route;
use app\controller\IndexController;


Route::get('/',[IndexController::class,'Index']);
Route::get('/get', [IndexController::class, 'Get']);

Route::dispatch();
?>
