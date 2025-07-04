<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryConroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\PageController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::get('/livewire/update', function () {
    return redirect()->back();
});


Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('/product', function(){
    return view('product');
});

Route::view('thanks', 'thanks')->name('thanks');



Route::get('shop', function(){
    $title = __("Products");
    return view('shop', compact('title'));
})->name('shop');

// Route::get('category/{category:slug}', function(Category $category){
//     $title = $category->name;
//     $image = $category->image;
//     return view('category.show', compact('category', 'title', 'image'));
// })->name('category.show');


Route::get('contact', function(){
    $title = __("Contact Us");
    return view('contact', compact('title'));
})->name('contact');



Route::get('products-1', function(){
    return view("product.list-1");
});

Route::get('menu', function(){
    $title = __("Menu");
    return view('menu', compact('title'));
})->name('menu');


Route::get('profile', function(){
    if(!auth()->check()){
        return redirect()->route('auth.login');
    }
    $title = auth()->user()->first_name . " " . auth()->user()->last_name;
    $orders = auth()->user()->with('orders')->get();
    return view('profile', compact('title', 'orders'));
})->name('profile');

Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('{product:slug}', 'show')->name('product.show');
});

Route::controller(CategoryController::class)->prefix('category')->group(function () {
    Route::get('', 'list')->name('category.list');
    Route::get('{category:slug}', 'show')->name('category.show');
});

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::get('login', 'login')->name('auth.login');
    Route::get('register', 'register')->name('auth.register');
    Route::get('logout', 'logout')->name('auth.logout');
    Route::get('forgot-password', 'forgot')->name('auth.forgot');
    Route::get('reset-password/{token}', 'reset')->middleware('guest')->name('password.reset');
});


Route::get('page/{slug}', [PageController::class, 'show'])->name('page.show');


Route::get('checkout', function(){
    return view('checkout');
})->name('checkout');



Route::get('cart', function () {
    return view('cart');
})->name('cart');


