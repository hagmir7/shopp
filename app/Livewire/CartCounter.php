<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class CartCounter extends Component
{

    #[On('add-to-cart')]
    public function render()
    {
        // \Cart::clear();
        return view('livewire.cart-counter');
    }
}
