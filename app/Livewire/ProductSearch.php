<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $query = '';
    public $results = [];

    public function updatedQuery()
    {
        if (strlen($this->query) < 2) {
            $this->results = [];
            return;
        }

        $this->results = Product::with('images')
            ->where('site_id', app('site')->id)
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->query . '%')
                    ->orWhere('description', 'like', '%' . $this->query . '%');
            })
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
