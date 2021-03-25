<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;
use App\Http\Livewire\Admin\UsaerLiveWire;

use App\Http\Livewire\Admin\AlumnoLiveWire;
use App\Http\Livewire\Admin\AlumnoCreateLiveWire;



Route::get('', [homeController::class, 'index'])->name('admin.home');

/*Route::resource('alumnos', AlumnoController::class)->names('admin.alumnos');*/

Route::get('usaers', UsaerLiveWire::class)->name('admin.usaers');

//rutas de alumno de administrador
Route::get('alumnos', AlumnoLiveWire::class)->name('admin.alumnos.index');
Route::get('alumnos/create', AlumnoCreateLiveWire::class)->name('admin.alumnos.create');
