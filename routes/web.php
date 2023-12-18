<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\HeaderWebsiteController;
use App\Http\Controllers\Dashboard\KontakController;
use App\Http\Controllers\Dashboard\ProdukController;
use App\Http\Controllers\Dashboard\TentangKamiController;
use App\Http\Controllers\Dashboard\TestimoniController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PasswordUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\WebController;
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

//route user webcontroller
Route::get('/', [WebController::class, 'index'])
    ->name('beranda');
// ->middleware("auth");
Route::get('/produk-dapurkenyang', [WebController::class, 'produk']);
Route::get('/detail-dapurkenyang/{idProduk}', [WebController::class, 'detail']);
Route::get('/order-dapurkenyang/{idUser}', [WebController::class, 'order']);

//route login user controller
Route::get('/login-user', [LoginUserController::class, 'index'])
    ->name("login");
Route::post('/login-aksi-user', [LoginUserController::class, 'login_aksi']);
Route::get('/logout-user', [LoginUserController::class, 'logout']);

//forgot password route
Route::get('/reset-password', [PasswordUserController::class, 'update']);
Route::post('/reset-password-aksi', [PasswordUserController::class, 'update_aksi']);

//route register user
Route::get('/register', [RegisterUserController::class, 'register']);
Route::post('/register-user-aksi', [RegisterUserController::class, 'register_aksi']);

// Route dashboard admin
Route::prefix('dashboard')->group(function () {

    // Auth
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login')
        ->middleware('guest');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store')
        ->middleware('guest');
    Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware('auth');

    // Protected route
    Route::middleware('auth')->group(function () {

        // Users
        Route::resource('users', UsersController::class);
        Route::put('users/{user}/restore', [UsersController::class, 'restore'])
            ->name('users.restore');

        // Produk
        Route::resource('produk', ProdukController::class);

        // Testimoni
        Route::resource('testimoni', TestimoniController::class);

        // Kontak
        Route::resource('kontak', KontakController::class)
            ->only(['edit', 'update']);

        //Header Website
        Route::resource('header-website', HeaderWebsiteController::class);

        // Tentang Kami
        Route::resource('tentang-kami', TentangKamiController::class);
    });

    // Images
    Route::get('/img/{path}', [ImagesController::class, 'show'])
        ->where('path', '.*')
        ->name('image');
});
