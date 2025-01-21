<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{
    public function render()
    {
        $categories = Category::with('products')->where('site_id', app("site")->id)->get();
        return view('livewire.category-list', compact('categories'));
    }
}
