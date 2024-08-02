@extends('components.app')

@section('content')
    <div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="relative max-w-3xl mx-auto">

            <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none"
                 viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                             patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-600" fill="currentColor"></rect>
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect>
            </svg>

            <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none"
                 viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                             patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-600" fill="currentColor"></rect>
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect>
            </svg>

            <div class="py-5">
                <div class="relative px-4 sm:px-6 lg:px-8">

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden pb-6">
                            <h2 class="text-gray-400 text-5xl md:text-15xl font-black">
                                503
                            </h2>

                            <div class="w-16 h-1 bg-gray-500 my-3 md:my-6"></div>

                            <p class="text-gray-500 text-2xl md:text-3xl font-light mb-8 leading-normal">
                                Sorry, the page you are This may be because of a technical error we're working to fix.
                                Try reloading the page.
                            </p>

                            <a href="{{ URL::current() }}"
                               class="bg-transparent text-gray-500 font-bold uppercase tracking-wide py-3 px-6 border-2 border-gray-500 hover:border-gray-500 rounded-lg">
                                Try Reloading
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
