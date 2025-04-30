<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\SeccionController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('alumno/{alumno}/actualizar-secciones', [AlumnoController::class, 'actualizarSeccionesAlumno'])
    ->name('alumno.actualizar-secciones')
    ->middleware(['auth']);

Route::resource('alumno', AlumnoController::class)->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::resource('secciones', SeccionController::class);
Route::post('secciones/{seccion}/asignar-alumnos', [SeccionController::class, 'asignarAlumnos'])->name('secciones.asignarAlumnos');

require __DIR__.'/auth.php';
