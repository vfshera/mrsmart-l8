<?php

namespace App\Http\Livewire;

use App\Events\ContactMessageCreatedEvent;
use App\Models\ContactMessage;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'message' => 'required|min:5',
    ];

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);

    }

    public function submit()
    {

        $newMsg = $this->validate();

        session()->flash('success', 'Thank you for contacting us!');

        $contactMsg = ContactMessage::create($newMsg);

        ContactMessageCreatedEvent::dispatch($contactMsg);

        return redirect()->route('welcome');

    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}