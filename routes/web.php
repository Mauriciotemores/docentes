<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\SeccionController;

Route::post('secciones/{seccion}/asignar-alumnos', [SeccionController::class, 'asignarAlumnos'])
    ->name('secciones.asignar-alumnos');

Route::resource('secciones', SeccionController::class);
