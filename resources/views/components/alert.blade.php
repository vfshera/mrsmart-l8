<div x-data="{ open: true }" x-show="open" x-init="setTimeout(() => open = false ,4500)"
    class="alert alert-{{ $type }}" {{ $attributes }} x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-2"
    x-transition:leave-end="opacity-0 -translate-y-10">
    <button type="button" class="close" @click="open = false">×</button>

    <div class="message-icon">

        <strong>{{ $msg }}</strong>

        {{ $slot }}

    </div>
</div>
