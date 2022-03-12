@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="relative max-w-4xl mx-auto">

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

            <div class="p-6 flex items-center justify-center min-h-screen">
                <div class="md:flex">
                    <div class="h-24 md:h-32 bg-gradient-to-r from-blue-400 to-purple-600 rounded-full overflow-hidden shadow-lg">
                        @if($user)
                            <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}" class="h-24 w-24 shrink-0 rounded-full md:h-32 md:w-32 p-2">
                        @else
                            <img src="https://via.placeholder.com/150x150" alt="Avatar" class="h-24 w-24 shrink-0 rounded-full md:h-32 md:w-32 p-2">
                        @endif
                    </div>

                    <div class="mt-6 md:ml-6 md:mt-0">
                        <div class="text-5xl font-bold">
                  <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">
                  {{ $user->name ?? 'Set your name from panel' }}
                  </span>
                        </div>

                        <div class="mt-6 max-w-2xl">
                            <div class="markdown">
                                <p class="mb-3">
                                    @if($user)
                                        {!! $user->bio !!}
                                    @else
                                        What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?
                                        <br><br>
                                        What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?
                                        <br><br>
                                        What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?
                                        <br><br>
                                        What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
