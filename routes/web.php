<?php

use App\Http\Controllers\studentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view("/page1", "component.page1");
Route::view("/page2", "component.page2");
Route::view("/page3", "component.page3");
Route::view("/page4", "component.page4");
Route::view("/page5", "component.page5");
Route::view("/addstudent", "component.student");


Route::post("/add-student",[studentController::class,"addStudent"])->name("add-student");


Route::controller(UserController::class)->group(function(){
Route::get("/user", "getUser")->name("userlist");
Route::post("/adduser","addUser")->name("adduser");
Route::get("/userbyid/{id}","getUserById");
Route::put("/edituser/{id}", "editUser")->name("edit");
Route::delete("/deleteuser", "deleteUser")->name("deleteuser");




});

