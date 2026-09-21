<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| AREA ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DAFTAR UMKM
    |--------------------------------------------------------------------------
    */

    Route::get('/umkm', [UmkmController::class, 'index'])
        ->name('umkm.index');


    /*
    |--------------------------------------------------------------------------
    | TAMBAH UMKM
    |--------------------------------------------------------------------------
    */

    Route::get('/umkm/create', [UmkmController::class, 'create'])
        ->name('umkm.create');

    Route::post('/umkm', [UmkmController::class, 'store'])
        ->name('umkm.store');


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    Route::get('/umkm/{slug}/edit', [UmkmController::class, 'edit'])
        ->name('umkm.edit');

    Route::put('/umkm/{slug}', [UmkmController::class, 'update'])
        ->name('umkm.update');


    /*
    |--------------------------------------------------------------------------
    | HAPUS
    |--------------------------------------------------------------------------
    */

    Route::delete('/umkm/{slug}', [UmkmController::class, 'destroy'])
        ->name('umkm.destroy');


    /*
    |--------------------------------------------------------------------------
    | QR ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/umkm/{slug}/qr', [UmkmController::class, 'qrPage'])
        ->name('umkm.qr');

    Route::get('/umkm/{slug}/qr-image', [UmkmController::class, 'qrCode'])
        ->name('umkm.qr.image');

    Route::get('/umkm/{slug}/qr-download', [UmkmController::class, 'downloadQrCode'])
        ->name('umkm.qr.download');

});


/*
|--------------------------------------------------------------------------
| DETAIL UMKM PUBLIK
|--------------------------------------------------------------------------
|
| Route ini sengaja berada PALING BAWAH.
|
| QR Code mengarah ke sini.
|
*/

Route::get('/umkm/{slug}', [UmkmController::class, 'show'])
    ->name('umkm.show');