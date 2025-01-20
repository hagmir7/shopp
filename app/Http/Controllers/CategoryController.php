<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $title = $category->name;
        $image = $category->image;
        return view('category.show', compact('category', 'title', 'image'));
    }

    public function list(){

        $categories = Category::with('products');
        return view("category.list", compact('categories'));
    }
}
