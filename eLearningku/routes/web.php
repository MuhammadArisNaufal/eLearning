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

Route::get('admin/courses', [CoursesController::class, 'index']);

Route::get('admin/student/create', [StudentController::class, 'create']);

Route::post('admin/student/create', [StudentController::class, 'store']);

Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);