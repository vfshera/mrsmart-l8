<?php

namespace App\Listeners;

use App\Events\ContactMessageCreatedEvent;
use App\Mail\ContactReceivedMail;
use App\Mail\ContactSentMail;
use Illuminate\Support\Facades\Mail;

class SendContactMessageNotifucation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ContactMessageCreatedEvent  $event
     * @return void
     */
    public function handle(ContactMessageCreatedEvent $event)
    {
        //Notify Sender
        Mail::to($event->contactMessage->email)->send(new ContactSentMail($event->contactMessage->name));

        //Notify Admin
        Mail::to(config('mail.from.address'))->cc([config('mail.from.cc_address')])
            ->send(new ContactReceivedMail($event->contactMessage->name, $event->contactMessage->email, $event->contactMessage->message));
    }
}