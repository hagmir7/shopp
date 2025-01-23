<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CheckoutForm extends Component
{
    // Personal Information
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';

    // Address Information
    public $address = '';
    public $city = '';
    public $zip = '';
    public $country = 'United States';

    // Order Details
    public $cart_items = [];
    public $total_amount = 0;
    public $shipping_cost = 8.00;

    public function mount()
    {
        // Populate cart items from cart package
        $this->cart_items = \Cart::getContent()->toArray();
        $this->total_amount = \Cart::getTotal() + $this->shipping_cost;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9\-\(\)\/\+\s]*$/',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Phone number is required.',
            'address.required' => 'Shipping address is required.',
            'city.required' => 'City is required.',
            'zip.required' => 'ZIP code is required.',
        ];
    }

    public function updateQuantity($productId, $quantity)
    {
        \Cart::update($productId, [
            'quantity' => [
                'relative' => false,
                'value' => max(1, intval($quantity))
            ]
        ]);

        // Refresh cart items and total
        $this->mount();
    }

    public function removeItem($productId)
    {
        \Cart::remove($productId);
        $this->mount();
    }

    public function placeOrder()
    {
        $this->validate();
        // Create Order
        $order = \App\Models\Order::create([
            'user_id' => auth()->id() ?? null,
            'total_amount' => $this->total_amount,
            'full_name' => $this->first_name . " " . $this->last_name,
            'status' => 1,
            'address' => $this->address,
            'city_name' => $this->city,
            'email' => $this->email,
            'zip_code' => $this->zip,
            'phone' => $this->phone,
        ]);

        // Create Order Items
        foreach ($this->cart_items as $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['attributes']['product_id'],
                'quantity' => $item['quantity'],
                'total' => $item['price'],
            ]);
        }

        // Clear Cart
        \Cart::clear();

        DB::commit();

        // Redirect or show success message
        return redirect()->route('thanks', ['order' => $order->id])
            ->with('success', 'Order placed successfully!');

        // try {




        // } catch (\Exception $e) {

        //     dd("Here is the error");
        //     DB::rollBack();
        //     session()->flash('error', 'Failed to place order. Please try again.');
        // }
    }

    public function render()
    {
        return view('livewire.checkout-form', [
            'cart_items' => $this->cart_items,
            'total_amount' => $this->total_amount,
        ]);
    }
}
