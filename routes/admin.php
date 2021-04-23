<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\NeeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Livewire\Admin\UsaerLiveWire;





Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');
Route::get('discapacidades', UsaerLiveWire::class)->middleware('can:admin.usaers')->name('admin.usaers');

Route::resource('alumnos', AlumnoController::class)->middleware('can:admin.alumnos')->except('show')->names('admin.alumnos');
Route::resource('nee', NeeController::class)->middleware('can:admin.nee')->except('show')->names('admin.nee');

Route::resource('users',UserController::class)->middleware('can:admin.users')->only('index','edit','update')->names('admin.users');
Route::resource('roles',RoleController::class)->middleware('can:admin.roles')->only('index','store')->names('admin.roles');

