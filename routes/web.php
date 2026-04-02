<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', function () {
        return view('student.index' , ['tittle' => 'Student']);
    });

Route::get('/student/create', function () {
        return view('student.create' , ['tittle' => 'create student']);
    });