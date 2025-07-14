<?php

use App\Http\Controllers\RelationshipsController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view("/page1", "component.page1")->name("1");
Route::view("/page2", "component.page2")->name("2");
Route::view("/page3", "component.page3")->name("3");
Route::view("/page4", "component.page4")->name("4");
Route::view("/page5", "component.page5")->name("5");
Route::view("/addstudent", "component.student");
Route::view("/relationship", "component.relationship");



Route::post("/add-student", [studentController::class, "addStudent"])->name("add-student");


Route::controller(UserController::class)->prefix("users")->group(function () {
    Route::get("/user", "getUser")->name("userlist");
    Route::post("/adduser", "addUser")->name("adduser");
    Route::get("/userbyid/{id}", "getUserById");
    Route::put("/edituser/{id}", "editUser")->name("edit");
    Route::delete("/deleteuser", "deleteUser")->name("deleteuser");
     
});

Route::get("one-to-one",[RelationshipsController::class,"Onetoone"]);
Route::get("one-to-many",[RelationshipsController::class,"OnetoMany"]);
