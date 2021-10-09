<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <livewire:styles />
        <style>
            [x-cloak] { display: none !important; }
        </style>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        @if(!request()->route()->named('checkout.index'))
            @livewire('navigation-menu')
        @endif

        <!-- Page Content -->
        <div class="bg-white">
            {{ $slot }}
        </div>

        <x-banner/>

        <x-modal />
        <livewire:scripts />
    </body>
</html>
