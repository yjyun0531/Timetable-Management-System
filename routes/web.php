<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get ('/departments',[DepartmentController::class,'show']);
Route::get('/departments/create', [DepartmentController::class, 'create']);
Route::post('/departments', [DepartmentController::class, 'store']);


Route::get ('/courses',[CourseController::class,'show']);
Route::get('/courses/create', [CourseController::class, 'create']);
Route::post('/courses', [CourseController::class, 'store']);

Route::get ('/courses',[CourseController::class,'show']);
Route::get('/courses/create', [CourseController::class, 'create']);
Route::post('/courses', [CourseController::class, 'store']);

Route::get ('/venues',[VenueController::class,'show']);
Route::get('/venues/create', [VenueController::class, 'create']);
Route::post('/venues', [VenueController::class, 'store']);