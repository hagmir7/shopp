<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $full_name;
    public $phone;
    public $email;
    public $message;
    public $subject;
    public $contact_id;

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string'],
            'subject' => ['required', 'string', 'max:255'],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'full_name' => __('Full Name'),
            'phone' => __('Phone'),
            'email' => __('Email'),
            'message' => __('Message'),
            'subject' => __('Subject'),
        ];
    }

    public function store()
    {
        $this->validate();

        Contact::create([
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'message' => $this->message,
            'subject' => $this->subject,
            'site_id' => app('site')->id,
        ]);

        session()->flash('message', __('Your message has been sent successfully'));
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
