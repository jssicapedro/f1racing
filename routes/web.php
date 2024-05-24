<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ConstructorsController;
use App\Http\Controllers\PrixController;

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

Route::get('/', [IndexController::class, 'index']);


Route::get('/calendar', [CalendarController::class, 'index']);
Route::get('/calendar/{id}', [CalendarController::class, 'show'])->name('calendar.show');


Route::get('/drivers', [DriverController::class, 'index']);
Route::get('/driver/{id}', [DriverController::class, 'show'])->name('driver.show');


Route::get('/teams', [ConstructorsController::class, 'index']);
Route::get('/team/{id}', [ConstructorsController::class, 'show'])->name('team.show');


Route::get('/prix', [PrixController::class, 'index'])->name('prix');
Route::get('/prix/{id}', [PrixController::class, 'show'])->name('prix.show');

