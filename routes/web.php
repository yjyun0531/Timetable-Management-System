<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\CourseOfferingController;
use App\Http\Controllers\LecturerCourseController;
use App\Http\Controllers\TimetableController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('main'); });

Route::get('/departments', [DepartmentController::class, 'show']);
Route::get('/departments/create', [DepartmentController::class, 'create']);
Route::post('/departments', [DepartmentController::class, 'store']);
Route::get('/departments/{id}/edit', [DepartmentController::class, 'editForm']);
Route::put('/departments/{id}', [DepartmentController::class, 'update']);
Route::get('/departments/{id}/delete', [DepartmentController::class, 'deleteForm']);
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy']);

Route::get('/courses', [CourseController::class, 'show']);
Route::get('/courses/create', [CourseController::class, 'create']);
Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses/{id}/edit', [CourseController::class, 'editForm']);
Route::put('/courses/{id}', [CourseController::class, 'update']);
Route::get('/courses/{id}/delete', [CourseController::class, 'deleteForm']);
Route::delete('/courses/{id}', [CourseController::class, 'destroy']);

Route::get('/lecturers', [LecturerController::class, 'show']);
Route::get('/lecturers/create', [LecturerController::class, 'create']);
Route::post('/lecturers', [LecturerController::class, 'store']);
Route::get('/lecturers/{id}/edit', [LecturerController::class, 'editForm']);
Route::put('/lecturers/{id}', [LecturerController::class, 'update']);
Route::get('/lecturers/{id}/delete', [LecturerController::class, 'deleteForm']);
Route::delete('/lecturers/{id}', [LecturerController::class, 'destroy']);

Route::get('/venues', [VenueController::class, 'show']);
Route::get('/venues/create', [VenueController::class, 'create']);
Route::post('/venues', [VenueController::class, 'store']);
Route::get('/venues/{id}/edit', [VenueController::class, 'editForm']);
Route::put('/venues/{id}', [VenueController::class, 'update']);
Route::get('/venues/{id}/delete', [VenueController::class, 'deleteForm']);
Route::delete('/venues/{id}', [VenueController::class, 'destroy']);

Route::get('/course-offerings', [CourseOfferingController::class, 'show']);
Route::get('/course-offerings/create', [CourseOfferingController::class, 'create']);
Route::post('/course-offerings', [CourseOfferingController::class, 'store']);
Route::get('/course-offerings/{id}/edit', [CourseOfferingController::class, 'editForm']);
Route::put('/course-offerings/{id}', [CourseOfferingController::class, 'update']);
Route::get('/course-offerings/{id}/delete', [CourseOfferingController::class, 'deleteForm']);
Route::delete('/course-offerings/{id}', [CourseOfferingController::class, 'destroy']);

Route::get('/lecturer-courses', [LecturerCourseController::class, 'show']);
Route::get('/lecturer-courses/create', [LecturerCourseController::class, 'create']);
Route::post('/lecturer-courses', [LecturerCourseController::class, 'store']);
Route::get('/lecturer-courses/{lecturer_id}/{offering_id}/edit', [LecturerCourseController::class, 'editForm']);
Route::put('/lecturer-courses/{lecturer_id}/{offering_id}', [LecturerCourseController::class, 'update']);
Route::get('/lecturer-courses/{lecturer_id}/{offering_id}/delete', [LecturerCourseController::class, 'deleteForm']);
Route::delete('/lecturer-courses/{lecturer_id}/{offering_id}', [LecturerCourseController::class, 'destroy']);

Route::get('/timetable/grid', [TimetableController::class, 'grid']);

Route::get('/timetable', [TimetableController::class, 'show']);
Route::post('/timetable', [TimetableController::class, 'store']);
Route::get('/timetable/{id}/edit', [TimetableController::class, 'editForm']);
Route::put('/timetable/{id}', [TimetableController::class, 'update']);
Route::get('/timetable/{id}/delete', [TimetableController::class, 'deleteForm']);
Route::delete('/timetable/{id}', [TimetableController::class, 'destroy']);