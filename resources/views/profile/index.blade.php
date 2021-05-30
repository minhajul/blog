@extends('layouts.app')

@section('content')

    @include('profile._nav')

    <div class="py-5 max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
            <div class="grid grid-cols-1 gap-4 lg:col-span-3">

                <section aria-labelledby="profile-overview-title">
                    <div class="rounded-lg bg-white overflow-hidden shadow">
                        <div class="bg-white p-6">
                            <div class="sm:flex sm:items-center sm:justify-between">
                                <div class="sm:flex sm:space-x-5">
                                    <div class="flex-shrink-0">
                                        <img class="mx-auto h-20 w-20 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                                    </div>
                                    <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                        <p class="text-xl font-bold text-gray-900 sm:text-2xl">
                                            {{ $user->name }}
                                        </p>
                                        <p class="text-sm font-medium text-gray-600">
                                            Logged in as {{ $user->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 bg-gray-50 grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">

                            <div class="px-6 py-5 text-sm font-medium text-center">
                                <span class="text-gray-900">{{ $analytics['posted_blog'] }}</span>
                                <span class="text-gray-600">Blogs posted</span>
                            </div>

                            <div class="px-6 py-5 text-sm font-medium text-center">
                                <span class="text-gray-900">100</span>
                                <span class="text-gray-600">Active jobs</span>
                            </div>

                            <div class="px-6 py-5 text-sm font-medium text-center">
                                <span class="text-gray-900">{{ $analytics['total_hit_count'] }}</span>
                                <span class="text-gray-600">Blog viewed</span>
                            </div>

                        </div>
                    </div>
                </section>

                @include('errors.error')
                @include('errors.success')
                @include('errors.message')

                <livewire:update-profile />

                <div class="hidden sm:block">
                    <div class="py-6">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="xsm:p-4 md:col-span-2">
                        <livewire:update-password />
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
