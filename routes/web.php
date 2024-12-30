<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/product', function(){
    return view('product');
});




Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('{product:slug}', 'show')->name('product.show');
});
