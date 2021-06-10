@extends('layouts.app')

@section('content')

    @include('profile._nav')

    <div class="py-5 max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
            <div class="grid grid-cols-1 gap-4 lg:col-span-3">

               <livewire:blogs-for-profile />

            </div>
        </div>
    </div>
@endsection
