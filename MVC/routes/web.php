<?php 
use lib\Route;
use app\controller\IndexController;

Route::get("/", [IndexController::class,"Index"]);

Route::get("/inicio", [IndexController::class,"Index"]);

Route::dispatch();
?>