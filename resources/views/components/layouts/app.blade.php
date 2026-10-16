@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.head :title="$title" />

    @livewireStyles
    @fluxAppearance

    @stack('styles')
</head>
<body class="relative isolate min-h-screen flex flex-col bg-canvas font-sans text-ink antialiased">
    <a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-60 focus:rounded-lg focus:bg-surface focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:shadow-card-hover">
        Skip to content
    </a>

    <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[32rem] overflow-hidden">
        <div class="absolute left-1/2 top-[-12rem] h-[28rem] w-[56rem] -translate-x-1/2 rounded-full bg-brand-400/15 blur-3xl dark:bg-brand-500/10"></div>
    </div>

    <x-layouts.header/>

    <main id="content" class="grow container-page">
        {{ $slot }}
    </main>

    <x-layouts.footer/>

    <x-toast-message />

    @livewireScripts
    @fluxScripts
</body>
</html>
