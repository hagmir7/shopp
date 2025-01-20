<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RegisterForm extends Component
{
    #[Validate('required|string|max:255', as: "First name")]
    public $first_name;
    #[Validate('required|string|max:255', as: "Last name")]
    public $last_name;
    #[Validate('required|email|unique:users', as: "Email")]
    public $email;
    #[Validate('required|min:9|max:15|unique:users', as: "Phone")]
    public $phone;
    #[Validate('required|min:6|confirmed', as: "Password")]
    public $password;

    public $password_confirmation;


    public static function mount()
    {
        if (auth()->user()) {
            return redirect('profile');
        }
    }


    public function register()
    {
        $this->validate();
        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'site_id' => app('site')->id
        ]);

        // $user->assignRole('client');

        Auth::login($user);
        $this->dispatch("reloadPage");
    }


    public function render()
    {
        return view('livewire.register-form');
    }
}
