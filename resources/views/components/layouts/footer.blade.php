@php($socialLinks = [
    ['name' => 'LinkedIn', 'url' => '#'],
    ['name' => 'GitHub', 'url' => '#'],
    ['name' => 'Twitter', 'url' => '#'],
])

<footer class="mt-24 border-t border-line">
    <div class="container-page flex flex-col gap-8 py-10 md:flex-row md:items-center md:justify-between">
        <div class="space-y-2">
            <x-application-logo />
            <p class="text-sm text-ink-subtle">
                Notes on software, systems and the craft of building things.
            </p>
        </div>

        <div class="flex flex-col gap-4 md:items-end">
            <ul class="flex items-center gap-1">
                @foreach($socialLinks as $link)
                    <li>
                        <a href="{{ $link['url'] }}" class="rounded-full px-3 py-1.5 text-sm text-ink-muted transition hover:bg-surface-raised hover:text-ink">
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="font-mono text-xs text-ink-subtle md:px-3">
                © {{ date('Y') }} {{ config('app.name') }}
            </p>
        </div>
    </div>
</footer>
