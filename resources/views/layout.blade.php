<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple Blog</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" async></script>
</head>

<body class="antialiased">

<div class="bg-gray-100">
    <div x-data="{ mobileMenuOpen: true, solutionsMenuOpen: true, moreMenuOpen: false }" class="relative bg-gray-900">
        <div class="relative z-20 shadow">
            <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-5 sm:px-6 sm:py-4 lg:px-8 md:justify-start md:space-x-10">
                <div>
                    <a href="{{ route('home') }}" class="flex">
                        <span class="sr-only">Workflow</span>
                        <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                    </a>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <button @click="mobileMenuOpen = true" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Open menu</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
                    <nav class="flex space-x-10">
                        <div class="relative">
                            <button type="button" @click="solutionsMenuOpen = !solutionsMenuOpen; moreMenuOpen = false" x-state:on="Item active" x-state:off="Item inactive" :class="{ 'text-gray-900': solutionsMenuOpen, 'text-gray-500': !solutionsMenuOpen }" class="group bg-white rounded-md text-gray-500 inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span>Solutions</span>
                                <svg x-state:on="Item active" x-state:off="Item inactive" class="ml-2 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-bind:class="{ 'text-gray-600': solutionsMenuOpen, 'text-gray-400': !solutionsMenuOpen }" x-description="Heroicon name: chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                            Pricing
                        </a>
                        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                            Docs
                        </a>
                        <div class="relative">
                            <button type="button" @click="moreMenuOpen = !moreMenuOpen; solutionsMenuOpen = false" x-state:on="Item active" x-state:off="Item inactive" :class="{ 'text-gray-900': moreMenuOpen, 'text-gray-500': !moreMenuOpen }" class="group bg-white rounded-md text-gray-500 inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span>More</span>
                                <svg x-state:on="Item active" x-state:off="Item inactive" class="ml-2 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-bind:class="{ 'text-gray-600': moreMenuOpen, 'text-gray-400': !moreMenuOpen }" x-description="Heroicon name: chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </nav>
                    <div class="flex items-center md:ml-12">
                        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                            Sign in
                        </a>
                        <a href="#"
                           class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                            Sign up
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <transition enter-active-class="duration-200 ease-out" enter-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <div x-description="Mobile menu, show/hide based on mobile menu state." x-show="mobileMenuOpen" class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                    <div class="pt-5 pb-6 px-5 sm:pb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                            </div>
                            <div class="-mr-2">
                                <button @click="mobileMenuOpen = false" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <span class="sr-only">Close menu</span>
                                    <svg class="h-6 w-6" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mt-6 sm:mt-8">
                            <nav>
                                <div class="grid gap-7 sm:grid-cols-2 sm:gap-y-8 sm:gap-x-4">

                                    <a href="#" class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-50">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                            <svg class="h-6 w-6" x-description="Heroicon name: chart-bar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 text-base font-medium text-gray-900">
                                            Analytics
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-50">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                            <svg class="h-6 w-6" x-description="Heroicon name: cursor-click" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 text-base font-medium text-gray-900">
                                            Engagement
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-50">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                            <svg class="h-6 w-6" x-description="Heroicon name: shield-check" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 text-base font-medium text-gray-900">
                                            Security
                                        </div>
                                    </a>

                                    <a href="#" class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-50">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                            <svg class="h-6 w-6" x-description="Heroicon name: view-grid" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 text-base font-medium text-gray-900">
                                            Integrations
                                        </div>
                                    </a>

                                </div>
                                <div class="mt-8 text-base">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all
                                        products <span aria-hidden="true">→</span></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="py-6 px-5">
                        <div class="grid grid-cols-2 gap-4">

                            <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700">
                                Pricing
                            </a>

                            <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700">
                                Docs
                            </a>

                            <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700">
                                Company
                            </a>

                            <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700">
                                Resources
                            </a>

                            <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700">
                                Blog
                            </a>

                            <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700">
                                Contact Sales
                            </a>

                        </div>
                        <div class="mt-6">
                            <a href="#"
                               class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Sign up
                            </a>
                            <p class="mt-6 text-center text-base font-medium text-gray-500">
                                Existing customer?
                                <a href="#" class="text-indigo-600 hover:text-indigo-500">
                                    Sign in
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</div>

<main>
    @yield('content')
</main>

</body>
</html>
