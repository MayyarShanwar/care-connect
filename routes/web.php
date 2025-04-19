<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SurgeryController;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

//Departments
Route::get('/departments',[DepartmentController::class,'index']);
Route::post('/departments',[DepartmentController::class,'store']);
Route::get('/departments/{id}',[DepartmentController::class,'edit']);
Route::put('/departments/{id}',[DepartmentController::class,'update']);
Route::delete('/departments/{id}',[DepartmentController::class,'destroy']);

//Rooms
Route::get('/rooms',[RoomController::class,'index']);
Route::get('/roomList',[RoomController::class,'roomList']);
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

//services
Route::get('/services',[ServiceController::class,'index']);
Route::post('/services',[ServiceController::class,'store']);
Route::get('/services/{id}',[ServiceController::class,'edit']);
Route::post('/services/{id}',[ServiceController::class,'update']);
Route::delete('/services/{id}',[ServiceController::class,'destroy']);

//patients
Route::get('/patients',[PatientController::class,'index']);
Route::post('/patients',[PatientController::class,'store']);
Route::get('/patientsList',[PatientController::class,'patientsList']);
Route::get('/patients/{id}',[PatientController::class,'edit']);
Route::post('/patients/{id}',[PatientController::class,'update']);
Route::delete('/patients/{id}',[PatientController::class,'destroy']);

//surjical-operations
Route::get('/surjical-operations',[SurgeryController::class,'index']);
Route::post('/surjical-operations',[SurgeryController::class,'store']);
Route::get('/surjical-operations/{id}',[SurgeryController::class,'edit']);
Route::post('/surjical-operations/{id}',[SurgeryController::class,'update']);
Route::delete('/surjical-operations/{id}',[SurgeryController::class,'destroy']);