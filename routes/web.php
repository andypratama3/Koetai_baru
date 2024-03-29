<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\OrderTiketController;
use App\Http\Controllers\Dashboard\OrderanTiket;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\ListOrderTiketController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\TiketController;
use App\Http\Controllers\Dashboard\ProdukController;
use App\Http\Controllers\Dashboard\TalentController;
use App\Http\Controllers\Dashboard\AnggotaController;
use App\Http\Controllers\Dashboard\SponsorController;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OrderanShopController;

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
Route::get('tentang', [BeritaController::class,'about']);
Route::get('shop', [ShopController::class, 'index']);

Route::get('event/{slug}', [BeritaController::class, 'show'])->name('detail.event.show');

Route::get('crew', [CrewController::class, 'index']);




Route::group(['prefix' => '/','middleware' => ['auth','verified']], function () {
    //tiket
    Route::get('tiket', [OrderTiketController::class, 'index'])->name('tiket.index');
    Route::post('checkout-tiket', [OrderTiketController::class, 'checkout']);
    Route::post('checkout-tiket-status', [OrderTiketController::class, 'payment_status']);
    //listTiket
    Route::get('orderan-tiket', [OrderTiketController::class, 'orderan'])->name('orderan.tiket');
    Route::post('delete-pesanan-tiket', [OrderTiketController::class, 'destroy']);
    //cart
    Route::resource('cart', CartController::class, ['names' => 'cart']);
    Route::post('add-to-cart', [CartController::class, 'addtocart']);
    Route::post('update-cart', [CartController::class, 'updatecart']);
    Route::post('delete-cart', [CartController::class, 'deletecart']);
    Route::get('cart-count', [CartController::class, 'cartcount']);

    //shop
    Route::post('add-to-checkout', [ShopController::class,'addprodukcheckout']);
    Route::get('checkout', [ShopController::class,'checkoutproduk']);
    Route::post('proses-checkout', [ShopController::class,'proses_checkout']);
    Route::get('order-shop', [ShopController::class,'list_order_shop']);
    // Route::get('pembayaran', [ShopController::class,'bayar']);

});


Route::group(['prefix' => 'dashboard','middleware' => ['auth', 'admin: 1','verified']], function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('talent', TalentController::class, ['names' => 'dashboard.talent']);
    Route::resource('event', EventController::class, ['names' => 'dashboard.event']);
    Route::resource('anggota', AnggotaController::class, ['names' => 'dashboard.anggota']);
    Route::resource('kategori', KategoriController::class, ['names' => 'dashboard.kategori']);
    Route::resource('produk', ProdukController::class, ['names' => 'dashboard.produk']);
    Route::resource('tiket', TiketController::class, ['names' => 'dashboard.tiket']);
    Route::resource('order', OrderanTiket::class, ['names' => 'dashboard.order']);
    Route::get('order-export', [OrderanTiket::class, 'export'])->name('dashboard.order.export');
    Route::resource('user', UserController::class, ['names' => 'dashboard.user']);
    Route::resource('ordershop', OrderanShopController::class, ['names' => 'dashboard.ordershop']);
    Route::resource('sponsor', SponsorController::class, ['names' => 'dashboard.sponsor']);








});
