<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CarreraController;


Route::get('/', function () {
    return redirect()->route('estudiantes.index');
});


Route::resource('carreras', CarreraController::class)
     ->except(['show']);


Route::resource('estudiantes', EstudianteController::class)
     ->except(['show']);