<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Minimal Blog For Personal Use - {{ config('app.name') }}</title>

        @include('composer.header')

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
