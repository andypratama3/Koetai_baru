<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\TiketController;
use App\Http\Controllers\Dashboard\ProdukController;
use App\Http\Controllers\Dashboard\TalentController;
use App\Http\Controllers\Dashboard\AnggotaController;
use App\Http\Controllers\Dashboard\SponsorController;
use App\Http\Controllers\Dashboard\KategoriController;
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

Route::get('/', WelcomeController::class)->name('index');


Route::group(['prefix' => 'dashboard','middleware' => ['auth','verified']], function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('talent', TalentController::class, ['names' => 'dashboard.talent']);
    Route::resource('event', EventController::class, ['names' => 'dashboard.event']);
    Route::resource('anggota', AnggotaController::class, ['names' => 'dashboard.anggota']);
    Route::resource('sponsor', SponsorController::class, ['names' => 'dashboard.sponsor']);
    Route::resource('kategori', KategoriController::class, ['names' => 'dashboard.kategori']);
    Route::resource('produk', ProdukController::class, ['names' => 'dashboard.produk']);
    Route::resource('tiket', TiketController::class, ['names' => 'dashboard.tiket']);

});




<<<<<<< HEAD
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
=======
// Route::middleware(['auth:sanctum',config('jetstream.auth_session')])->group(function () {
//   Route::get('/dashboard', function () {
>>>>>>> cfae3532b83f5e3a8b68c6c555f6436c1a588d1d
//         return view('dashboard');
//     })->name('dashboard');
// });
