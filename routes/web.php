<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/departments',[DepartmentController::class,'index']);
Route::post('/departments',[DepartmentController::class,'store']);
Route::get('/departments/{id}',[DepartmentController::class,'edit']);
Route::put('/departments/{id}',[DepartmentController::class,'update']);
Route::delete('/departments/{id}',[DepartmentController::class,'destroy']);