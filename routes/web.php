<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

//Departments
Route::get('/departments',[DepartmentController::class,'index']);
Route::post('/departments',[DepartmentController::class,'store']);
Route::get('/departments/{id}',[DepartmentController::class,'edit']);
Route::put('/departments/{id}',[DepartmentController::class,'update']);
Route::delete('/departments/{id}',[DepartmentController::class,'destroy']);

//Rooms
Route::get('/rooms',[RoomController::class,'index']);
Route::post('/rooms',[RoomController::class,'store']);
Route::get('/rooms/{id}',[RoomController::class,'edit']);
Route::put('/rooms/{id}',[RoomController::class,'update']);
Route::delete('/rooms/{id}',[RoomController::class,'destroy']);

//doctors
Route::get('/doctors',[DoctorController::class,'index']);
Route::post('/doctors',[DoctorController::class,'store']);
Route::get('/doctors/{id}',[DoctorController::class,'edit']);
Route::post('/doctors/{id}',[DoctorController::class,'update']);
Route::delete('/doctors/{id}',[DoctorController::class,'destroy']);