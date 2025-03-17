<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductSearch extends Component
{
    public $query;
    public $results = [];

        public function updated($property)
        {
            dd("updated");
            if ($property === 'query') {
                if (strlen($this->query) >= 2) {
                    $this->results = Product::with('images')
                        ->where(function ($query) {
                            $query->where('name', 'like', '%' . $this->query . '%')
                                ->orWhere('description', 'like', '%' . $this->query . '%');
                        })
                        ->where('site_id', app('site')->id)
                        ->take(10)
                        ->get();
                } else {
                    $this->results = [];
                }
            }
        }

    public function render()
    {
        return view('livewire.product-search');
    }
}
