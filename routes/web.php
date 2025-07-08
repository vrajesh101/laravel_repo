<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/user", [UserController::class, "getUser"])->name("userlist");
Route::view("/page1", "component.page1");
Route::view("/page2", "component.page2");
Route::view("/page3", "component.page3");
Route::view("/page4", "component.page4");
Route::view("/page5", "component.page5");
Route::delete("/deleteuser", [UserController::class, "deleteUser"])->name("deleteuser");
Route::post("/adduser", [UserController::class, "addUser"])->name("adduser");
Route::put("/userbyid", [UserController::class, "getUserById"])->name("getuserbyid");
Route::put("/edituser", [UserController::class, "editUser"])->name("edit");
