<?php

use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController,
                          UsersController,
                          SeasonController,
                          SeriesController,
                          EpisodesController,};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::middleware('autenticador')->group(function () {
    Route::get('/', function () {
        return redirect('/series'); });

    Route::get('/series/{series}/season', [SeasonController::class, 'index'])
        ->name('season.index');

    Route::get('/season/{season}/episodes', [EpisodesController::class, 'index'])
        ->name('episodes.index');
    Route::post('/season/{season}/episodes', [ EpisodesController::class, 'update'])
        ->name('episodes.update');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('sigin');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');
