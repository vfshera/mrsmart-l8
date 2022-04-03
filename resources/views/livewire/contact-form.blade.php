<div class="contact-form">

    <form wire:submit.prevent="submit" method="POST">
        <x-form.input-field label="Name" model="name" />
        <x-form.input-field label="Email" inputType="email" model="email" />
        <x-form.text-area label="Message" model="message" />
        @csrf()

        <button>send</button>
    </form>
</div>
