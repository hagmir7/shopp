<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductSearch extends Component
{
    public $search = '';
    public $showResults = false;

    public function updatedSearch()
    {
        $this->showResults = strlen($this->search) >= 2;
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->showResults = false;
    }

    public function render()
    {
        $products = [];

        if (strlen($this->search) >= 2) {
            $products = Product::where('name', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%")
                ->select(['id', 'name', 'price'])
                ->take(10)
                ->get();
        }

        return view('livewire.product-search', [
            'products' => $products
        ]);
    }
}
