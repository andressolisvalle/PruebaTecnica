<?php

use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ReservasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/reserva');

Route::resource('reserva',ReservasController::class);
Route::resource('habitaciones', HabitacionController::class);
Route::get('/confirmacion-reserva/{id}', [ReservasController::class, 'confirmacion'])->name('confirmacion.reserva');
