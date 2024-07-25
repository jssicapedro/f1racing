<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ConstructorsController;
use App\Http\Controllers\PrixController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GrandPrixController;
use App\Http\Controllers\UsersController;

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

Route::get('/wp-admin', [AuthController::class, 'index'])->name('login');
Route::post('/wp-admin/login', [AuthController::class, 'login'])->name('login.submit');

Route::middleware(['isAdmin'])->group(function () {
    /* calendar */
    Route::get('/wp-admin/calendar', [CalendarController::class, 'view'])->name('admin.calendar');
    Route::get('/wp-admin/calendar/new', [CalendarController::class, 'create'])->name('admin.calendar.create');
    Route::post('/wp-admin/calendar/store', [CalendarController::class, 'store'])->name('admin.calendar.store');
    Route::delete('/wp-admin/calendar/destroy/{id}',[CalendarController::class, 'destroy'])->name('admin.calendar.destroy');
    Route::get('/wp-admin/calendar/{id}', [CalendarController::class, 'edit'])->name('admin.calendar.edit');
    Route::put('/wp-admin/calendar/{id}', [CalendarController::class, 'update'])->name('admin.calendar.update');

    /* results */
    Route::get('/wp-admin/results', [ResultController::class, 'view'])->name('admin.results');
    Route::get('/wp-admin/results/create', [ResultController::class, 'create'])->name('admin.results.create');
    Route::post('/wp-admin/results/store', [ResultController::class, 'store'])->name('admin.results.store');
    Route::get('/wp-admin/results/{id}', [ResultController::class, 'edit'])->name('admin.results.edit');
    Route::put('/wp-admin/results/{id}', [ResultController::class, 'update'])->name('admin.results.update');
    Route::delete('/wp-admin/results/destroy/{id}',[ResultController::class, 'destroy'])->name('admin.results.destroy');

    /* grandprix */
    Route::get('/wp-admin/grandprix', [GrandPrixController::class, 'view'])->name('admin.grandprix');
    Route::get('/wp-admin/grandprix/create', [GrandPrixController::class, 'create'])->name('admin.grandprix.create');
    Route::post('/wp-admin/grandprix/store', [GrandPrixController::class, 'store'])->name('admin.grandprix.store');
    Route::get('/wp-admin/grandprix/{id}', [GrandPrixController::class, 'edit'])->name('admin.grandprix.edit');
    Route::put('/wp-admin/grandprix/{id}', [GrandPrixController::class, 'update'])->name('admin.grandprix.update');
    Route::delete('/wp-admin/grandprix/destroy/{id}',[GrandPrixController::class, 'destroy'])->name('admin.grandprix.destroy');

    /* track */
    Route::get('/wp-admin/track', [PrixController::class, 'view'])->name('admin.track');
    Route::get('/wp-admin/track/create', [PrixController::class, 'create'])->name('admin.track.create');
    Route::post('/wp-admin/track/store', [PrixController::class, 'store'])->name('admin.track.store');
    Route::get('/wp-admin/track/{id}', [PrixController::class, 'edit'])->name('admin.track.edit');
    Route::put('/wp-admin/track/{id}', [PrixController::class, 'update'])->name('admin.track.update');
    Route::delete('/wp-admin/track/destroy/{id}', [PrixController::class, 'destroy'])->name('admin.track.destroy');

    Route::get('/wp-admin/teams', [ConstructorsController::class, 'view'])->name('admin.teams');

    Route::get('/wp-admin/drivers', [DriverController::class, 'view'])->name('admin.driver');

    Route::get('/wp-admin/users', [UsersController::class, 'view'])->name('admin.user');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/results', [ResultController::class, 'index'])->name('results');
    Route::post('/results/filter', [ResultController::class, 'filter'])->name('results.filter');
    Route::get('/results/get-tracks', [ResultController::class, 'getTracks'])->name('results.get-tracks');
});




Route::get('/', [IndexController::class, 'index'])->name('index');


Route::get('/calendar', [CalendarController::class, 'index']);
Route::get('/calendar/{id}', [CalendarController::class, 'show'])->name('calendar.show');


Route::get('/drivers', [DriverController::class, 'index']);
Route::get('/driver/{id}', [DriverController::class, 'show'])->name('driver.show');


Route::get('/teams', [ConstructorsController::class, 'index']);
Route::get('/team/{id}', [ConstructorsController::class, 'show'])->name('team.show');


Route::get('/track', [PrixController::class, 'index'])->name('track');
Route::get('/track/{id}', [PrixController::class, 'show'])->name('track.show');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/error/403', function () {return view('errors.403');})->name('error.403');