<header
    x-cloak
    x-data="{ mobileMenu: false }"
    class="sticky top-0 z-50 bg-surface"
>
    <nav class="flex items-center justify-between py-4 max-w-7xl mx-auto" aria-label="Global">
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
            <a href="{{ route('home') }}" class="text-sm/6 font-semibold text-surface">Home</a>
            <a href="{{ route('about') }}" class="text-sm/6 font-semibold text-surface">About</a>
            <a href="{{ route('gallery') }}" class="text-sm/6 font-semibold text-surface">Gallery</a>
            <a href="{{ route('contact.index') }}" class="text-sm/6 font-semibold text-surface">Contact</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <x-theme-toggle />

            @auth
                <a href="{{ route('profile.index') }}" class="ml-2 text-sm/6 font-semibold text-surface">Dashboard <span aria-hidden="true">&rarr;</span></a>
            @else
                <a href="{{ route('login') }}" class="ml-2 text-sm/6 font-semibold text-surface">Log in <span aria-hidden="true">&rarr;</span></a>
            @endauth
        </div>
    </nav>

    <div x-show="mobileMenu" class="lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50"></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 bg-neutral-100 antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}">
                    <x-application-logo />
                </a>

                <button @click="mobileMenu = false" type="button" class="-m-2.5 rounded-md p-2.5 text-surface">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-1 py-4">
                        <a href="{{ route('home') }}" class="-mx-3 block rounded-lg px-3 py-2 text-sm text-surface">Features</a>
                        <a href="{{ route('about') }}" class="-mx-3 block rounded-lg px-3 py-2 text-sm text-surface">About</a>
                        <a href="{{ route('gallery') }}" class="-mx-3 block rounded-lg px-3 py-2 text-sm text-surface">Gallery</a>
                        <a href="{{ route('contact.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-sm text-surface">Contact</a>
                    </div>
                    <div class="py-4">
                        <x-theme-toggle />

                        @auth
                            <a href="{{ route('profile.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-sm text-surface">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2 text-sm text-surface">Log in</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
