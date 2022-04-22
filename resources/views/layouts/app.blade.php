<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('composer.header')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class="antialiased"
      x-data="{'darkMode': false, mobileMenuOpen: false}"
      x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
      $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
>
<div :class="{ 'dark': darkMode === true }">
    <div class="relative bg-slate-900" @click.away="mobileMenuOpen = false">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="{{ route('home') }}">
                        <span class="sr-only">{{ config('app.name') }}</span>
                        @if($setting = \App\Models\Setting::first())
                            <img class="h-8 w-auto sm:h-10" src="{{ $setting->logoUrl() }}" alt="Logo">
                        @else
                            <h2 class="text-2xl font-medium text-white hover:text-gray-300 italic">{{ config('app.name') }}</h2>
                        @endif
                    </a>
                </div>

                <div class="-mr-2 -my-2 md:hidden">
                    <button @click="mobileMenuOpen = true" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                        <span class="sr-only">Open menu</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <nav class="hidden md:flex space-x-10">
                    <a href="{{ route('home') }}" class="text-base font-medium text-white hover:text-gray-300">
                        Home
                    </a>

                    <a href="{{ route('about') }}" class="text-base font-medium text-white hover:text-gray-300">
                        About Me
                    </a>

                    <a href="{{ route('gallery') }}" class="text-base font-medium text-white hover:text-gray-300">
                        Gallery
                    </a>

                    <a href="{{ route('contact.index') }}" class="text-base font-medium text-white hover:text-gray-300">
                        Contact
                    </a>
                </nav>

                <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                    <div class="flex justify-end items-center space-x-2">
                        <span class="text-sm text-white dark:text-gray-500">Light</span>
                        <label for="toggle" class="w-9 h-5 flex items-center bg-gray-300 rounded-full p-1 cursor-pointer duration-300 ease-in-out dark:bg-gray-600">
                            <div class="toggle-dot bg-white w-4 h-4 rounded-full shadow-md transform duration-300 ease-in-out dark:translate-x-3"></div>
                        </label>
                        <span class="text-sm text-gray-400 dark:text-white">Dark</span>
                        <input id="toggle" type="checkbox" class="hidden" :value="darkMode" @click="darkMode = !darkMode" />
                    </div>
                </div>
            </div>
        </div>

        <div x-show="mobileMenuOpen" class="z-50 absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-gray-800 divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="sr-only">{{ config('app.name') }}</span>
                            @if($setting = \App\Models\Setting::first())
                                <img class="h-8 w-auto sm:h-10" src="{{ $setting->logoUrl() }}" alt="Logo">
                            @else
                                <h2 class="text-2xl font-medium text-white hover:text-gray-300 italic">{{ config('app.name') }}</h2>
                            @endif
                        </div>
                        <div class="-mr-2">
                            <button @click="mobileMenuOpen = false" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="py-6 px-5 space-y-6">
                    <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                        <a href="{{ route('home') }}" class="text-base font-medium text-gray-300">
                            Home
                        </a>

                        <a href="{{ route('about') }}" class="text-base font-medium text-gray-300">
                            About Me
                        </a>

                        <a href="{{ route('gallery') }}" class="text-base font-medium text-gray-300">
                            Gallery
                        </a>

                        <a href="{{ route('contact.index') }}" class="text-base font-medium text-gray-300">
                            Contact
                        </a>
                    </div>

                    <div class="mt-6 border-t border-gray-400 pt-4 text-base font-medium text-gray-300">
                        @auth
                            <a href="{{ route('profile.index') }}" class="block py-2 text-sm text-gray-300">
                                {{ auth()->user()->name }}
                            </a>

                            <a class="block py-2 text-sm text-gray-300">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Sign out</button>
                                </form>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block py-2 text-sm text-gray-300">
                                Sign in
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="bg-slate-100 dark:bg-slate-800">
        @yield('content')
    </main>
</div>

<footer class="bg-slate-900" aria-labelledby="footerHeading">
    <h2 id="footerHeading" class="sr-only">Footer</h2>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-10">

        <div>
            <livewire:newsletter />
        </div>

        <div class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-between">
            <div class="flex space-x-6 md:order-2">

                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <span class="sr-only">Twitter</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <span class="sr-only">GitHub</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                ©{{ config('app.name') }} {{ date('Y')-1 .'-'. date('Y') }}. All rights reserved.
            </p>
        </div>
    </div>
</footer>

@livewireScripts

@stack('scripts')

</body>
</html>
