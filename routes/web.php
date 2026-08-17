<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\CourseOfferingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('main'); });

Route::get('/departments', [DepartmentController::class, 'show']);
Route::get('/departments/create', [DepartmentController::class, 'create']);
Route::post('/departments', [DepartmentController::class, 'store']);

Route::get('/courses', [CourseController::class, 'show']);
Route::get('/courses/create', [CourseController::class, 'create']);
Route::post('/courses', [CourseController::class, 'store']);

Route::get('/lecturers', [LecturerController::class, 'show']);
Route::get('/lecturers/create', [LecturerController::class, 'create']);
Route::post('/lecturers', [LecturerController::class, 'store']);

Route::get('/venues', [VenueController::class, 'show']);
Route::get('/venues/create', [VenueController::class, 'create']);
Route::post('/venues', [VenueController::class, 'store']);

Route::get('/course-offerings', [CourseOfferingController::class, 'show']);
Route::get('/course-offerings/create', [CourseOfferingController::class, 'create']);
Route::post('/course-offerings', [CourseOfferingController::class, 'store']);