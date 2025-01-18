<?php

namespace App\Livewire;

use App\Models\Color;
use App\Models\Dimension;
use App\Models\Product;
use Livewire\Component;

class ViewProduct extends Component
{

    public Product $product;


    public $color;
    public $dimension;
    public $quantity = 1;
    public $price;

    public function mount(Product $product)
    {
        $this->price = $product->price;
    }


    public function updatedDimension()
    {
        if($this->dimension){
            $dimension = Dimension::find($this->dimension);
            $this->price = $dimension->price;
        }
    }


    public function add()
    {
        if($this->color){
            $color = Color::find($this->color);
        }else{
            $color = null;
        }

        if($this->dimension){
            $dimension = Dimension::find($this->dimension);
        }else{
            $dimension = null;
        }


        \Cart::add([
            'id' => $this->product?->id.'-'.($this->color ?? $this?->color?->id ).'-'.($this?->dimension ?? $this?->dimension?->id),
            'name' => $this->product->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'attributes' => [
                'color' => $color && $color->name ?  $color->name : false,
                'color_code' => $color?->code ? $color->code : false,
                'image' => $this->product->images?->first()?->path,
                'dimension' => $dimension ? $dimension->value : false,
                'slug' => $this->product->slug,
                'product_id' => $this->product?->id,
                'dimension_id' => $dimension?->id,
            ]
        ]);

        $this->dispatch('add-to-cart');
    }


    public function render()
    {
        return view('livewire.view-product');
    }
}
