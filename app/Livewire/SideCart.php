<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class SideCart extends Component
{

    public function refreshCart()
    {
        // This method will be called when cart-updated event is dispatched
    }

    public function incrementQuantity($productId)
    {
        try {
            $product = \Cart::get($productId);
            if ($product && $product->quantity < 99) {
                \Cart::update($productId, [
                    'quantity' => [
                        'relative' => true,
                        'value' => 1
                    ]
                ]);
                $this->dispatch('cart-updated');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update cart quantity.');
        }
    }

    public function decrementQuantity($productId)
    {
        try {
            $product = \Cart::get($productId);
            if ($product) {
                if ($product->quantity > 1) {
                    \Cart::update($productId, [
                        'quantity' => [
                            'relative' => true,
                            'value' => -1
                        ]
                    ]);
                } else {
                    \Cart::remove($productId);
                }
                $this->dispatch('cart-updated');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update cart quantity.');
        }
    }

    public function updateQuantity($productId, $newQuantity)
    {
        try {
            $product = \Cart::get($productId);
            if ($product) {
                $quantity = max(1, min(99, intval($newQuantity)));
                \Cart::update($productId, [
                    'quantity' => [
                        'relative' => false,
                        'value' => $quantity
                    ]
                ]);

                $this->dispatch('cart-updated');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update cart quantity.');
        }
    }

    public function delete($productId)
    {
        \Cart::remove($productId);
        $this->dispatch('cart-updated');
        $this->dispatch('add-to-cart');
    }


    #[On('add-to-cart')]
    public function render()
    {
        return view('livewire.side-cart', [
            'cartItems' => \Cart::getContent(),
            'cartTotal' => \Cart::getTotal()
        ]);
    }
}
