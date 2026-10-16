@php
    $navigation = collect([
        ['name' => 'Writing', 'route' => 'home', 'active' => ['home', 'blog.show']],
        ['name' => 'About', 'route' => 'about'],
        ['name' => 'Experience', 'route' => 'experiences'],
        ['name' => 'Projects', 'route' => 'projects'],
        ['name' => 'Contact', 'route' => 'contact'],
    ])->map(fn (array $item) => $item + [
        'url' => route($item['route']),
        'isActive' => request()->routeIs(...($item['active'] ?? [$item['route']])),
    ]);

    $accountLink = auth()->check()
        ? ['url' => route('dashboard'), 'label' => 'Dashboard', 'icon' => 'arrow-up-right']
        : ['url' => route('login'), 'label' => 'Log in', 'icon' => 'arrow-right'];
@endphp

<header x-data="{ mobileMenu: false }" class="sticky top-0 z-40 border-b border-line/70 bg-canvas/75 backdrop-blur-md supports-[backdrop-filter]:bg-canvas/60">
    <nav class="container-page flex h-14 items-center justify-between gap-6" aria-label="Global">
        <a href="{{ route('home') }}" wire:navigate class="rounded-lg">
            <x-application-logo />
        </a>

        <ul class="hidden items-center gap-1 rounded-full border border-line bg-surface/70 p-1 shadow-card lg:flex">
            @foreach($navigation as $item)
                <li>
                    <a href="{{ $item['url'] }}" wire:navigate
                       @class([
                           'block rounded-full px-3.5 py-1 text-sm font-medium transition',
                           'bg-ink text-canvas' => $item['isActive'],
                           'text-ink-muted hover:bg-surface-raised hover:text-ink' => ! $item['isActive'],
                       ])
                       @if($item['isActive']) aria-current="page" @endif
                    >
                        {{ $item['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="hidden items-center gap-2 lg:flex">
            <x-theme-toggle />

            @auth
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1.5 rounded-full border border-line bg-surface px-3.5 py-1 text-sm font-medium text-ink shadow-card transition hover:border-line-strong">
                    Dashboard
                    <flux:icon.arrow-up-right variant="micro" class="text-ink-subtle" />
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 rounded-full px-3 py-1.5 text-sm font-medium text-ink-muted transition hover:text-ink">
                    Log in
                    <flux:icon.arrow-right variant="micro" />
                </a>
            @endauth
        </div>

        <div class="flex items-center gap-1 lg:hidden">
            <x-theme-toggle />

            <button @click="mobileMenu = true" type="button" class="icon-button">
                <span class="sr-only">Open main menu</span>
                <flux:icon.bars-2 variant="mini" />
            </button>
        </div>
    </nav>

    <div x-show="mobileMenu" x-cloak
         @keydown.escape.window="mobileMenu = false"
         class="lg:hidden" role="dialog" aria-modal="true">
        <div x-show="mobileMenu"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 bg-zinc-950/40 backdrop-blur-sm" @click="mobileMenu = false" aria-hidden="true"></div>

        <div x-show="mobileMenu"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 right-0 z-50 flex w-full max-w-xs flex-col overflow-y-auto border-l border-line bg-surface px-5 py-4 shadow-2xl"
        >
            <div class="flex h-8 items-center justify-between">
                <a href="{{ route('home') }}" wire:navigate @click="mobileMenu = false">
                    <x-application-logo />
                </a>
                <button @click="mobileMenu = false" type="button" class="icon-button">
                    <span class="sr-only">Close menu</span>
                    <flux:icon.x-mark variant="mini" />
                </button>
            </div>

            <nav class="mt-8 flex flex-col gap-1">
                @foreach($navigation as $item)
                    <a href="{{ $item['url'] }}" wire:navigate
                       @click="mobileMenu = false"
                       @class([
                           'flex items-center justify-between rounded-xl px-3 py-2.5 text-base font-medium transition',
                           'bg-primary-soft text-primary-ink' => $item['isActive'],
                           'text-ink-muted hover:bg-surface-raised hover:text-ink' => ! $item['isActive'],
                       ])
                    >
                        {{ $item['name'] }}
                        @if($item['isActive'])
                            <span class="size-1.5 rounded-full bg-primary"></span>
                        @endif
                    </a>
                @endforeach
            </nav>

            <div class="mt-auto border-t border-line pt-4">
                <a href="{{ $accountLink['url'] }}" @click="mobileMenu = false" class="btn-primary w-full">
                    {{ $accountLink['label'] }}
                    <flux:icon :icon="$accountLink['icon']" variant="micro" />
                </a>
            </div>
        </div>
    </div>
</header>
