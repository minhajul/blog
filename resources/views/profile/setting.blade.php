@extends('layouts.app')

@section('content')

    @include('profile._nav')

    <div class="py-3 max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
            <div class="grid grid-cols-1 gap-4 lg:col-span-3">

                <div class="border-b-2 border-gray-100  flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="mt-2">
                        <h3 class="text-3xl my-5 tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                            Settings
                        </h3>
                    </div>
                </div>

                <div class="shadow rounded-md p-4 mb-5">
                    @include('errors.success')
                    @include('errors.message')

                    <form action="{{ route('settings.update') }}" method="POST" class="lg:col-span-9" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="flex flex-col lg:flex-row">
                            <div class="flex-grow space-y-6">

                                <div>
                                    <label for="username" class="block text-sm font-medium text-gray-700">
                                        Site Title
                                    </label>
                                    <div class="mt-1 rounded-md shadow-sm flex">
                                        <input type="text" name="site_title" value="{{ old( 'site_title', $setting->site_title ?? '') }}" class="focus:ring-light-blue-500 focus:border-light-blue-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                                    </div>
                                </div>

                                <div>
                                    <label for="username" class="block text-sm font-medium text-gray-700">
                                        Site Description
                                    </label>
                                    <div class="mt-1 rounded-md shadow-sm flex">
                                        <input type="text" name="site_description" value="{{ old('site_description', $setting->site_description ?? '') }}" class="focus:ring-light-blue-500 focus:border-light-blue-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Logo
                                    </label>
                                    <small class="italic">
                                        <a target="_blank" href="{{ $setting->logoUrl() }}">{{ $setting->logoUrl() }}</a>
                                    </small>
                                    <div class="mt-1 rounded-md shadow-sm flex">
                                        <input type="file" name="logo" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Favicon
                                    </label>
                                    <small class="italic">
                                        <a target="_blank" href="{{ $setting->faviconUrl() }}">{{ $setting->faviconUrl() }}</a>
                                    </small>
                                    <div class="mt-1 rounded-md shadow-sm flex">
                                        <input type="file" name="favicon" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                                    </div>
                                </div>

                                <div class="mt-6 grid grid-cols-12 gap-6">

                                    <div class="col-span-12">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Google Site Verification Code
                                        </label>
                                        <input type="text" name="google_site_verification_code" value="{{ old('google_site_verification_code', $setting->google_site_verification_code ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-12 sm:col-span-6">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Google Analytics - Tracking ID
                                        </label>
                                        <input type="text" name="google_analytics_tracking_id" value="{{ old( 'google_analytics_tracking_id', $setting->google_analytics_tracking_id ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-12 sm:col-span-6">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Google Analytics - View ID
                                        </label>
                                        <input type="text" name="google_analytics_view_id" value="{{ old( 'google_analytics_view_id', $setting->google_analytics_view_id ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end text-right mt-5">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-xs-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
