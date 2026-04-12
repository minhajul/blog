<header x-data="{ mobileMenu: false }">
    <nav class="flex items-center justify-between py-4 max-w-7xl px-4 sm:px-6 mx-auto" aria-label="Global">
        <div class="flex lg:flex-1 items-center">
            <a href="{{ route('home') }}">
                <x-application-logo />
            </a>
        </div>

        <div class="flex lg:hidden">
            <button @click="mobileMenu = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-surface">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <flux:navbar>
                <flux:navbar.item class="text-sm/6 font-semibold text-surface" href="{{ route('home') }}" wire:navigate>Home</flux:navbar.item>
                <flux:navbar.item class="text-sm/6 font-semibold text-surface" href="{{ route('about') }}" wire:navigate>About</flux:navbar.item>
                <flux:navbar.item class="text-sm/6 font-semibold text-surface" href="{{ route('experiences') }}" wire:navigate>Experiences</flux:navbar.item>
                <flux:navbar.item class="text-sm/6 font-semibold text-surface" href="{{ route('projects') }}" wire:navigate>Projects</flux:navbar.item>
                <flux:navbar.item class="text-sm/6 font-semibold text-surface" href="{{ route('contact') }}" wire:navigate>Contact</flux:navbar.item>
            </flux:navbar>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <x-theme-toggle />

            @auth
                <a href="{{ route('dashboard') }}" class="ml-2 text-sm/6 font-semibold text-surface">
                    Dashboard →
                </a>
            @else
                <a href="{{ route('login') }}" class="ml-2 text-sm/6 font-semibold text-surface">
                    Log in →
                </a>
            @endauth
        </div>
    </nav>

    <div x-show="mobileMenu" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50 bg-black/30 backdrop-blur-sm" @click="mobileMenu = false" aria-hidden="true"></div>

        <div x-show="mobileMenu"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 right-0 z-50 w-full max-w-xs"
        >
            <div class="flex h-full bg-surface-muted dark:bg-zinc-900 shadow-2xl overflow-y-auto">
                <div class="w-full py-6 px-5">
                    <div class="flex items-center justify-between mb-8">
                        <a href="{{ route('home') }}" @click="mobileMenu = false">
                            <x-application-logo />
                        </a>
                        <button @click="mobileMenu = false" type="button" class="p-2 rounded-full text-surface hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <span class="sr-only">Close menu</span>
                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <nav class="space-y-1">
                        @php($routes = [
                            ['name' => 'Home', 'route' => route('home')],
                            ['name' => 'About', 'route' => route('about')],
                            ['name' => 'Experiences', 'route' => route('experiences')],
                            ['name' => 'Projects', 'route' => route('projects')],
                            ['name' => 'Contact', 'route' => route('contact')],
                        ])
                        @foreach($routes as $item)
                            <a href="{{ $item['route'] }}" wire:navigate
                               @click="mobileMenu = false"
                               class="flex items-center gap-3 py-2 text-base font-medium text-surface rounded-xl hover:bg-primary/10 hover:text-primary transition-all duration-200">
                                {{ $item['name'] }}
                            </a>
                        @endforeach
                    </nav>

                    <div class="mt-5 pt-3 border-t border-zinc-200 dark:border-zinc-700">
                        @auth
                            <div class="flex mb-4">
                                <x-theme-toggle />

                                <a href="{{ route('dashboard') }}" wire:navigate
                                   @click="mobileMenu = false"
                                   class="flex items-center justify-center gap-2 px-4 py-2 text-base font-semibold text-surface bg-primary rounded-xl hover:bg-primary/90 transition-colors">
                                    Dashboard
                                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        @else
                            <a href="{{ route('login') }}" wire:navigate
                               @click="mobileMenu = false"
                               class="flex items-center justify-center gap-2 px-4 py-3 w-full text-base font-semibold text-white bg-primary rounded-xl hover:bg-primary/90 transition-colors">
                                Log in
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
