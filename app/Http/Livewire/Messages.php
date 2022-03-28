<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Models\ContactMessage;

class Messages extends Component
{

    public $messages;
    public $msg = "Sender Message";
    public $name = "Sender Name";

    public function mount()
    {
        $this->messages = ContactMessage::all();
    }

    public function setMessage($name , $message)
    {
        
        $this->msg = $message;
        $this->name = $name;
       
    }
    public function render()
    {

        return view('livewire.messages');
    }
}