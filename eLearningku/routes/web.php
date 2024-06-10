<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
});

require __DIR__.'/auth.php';
