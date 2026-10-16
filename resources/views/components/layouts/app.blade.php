@props([
    'title' => null,
    'centered' => false,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.head :title="$title" />

    @livewireStyles
    @fluxAppearance

    @stack('styles')
</head>
<body class="relative isolate flex min-h-screen flex-col antialiased">
    <a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-60 focus:rounded-lg focus:bg-surface focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:shadow-card-hover">
        Skip to content
    </a>

    <x-backdrop-glow />

    <x-layouts.header/>

    <main id="content" @class([
        'flex grow flex-col container-page',
        'justify-center py-12 sm:py-20' => $centered,
        'pb-20' => ! $centered,
    ])>
        {{ $slot }}
    </main>

    <x-layouts.footer/>

    <x-toast-message />

    @livewireScripts
    @fluxScripts

    @stack('scripts')
</body>
</html>
