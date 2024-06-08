<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

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

Auth::routes();
Route::get('/wp-admin', [AuthController::class, 'index']);
Route::post('/wp-admin/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/wp-admin/dash', [AuthController::class, 'dash'])->name('admin.dashboard');

Route::get('/', [IndexController::class, 'index']);


Route::get('/calendar', [CalendarController::class, 'index']);
Route::get('/calendar/{id}', [CalendarController::class, 'show'])->name('calendar.show');


Route::get('/drivers', [DriverController::class, 'index']);
Route::get('/driver/{id}', [DriverController::class, 'show'])->name('driver.show');


Route::get('/teams', [ConstructorsController::class, 'index']);
Route::get('/team/{id}', [ConstructorsController::class, 'show'])->name('team.show');


Route::get('/prix', [PrixController::class, 'index'])->name('prix');
Route::get('/prix/{id}', [PrixController::class, 'show'])->name('prix.show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
