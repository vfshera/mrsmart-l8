<?php

namespace Tests\Feature\Mail;

use App\Http\Livewire\ContactForm;
use App\Mail\ContactReceivedMail;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactReceivedMailTest extends TestCase
{
    use RefreshDatabase;
    /** @test **/
    public function contact_mail_received_content()
    {
        $contact = ContactMessage::factory()->create();

        $this->assertDatabaseCount('contact_messages', 1);

        $mailable = new ContactReceivedMail($contact->name, $contact->email, $contact->message);

        $mailable->assertSeeInHtml($contact->name);
        $mailable->assertSeeInHtml("received");
    }

    /** @test **/
    public function contact_mail_received_queued()
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('name', 'Sender Name')
            ->set('email', 'sender@examplmail.com')
            ->set('message', 'Something useful')
            ->call('submit')
            ->assertRedirect('/');

        Mail::assertQueued(ContactReceivedMail::class);

    }
}