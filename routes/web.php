<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/product', function(){
    return view('product');
});

Route::view('thanks', 'thanks')->name('thanks');



Route::get('shop', function(){

})->name('shop');




Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('{product:slug}', 'show')->name('product.show');
});

Route::controller(ProductController::class)->prefix('category')->group(function () {
    Route::get('{category:slug}', 'show')->name('category.show');
});


