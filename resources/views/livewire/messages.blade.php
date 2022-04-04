<div class="mrsmart-container" x-data="{ open: @entangle('showMessage') }">
    <div class="view-message-wrapper" x-cloak x-show="open" @click.away="open = false">

        <div class="view-message-modal">

            <header>
                <p x-text="$wire.name"></p>
                <span @click="open = false">&times;</span>
            </header>

            <p class="content" x-text="$wire.msg"></p>

        </div>

    </div>

    <div class="messages-page">

        <h1>Messages</h1>

        <hr>


        <div class="messages">

            <div class="message-header">
                <div class="name">Name</div>
                <div class="email">Email</div>
                <div class="received">Received</div>
                <div class="content">Content</div>
            </div>

            <hr>

            @foreach ($messages as $index => $message)
                <div class="message" wire:click="setMessage({{ $message }})">
                    <div class="name">{{ $message->name }}</div>
                    <div class="email">{{ $message->email }}</div>
                    <div class="received">{{ date('jS M Y H:i', strtotime($message->created_at)) }}</div>
                    <div class="content">{{ $message->message }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
