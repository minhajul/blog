@php($navigation = [
    ['name' => 'Writing', 'route' => 'home', 'active' => ['home', 'blog.show']],
    ['name' => 'About', 'route' => 'about', 'active' => ['about']],
    ['name' => 'Experience', 'route' => 'experiences', 'active' => ['experiences']],
    ['name' => 'Projects', 'route' => 'projects', 'active' => ['projects']],
    ['name' => 'Contact', 'route' => 'contact', 'active' => ['contact']],
])

<header x-data="{ mobileMenu: false }" class="sticky top-0 z-40 border-b border-line/70 bg-canvas/75 backdrop-blur-xl supports-[backdrop-filter]:bg-canvas/60">
    <nav class="container-page flex h-16 items-center justify-between gap-6" aria-label="Global">
        <a href="{{ route('home') }}" wire:navigate class="rounded-lg">
            <x-application-logo />
        </a>

        <ul class="hidden items-center gap-1 rounded-full border border-line bg-surface/70 p-1 shadow-card lg:flex">
            @foreach($navigation as $item)
                @php($isActive = request()->routeIs(...$item['active']))
                <li>
                    <a href="{{ route($item['route']) }}" wire:navigate
                       @class([
                           'block rounded-full px-4 py-1.5 text-sm font-medium transition',
                           'bg-ink text-canvas' => $isActive,
                           'text-ink-muted hover:bg-surface-raised hover:text-ink' => ! $isActive,
                       ])
                       @if($isActive) aria-current="page" @endif
                    >
                        {{ $item['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="hidden items-center gap-2 lg:flex">
            <x-theme-toggle />

            @auth
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1.5 rounded-full border border-line bg-surface px-4 py-1.5 text-sm font-medium text-ink shadow-card transition hover:border-line-strong">
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

            <button @click="mobileMenu = true" type="button" class="inline-grid size-9 place-items-center rounded-full text-ink-muted transition hover:bg-surface-raised hover:text-ink">
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
                <button @click="mobileMenu = false" type="button" class="inline-grid size-9 place-items-center rounded-full text-ink-muted transition hover:bg-surface-raised hover:text-ink">
                    <span class="sr-only">Close menu</span>
                    <flux:icon.x-mark variant="mini" />
                </button>
            </div>

            <nav class="mt-8 flex flex-col gap-1">
                @foreach($navigation as $item)
                    @php($isActive = request()->routeIs(...$item['active']))
                    <a href="{{ route($item['route']) }}" wire:navigate
                       @click="mobileMenu = false"
                       @class([
                           'flex items-center justify-between rounded-xl px-3 py-2.5 text-base font-medium transition',
                           'bg-primary-soft text-primary-ink' => $isActive,
                           'text-ink-muted hover:bg-surface-raised hover:text-ink' => ! $isActive,
                       ])
                    >
                        {{ $item['name'] }}
                        @if($isActive)
                            <span class="size-1.5 rounded-full bg-primary"></span>
                        @endif
                    </a>
                @endforeach
            </nav>

            <div class="mt-auto border-t border-line pt-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                       @click="mobileMenu = false"
                       class="flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-4 py-2.5 text-sm font-semibold text-canvas transition hover:opacity-90">
                        Dashboard
                        <flux:icon.arrow-up-right variant="micro" />
                    </a>
                @else
                    <a href="{{ route('login') }}" wire:navigate
                       @click="mobileMenu = false"
                       class="flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-4 py-2.5 text-sm font-semibold text-canvas transition hover:opacity-90">
                        Log in
                        <flux:icon.arrow-right variant="micro" />
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>
