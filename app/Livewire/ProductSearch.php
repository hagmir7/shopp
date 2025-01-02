<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductSearch extends Component
{
    public $search = '';

    public function render()
    {
        $results = [];

        if (strlen($this->search) >= 2) {
            $results = Product::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->where('site_id', app('site')->id)
                ->take(10)
                ->get();
        }
        return view('livewire.product-search', compact('results'));
    }
}
