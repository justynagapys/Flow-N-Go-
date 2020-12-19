<?php

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/offer/my', [App\Http\Controllers\OfferController::class, 'userOffers']);

Route::get('/', [App\Http\Controllers\OfferController::class, 'index']);

Route::get('/offer/{id}', [App\Http\Controllers\OfferController::class, 'show']);

Route::get('/offer/create', [App\Http\Controllers\OfferController::class, 'create']);

Route::post('offer/create', [App\Http\Controllers\OfferController::class, 'store']);

Route::get('/offer/{id}/edit', [App\Http\Controllers\OfferController::class, 'edit']);

Route::patch('/offer/{id}/edit', [App\Http\Controllers\OfferController::class, 'update']);

Route::get('/offer/{id}/delete', [App\Http\Controllers\OfferController::class, 'destroy']);
