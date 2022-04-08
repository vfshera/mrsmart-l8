<?php

namespace App\Mail;

use App\Models\SiteSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReceivedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $sender;
    public $email;
    public $msg;
    public $siteInfo;

    public function __construct($sender, $email, $msg)
    {
        $this->msg = $msg;
        $this->email = $email;
        $this->sender = $sender;

        $this->siteInfo = SiteSettings::first();

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New Message Received!")->replyTo($this->email, $this->sender)->view('emails.contact.received');

    }
}