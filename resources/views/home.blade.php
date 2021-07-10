@extends('layouts.app')

@section('content')
{{--    <div class="bg-gray-100">--}}
{{--        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">--}}

{{--            <livewire:blogs-component />--}}

{{--        </div>--}}
{{--    </div>--}}


    <div class="bg-gray-100 py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="relative max-w-3xl mx-auto">

            <div class="mt-5">
                <livewire:blogs-component />
            </div>
        </div>
    </div>
@endsection
