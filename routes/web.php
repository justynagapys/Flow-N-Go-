<?php

use Illuminate\Support\Facades\Route;
// use Request;
use App\Models\Offer;


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

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [\App\Http\Controllers\OfferController::class, 'index']);

Route::get('/offers/create', [\App\Http\Controllers\OfferController::class, 'create']);

Route::post('/offers/create', [\App\Http\Controllers\OfferController::class, 'store']);

Route::get('/offers/{id}', [\App\Http\Controllers\OfferController::class, 'show']);

Route::get('/offers/{id}/edit', [\App\Http\Controllers\OfferController::class, 'edit']);

Route::patch('/offers/{id}/edit', [\App\Http\Controllers\OfferController::class, 'update']);

Route::get('/offers/{id}/delete', [\App\Http\Controllers\OfferController::class, 'destroy']);

Route::get('/offers/{id}/comments', [\App\Http\Controllers\OfferController::class, 'comments']);

Route::get('/offers/{o_id}/comments/create', [\App\Http\Controllers\CommentController::class, 'create']);

Route::post('/offers/{o_id}/comments/create', [\App\Http\Controllers\CommentController::class, 'store']);

Route::get('comments/{id}/edit',[\App\Http\Controllers\CommentController::class, 'edit']);

Route::patch('comments/{id}/edit',[\App\Http\Controllers\CommentController::class, 'update']);

Route::get('comments/{id}/delete', [\App\Http\Controllers\CommentController::class, 'destroy']);

Route::get('/home/myoffers', [\App\Http\Controllers\HomeController::class, 'userOffers']);

Route::any('/search',function(){ 
    $q = Request::get('localization');
    $offer = Offer::where('localization', 'like', '%'.$q.'%') -> get();
    return view('offer.search')->with('offer', $offer)->with('q',$q);
}
);

// Route::any('/search', [\App\Http\Controllers\OfferController::class, 'search']);
