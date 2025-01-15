<?php

namespace App\Livewire;

use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;

class BuyNow extends Component
{

    public $full_name;
    public $phone;
    public $email;
    public $city;
    public $address;
    public $zip_code;
    public $quantity;

    public $price;


    public $dimension;

    public Product $product;

    public function save()
    {
        $order = Order::create([
            'user_id' => auth()?->id(),
            'city_name' => $this->city,
            'full_name' => $this->full_name,
            'zip_code' => $this->zip_code,
            'total_amount',
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
        ]);

        $orderItem = OrderItem::craete([
            'order_id' => $order->id,
            'product_id' => $this->product->id,
            'dimension_id' => $this->dimension,
            'quantity' => $this->quantity,
            'totla' => intval($this->quantity) * $this->price
        ]);
    }

    public function render()
    {
        return view('livewire.buy-now');
    }
}
