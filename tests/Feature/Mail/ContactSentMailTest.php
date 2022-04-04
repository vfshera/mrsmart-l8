<?php

namespace Tests\Feature\Mail;

use App\Mail\ContactSentMail;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactSentMailTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function contact_mail_content()
    {
        $contact = ContactMessage::factory()->create();

        $this->assertDatabaseCount('contact_messages', 1);

        $mailable = new ContactSentMail($contact->name);

        $mailable->assertSeeInHtml($contact->name);
        $mailable->assertSeeInHtml("Hello");
    }

}