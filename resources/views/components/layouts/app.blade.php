<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    @livewireStyles
    @fluxAppearance

    @stack('styles')
</head>
<body class="min-h-screen antialiased bg-surface">
<div class="bg-muted">
    <x-layouts.header/>

    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        {{ $slot }}
    </div>

    <x-layouts.footer/>

    <x-toast-message />

    @livewireScripts
    @fluxScripts
</div>
</body>
