<?php

namespace Tests\Feature\Mail;

use App\Http\Livewire\ContactForm;
use App\Mail\ContactSentMail;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactSentMailTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function contact_mail_sent_content()
    {
        $contact = ContactMessage::factory()->create();

        $this->assertDatabaseCount('contact_messages', 1);

        $mailable = new ContactSentMail($contact->name);

        $mailable->assertSeeInHtml($contact->name);
        $mailable->assertSeeInHtml("Hello");
    }

    /** @test **/
    public function contact_mail_sent_queued()
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('name', 'Sender Name')
            ->set('email', 'sender@examplmail.com')
            ->set('message', 'Something useful')
            ->call('submit')
            ->assertRedirect('/');

        Mail::assertQueued(ContactSentMail::class);

    }

}