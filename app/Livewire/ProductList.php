<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        $products = Product::where('site_id', app("site")->id)->with(['images'])->latest()->get();
        return view('livewire.product-list', compact('products'));
    }
}
