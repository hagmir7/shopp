<?php

use App\Http\Controllers\CategoryConroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
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

// Route::get('category/{category:slug}', function(Category $category){
//     $title = $category->name;
//     $image = $category->image;
//     return view('category.show', compact('category', 'title', 'image'));
// })->name('category.show');


Route::get('contact', function(){
    return view('contact');
})->name('contact');




Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('{product:slug}', 'show')->name('product.show');
});

Route::controller(CategoryController::class)->prefix('category')->group(function () {
    Route::get('{category:slug}', 'show')->name('category.show');
});


