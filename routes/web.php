<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandapageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BerandapageController::class, 'index']);
Route::get('/category', [BerandapageController::class, 'category']);
Route::get('view-category/{id}', [BerandapageController::class, 'viewcategory']);
Route::get('detail-products/{cate_id}/{prod_id}', [BerandapageController::class, 'viewproduct']);

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::middleware(['auth', 'is_admin:1'])->group(function () {
    // Home Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Data Pengguna
    Route::resource('pengguna', PenggunaController::class);

    // Data Kategori
    Route::resource('kategori', KategoriController::class);

    // Data Produk
    Route::resource('produk', ProdukController::class);

    // Data Iklan
    Route::resource('iklan', IklanController::class);

    // Data Setting
    Route::resource('setting', SettingController::class);

});