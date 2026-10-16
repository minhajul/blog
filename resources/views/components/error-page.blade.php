@props([
    'code',
    'title',
    'message',
])

<x-layouts.app :title="$title" centered>
    <div class="flex flex-col items-center text-center fadeInUp">
        <p class="font-serif text-7xl italic leading-none text-primary sm:text-8xl">{{ $code }}</p>
        <h1 class="mt-6 text-2xl font-semibold tracking-tight text-ink sm:text-3xl">{{ $title }}</h1>
        <p class="mt-3 max-w-md text-base text-ink-muted">{{ $message }}</p>

        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('home') }}" class="btn-primary">
                <flux:icon.arrow-left variant="micro" />
                Back to home
            </a>
            <a href="{{ URL::current() }}" class="btn-secondary">
                <flux:icon.arrow-path variant="micro" />
                Try reloading
            </a>
        </div>
    </div>
</x-layouts.app>
