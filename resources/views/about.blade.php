@extends('layouts.app')

@section('content')

    <div class="p-6 flex items-center justify-center min-h-screen">
        <div class="md:flex">
            <div class="h-24 md:h-32 bg-gradient-to-r from-blue-400 to-purple-600 rounded-full overflow-hidden shadow-lg">
                @if($user)
                    <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}" class="h-24 w-24 flex-shrink-0 rounded-full md:h-32 md:w-32 p-2">
                @else
                    <img src="https://via.placeholder.com/150x150" alt="Avatar" class="h-24 w-24 flex-shrink-0 rounded-full md:h-32 md:w-32 p-2">
                @endif
            </div>

            <div class="mt-6 md:ml-6 md:mt-0">
                <h1 class="text-5xl font-bold font-heading">
                    {{ $user->name ?? 'Set your name from panel' }}
                </h1>

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

@endsection
