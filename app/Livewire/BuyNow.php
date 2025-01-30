<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BuyNow extends Component
{

    #[Validate('required|min:2|max:150', as:"Full name")]
    public $full_name;
    #[Validate('required|min:2|max:100', as: "Phone")]
    public $phone;
    #[Validate('nullable|email|min:4|max:100', as: "Eamil")]
    public $email;
    #[Validate('nullable|min:3|max:100', as: "City")]
    public $city;
    #[Validate('nullable|min:9|max:150', as: "Address")]
    public $address;
    #[Validate('nullable|min:3|max:100', as: "Zip Code")]
    public $zip_code;
    public $quantity = 1;
    public $price;

    public $color;
    public $dimension;

    public Product $product;

    public function save()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->id() ?? null,
            'city_name' => $this->city,
            'full_name' => $this->full_name,
            'zip_code' => $this->zip_code,
            'phone' => $this->phone,
            'email' => $this->email,
            'total_amount' => $this->product->price * intval($this->quantity),
            'address' => $this->address,
            'site_id' => app("site")->id
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $this->product->id,
            'dimension_id' => $this->dimension,
            'quantity' => $this->quantity,
            'color_id' => $this->color,
            'total' => intval($this->quantity) * $this->product->price
        ]);


        return redirect(route('thanks'));
    }

    public function render()
    {
        return view('livewire.buy-now');
    }
}
