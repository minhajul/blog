@extends('layouts.app')

@section('content')

    @include('profile._nav')

    <div class="bg-gray-100">
        <div class="py-5 max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">

            <div class="border-b-2 border-gray-100  flex items-center justify-between flex-wrap sm:flex-nowrap">
                <div class="mt-2">
                    <h3 class="text-3xl my-5 tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                        Gallery
                    </h3>
                </div>
                <div class="ml-4 mt-2 shrink-0">
                    <a href="{{ route('profile.gallery.create') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create New
                    </a>
                </div>
            </div>

            <ul role="list" class="py-10 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-6 xl:gap-x-8">

                @foreach($galleries as $gallery)
                    <li class="relative">
                        <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                            <img src="{{ asset($gallery->image_path) }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                        </div>
                    </li>
                @endforeach

            </ul>

        </div>
    </div>
@endsection
