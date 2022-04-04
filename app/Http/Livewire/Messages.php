<?php

namespace App\Http\Livewire;

use App\Models\ContactMessage;
use Livewire\Component;

class Messages extends Component
{

    public $messages;
    public $msg = "";
    public $name = "";
    public $showMessage = false;

    public function mount()
    {
        $this->messages = ContactMessage::all();
    }

    public function setMessage($message)
    {

        $this->msg = $message['message'];
        $this->name = $message['name'];

        $this->showMessage = $this->msg != "";

    }
    public function render()
    {

        return view('livewire.messages');
    }
}