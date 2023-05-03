<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\TalentController;
use App\Http\Controllers\Dashboard\AnggotaController;
use App\Http\Controllers\Dashboard\SponsorController;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::get('/', WelcomeController::class, ['middleware' => ['auth']])->name('index');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('talent', TalentController::class, ['names' => 'dashboard.talent']);
    Route::resource('event', EventController::class, ['names' => 'dashboard.event']);
    Route::resource('anggota', AnggotaController::class, ['names' => 'dashboard.anggota']);
    Route::resource('sponsor', SponsorController::class, ['names' => 'dashboard.sponsor']);
});

