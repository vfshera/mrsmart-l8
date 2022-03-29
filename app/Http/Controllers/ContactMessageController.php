<?php

namespace App\Http\Controllers;

use App\Events\ContactMessageCreatedEvent;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{

    public function index()
    {
        //
    }

    public function store(ContactUsRequest $request)
    {

        $message = $request->validated();

        $contactMsg = ContactMessage::create($message);

        ContactMessageCreatedEvent::dispatch($contactMsg);

        return back()->with('success', 'Thank you for contacting us!');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        //
    }
}