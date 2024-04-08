<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CallendarController;
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
Route::get('/callendar', [CallendarController::class, 'index']);
Route::get('/drivers', [DriverController::class, 'index']);
Route::get('/constructors', [ConstructorsController::class, 'index']);
Route::get('/prix', [PrixController::class, 'index']);

