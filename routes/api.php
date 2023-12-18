<?php

use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');
Route::put('keranjang/{idKeranjang}', [KeranjangController::class, 'update']);
Route::delete('keranjang', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

Route::get('checkout', [TransaksiController::class, 'store'])->name("checkout");
