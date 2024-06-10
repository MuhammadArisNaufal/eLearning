<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);

Route::get('admin/student', [StudentController::class, 'index']);

Route::get('admin/student/create', [StudentController::class, 'create']);

Route::post('admin/student/create', [StudentController::class, 'store']);

Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

// courses
Route::get('admin/courses', [CoursesController::class, 'index']);

Route::get('admin/courses/create', [CoursesController::class, 'create']);

Route::post('admin/courses/create', [CoursesController::class, 'store']);

Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit'])->name('courses.edit');

Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);

Route::delete('admin/courses/delete/{id}', [CoursesController::class, 'destroy']);