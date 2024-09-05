<?php
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\solicitudVisitaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para la entidad Propiedad
Route::prefix('propiedades')->group(function() {
    Route::get('/', [PropiedadController::class, 'index'])->name('propiedades.index'); // Listar propiedades
    Route::get('create', [PropiedadController::class, 'create'])->name('propiedades.create'); // Mostrar formulario de creación
    Route::post('/', [PropiedadController::class, 'store'])->name('propiedades.store'); // Almacenar nueva propiedad
    Route::get('{id}/edit', [PropiedadController::class, 'edit'])->name('propiedades.edit'); // Mostrar formulario de edición
    Route::put('{id}', [PropiedadController::class, 'update'])->name('propiedades.update'); // Actualizar propiedad existente
    Route::delete('{id}', [PropiedadController::class, 'destroy'])->name('propiedades.destroy'); // Eliminar propiedad
});

// Rutas para la entidad Persona
Route::prefix('personas')->group(function() {
    Route::get('/', [PersonaController::class, 'index'])->name('personas.index'); // Listar personas
    Route::get('create', [PersonaController::class, 'create'])->name('personas.create'); // Mostrar formulario de creación
    Route::post('/', [PersonaController::class, 'store'])->name('personas.store'); // Almacenar nueva persona
    Route::get('{id}/edit', [PersonaController::class, 'edit'])->name('personas.edit'); // Mostrar formulario de edición
    Route::put('{id}', [PersonaController::class, 'update'])->name('personas.update'); // Actualizar persona existente
    Route::delete('{id}', [PersonaController::class, 'destroy'])->name('personas.destroy'); // Eliminar persona
});

// Rutas para la entidad Solicitud de Visita
Route::prefix('solicitudes')->group(function() {
    Route::get('/', [solicitudVisitaController::class, 'index'])->name('solicitudes.index'); // Listar solicitudes
    Route::get('create', [solicitudVisitaController::class, 'create'])->name('solicitudes.create'); // Mostrar formulario de creación
    Route::post('/', [solicitudVisitaController::class, 'store'])->name('solicitudes.store'); // Almacenar nueva solicitud
    Route::get('{id}/edit', [solicitudVisitaController::class, 'edit'])->name('solicitudes.edit'); // Mostrar formulario de edición
    Route::put('{id}', [solicitudVisitaController::class, 'update'])->name('solicitudes.update'); // Actualizar solicitud existente
    Route::delete('{id}', [solicitudVisitaController::class, 'destroy'])->name('solicitudes.destroy'); // Eliminar solicitud
});


