<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function show(Product $product)
    {
        $title = $product->name;
        $image = $product->image;
        $description = $product->description;
        return view('product.show', compact('product', 'title', 'image', 'description'));
    }

}
