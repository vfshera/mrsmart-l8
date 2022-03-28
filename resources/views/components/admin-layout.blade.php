<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles


</head>

<body class="mrsmart">
    <x-navbar />

    <main class="mrsmart-parent pt-12">
        {{ $slot }}
    </main>


    <livewire:modal />

    @stack('modals')

    @stack('scripts')

    @livewireScripts

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>

</html>
