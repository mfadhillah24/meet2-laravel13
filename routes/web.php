<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\LecturerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [StudentController::class, 'index']);
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::get('/lecturer', [LecturerController::class, 'index'])->name('lecturer.index');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::resource('departement', DepartementController::class);
Route::resource('lecturer', LecturerController::class);


    