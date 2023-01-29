<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;

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

Route::get('/', [MenuController::class, 'list'])->name('product.list');

Route::get('cart', [CartController::class, 'list'])->name('cart.list');
Route::post('cart', [CartController::class, 'add'])->name('cart.add');
Route::post('cart_update', [CartController::class, 'refresh'])->name('cart.refresh');
Route::post('update', [CartController::class, 'update'])->name('cart.update');
Route::post('remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clear'])->name('cart.clear');

// admins
Route::get('pesanan', [PesananController::class, 'list'])->name('pesanan.list');
Route::post('add_pesanan', [PesananController::class, 'add'])->name('pesanan.add');
Route::post('pesanan', [PesananController::class, 'remove'])->name('pesanan.remove');
