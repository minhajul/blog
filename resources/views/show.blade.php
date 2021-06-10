@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="relative max-w-3xl mx-auto">

            <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect>
            </svg>

            <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect>
            </svg>

            <div class="mt-5">
                <div class="relative px-4 sm:px-6 lg:px-8">
                    <div class="text-lg max-w-prose mx-auto">
                        <h1>
                            <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                                {{ $blog->title }}
                            </span>
                        </h1>
                    </div>

                    <figure class="my-5">
                        <img class="w-full rounded-lg pb-3" src="{{ $blog->bannerUrl() }}" alt="{{ $blog->title }}" width="1310" height="873">
                    </figure>

                    <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">

                        {!! $blog->details !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
