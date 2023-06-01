<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\OrderTiketController;
use App\Http\Controllers\Dashboard\OrderanTiket;
use App\Http\Controllers\ListOrderTiketController;
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
Route::get('shop', [ShopController::class, 'index']);
Route::get('crew', [CrewController::class, 'index']);

Route::group(['prefix' => '/','middleware' => ['auth','verified']], function () {
    Route::get('tiket', [OrderTiketController::class, 'index']);
    Route::post('tiket-order', [OrderTiketController::class, 'order_tiket']);

    //listTiket
    Route::get('checkout-tiket', [OrderTiketController::class, 'checkout']);
    Route::post('bayar-tiket', [OrderTiketController::class, 'order']);

    Route::get('orderan-tiket', [OrderTiketController::class, 'orderan']);


    // Route::resource('tiket', OrderTiketController::class, ['names' => 'tiket']);
    // Route::post('pesan-tiket', [OrderTiketController::class, 'store']);

    Route::post('update-tiket', [OrderTiketController::class, 'update_tiket']);
    Route::post('delete-pesanan-tiket', [OrderTiketController::class, 'destroy']);


    // Route::resource('shop', ShopController::class, ['names' => 'shop']);

    Route::resource('cart', CartController::class, ['names' => 'cart']);
    Route::post('add-to-cart', [CartController::class, 'addtocart']);
    Route::post('update-cart', [CartController::class, 'updatecart']);
    Route::post('delete-cart', [CartController::class, 'deletecart']);
    Route::get('cart-count', [CartController::class, 'cartcount']);





});

Route::group(['prefix' => 'dashboard','middleware' => ['auth','verified']], function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('talent', TalentController::class, ['names' => 'dashboard.talent']);
    Route::resource('event', EventController::class, ['names' => 'dashboard.event']);
    Route::resource('anggota', AnggotaController::class, ['names' => 'dashboard.anggota']);
    Route::resource('sponsor', SponsorController::class, ['names' => 'dashboard.sponsor']);
    Route::resource('kategori', KategoriController::class, ['names' => 'dashboard.kategori']);
    Route::resource('produk', ProdukController::class, ['names' => 'dashboard.produk']);
    Route::resource('tiket', TiketController::class, ['names' => 'dashboard.tiket']);
    Route::resource('order', OrderanTiket::class, ['names' => 'dashboard.order']);

});


