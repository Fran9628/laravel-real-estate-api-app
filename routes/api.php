<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\propiedadController;
use App\Http\Controllers\personaController;
use App\Http\Controllers\solicitudVisitaController;

//RUTA DEL CRUD POPIEDRAD
Route::prefix('propiedades')->group(function() {
    Route::get('/', [PropiedadController::class, 'index']); // Listar propiedades
    Route::post('/', [PropiedadController::class, 'store']); // Crear nueva propiedad
    Route::put('{id}', [PropiedadController::class, 'update']); // Actualizar una propiedad existente
    Route::delete('{id}', [PropiedadController::class, 'destroy']); // Eliminar una propiedad
});


//RUTA DEL PERSONA
Route::prefix('personas')->group(function() {
    Route::get('/', [PersonaController::class, 'index']); // Listar personas
    Route::post('/', [PersonaController::class, 'store']); // Crear nueva persona
    Route::put('{id}', [PersonaController::class, 'update']); // Actualizar una persona existente
    Route::delete('{id}', [PersonaController::class, 'destroy']); // Eliminar una persona
});

//RUTA DEL SOLICITUD VISITA
Route::prefix('solicitudes')->group(function() {
    Route::get('/', [solicitudVisitaController::class, 'index']); // Listar solicitudes
    Route::post('/', [solicitudVisitaController::class, 'store']); // Crear nueva solicitud
    Route::put('{id}', [solicitudVisitaController::class, 'update']); // Actualizar una solicitud existente
    Route::delete('{id}', [solicitudVisitaController::class, 'destroy']); // Eliminar una solicitud
});
