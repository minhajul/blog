@extends('layouts.app')

@section('content')

    <div class="p-6 flex items-center justify-center min-h-screen">
        <div class="md:flex">
            <div class="h-24 md:h-32 bg-gradient-to-r from-blue-400 to-purple-600 rounded-full overflow-hidden shadow-lg">
                <img src="{{ asset('images/profile.jpeg') }}" alt="Minhajul Islam" class="h-24 w-24 flex-shrink-0 rounded-full md:h-32 md:w-32 p-2">
            </div>

            <div class="mt-6 md:ml-6 md:mt-0">
                <h1 class="text-5xl font-bold font-heading">
                    {{ $user->name }}
                </h1>

                <div class="mt-6 max-w-2xl">
                    <div class="markdown">
                        <p class="mb-3">
                           {!! $user->bio !!}

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
