<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
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

        return back()->with('success','Thank you for contacting us!');
    }



   
    public function destroy(ContactMessage $contactMessage)
    {
        //
    }
}