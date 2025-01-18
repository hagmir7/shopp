<?php
// SideCart.php
namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class SideCart extends Component
{
    public function delete($product_id)
    {
        \Cart::remove($product_id);
        $this->dispatch('cart-updated');
    }

    #[On('add-to-cart')]
    public function render()
    {
        return view('livewire.side-cart');
    }
}
