<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function name_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('name', '')
            ->call('submit')
            ->assertHasErrors(['name' => 'required']);
    }
    /** @test **/
    public function name_is_should_be_atleast_two_characters()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'a')
            ->call('submit')
            ->assertHasErrors(['name']);
    }

    /** @test **/
    public function email_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('email', '')
            ->call('submit')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test **/
    public function email_must_be_valid()
    {

        Livewire::test(ContactForm::class)
            ->set('email', 'test.com')
            ->call('submit')
            ->assertHasErrors(['email']);

    }

    /** @test **/
    public function message_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('message', '')
            ->call('submit')
            ->assertHasErrors(['message' => 'required']);
    }

    /** @test **/
    public function message_must_be_atleast_five_characters()
    {

        Livewire::test(ContactForm::class)
            ->set('message', 'test')
            ->call('submit')
            ->assertHasErrors(['message']);

    }

    /** @test **/
    public function can_save_contact_message()
    {

        Livewire::test(ContactForm::class)
            ->set('name', 'Franklin')
            ->set('email', 'info@example.com')
            ->set('message', 'Can i send you a message?')
            ->call('submit');

        $this->assertDatabaseCount('contact_messages', 1);

    }

    /** @test **/
    public function redirects_back_to_welcome()
    {

        Livewire::test(ContactForm::class)
            ->set('name', 'Franklin')
            ->set('email', 'info@example.com')
            ->set('message', 'Can i send you a message?')
            ->call('submit')
            ->assertRedirect('/');

    }
}