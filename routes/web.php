<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});


Route::get("/user",[UserController::class,"getUser"]);
Route::view("/page1","component.page1");
Route::view("/page2","component.page2");
Route::view("/page3","component.page3");
Route::view("/page4","component.page4");
Route::view("/page5","component.page5");



