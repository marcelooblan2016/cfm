<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\LoadAvailableFoldersController;
use App\Http\Controllers\Auth\GoogleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::group(['prefix' => 'auth'], function () {
    Route::group(['prefix' => 'google'], function () {
        Route::get('redirect', [GoogleController::class, 'redirectTo'])->name('auth.google.login');
        Route::get('callback', [GoogleController::class, 'callback'])->name('auth.google.callback');
    });
});


Route::group(['prefix' => 'deliveries', 'middleware' => 'auth'], function () {
    Route::get('/', [DeliveryController::class, 'index'])->name('deliveries.index');
    Route::get('/create', [DeliveryController::class, 'create'])->name('deliveries.create');
    Route::get('load-available-folders', LoadAvailableFoldersController::class)->name('deliveries.load-available-folders');
    Route::post('/', [DeliveryController::class, 'store'])->name('deliveries.store');
});
