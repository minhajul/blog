<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.head />

    @fluxAppearance
</head>
<body class="relative isolate min-h-screen antialiased">
    <x-backdrop-glow />

    <div class="flex min-h-svh flex-col items-center justify-center gap-8 p-6 md:p-10">
        <div class="flex w-full max-w-sm flex-col gap-8">
            <a href="{{ route('home') }}" class="flex justify-center" wire:navigate>
                <x-application-logo />
            </a>

            <div class="card px-6 py-8 sm:px-8">
                {{ $slot }}
            </div>

            <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-1.5 text-sm text-ink-subtle transition hover:text-ink" wire:navigate>
                <flux:icon.arrow-left variant="micro" />
                Back to the blog
            </a>
        </div>
    </div>

    @fluxScripts
</body>
</html>
