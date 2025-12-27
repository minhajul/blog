<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@minahjcse">
    <meta name="twitter:creator" content="@">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:type" content="blog">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Minimal Blog For Personal Use - {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>
<body class="min-h-screen bg-neutral-100 antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
<div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
    <div class="flex w-full max-w-md flex-col gap-6">
        <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
            <x-application-logo />
        </a>

        <div class="flex flex-col gap-6">
            <div class="rounded-md border bg-color dark:border-stone-800 text-color shadow-md">
                <div class="px-10 py-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>

@fluxScripts

</body>
</html>
