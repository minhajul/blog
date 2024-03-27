<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Minimal Blog For Personal Use - {{ config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        <div class="font-sans antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
