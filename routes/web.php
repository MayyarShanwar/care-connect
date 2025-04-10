<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/departments',[DepartmentController::class,'index']);
Route::post('/departments',[DepartmentController::class,'store']);
