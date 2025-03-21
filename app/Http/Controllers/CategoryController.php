<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $title = $category->name;
        $image = $category->image;
        $products = $category->products()->with('images')->get();

        return view('category.show', compact('products', 'title', 'image'));
    }

    public function list(){
        $categories = Category::with('products')->get();
        $title = __("Categories");
        return view("category.list", compact('categories', 'title'));
    }
}
