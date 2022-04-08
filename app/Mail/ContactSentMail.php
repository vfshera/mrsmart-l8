<?php

namespace App\Mail;

use App\Models\SiteSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSentMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name;
    public $siteInfo;

    public function __construct($name)
    {
        $this->name = $name;

        $this->siteInfo = SiteSettings::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject("Message Delivered!")->view('emails.contact.sent');
    }
}