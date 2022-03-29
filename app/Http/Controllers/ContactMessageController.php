<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSentMail;
use App\Models\ContactMessage;
use App\Mail\ContactReceivedMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactUsRequest;

class ContactMessageController extends Controller
{
   
    public function index()
    {
        //
    }



    public function store(ContactUsRequest $request)
    {

        $message = $request->validated();

        ContactMessage::create($message);

        Mail::to($message['email'])->send(new ContactSentMail($message['name']));
        
        Mail::to(config('mail.from.address'))->cc([config('mail.from.cc_address')])
            ->send(new ContactReceivedMail($message['name'],$message['email'],$message['message']));

        return back()->with('success','Thank you for contacting us!');
    }



   
    public function destroy(ContactMessage $contactMessage)
    {
        //
    }
}