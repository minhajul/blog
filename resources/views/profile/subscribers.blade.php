@extends('layouts.app')

@section('content')

    @include('profile._nav')

    <div class="bg-gray-100">
        <div class="py-3 max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
                <div class="grid grid-cols-1 lg:col-span-3">
                    <div class="flex items-center justify-between flex-wrap sm:flex-nowrap">
                        <div class="mt-2">
                            <h3 class="text-3xl my-5 tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                                Subscribers
                            </h3>
                        </div>
                        <div class="ml-4 mt-2 flex-shrink-0">
                            <a href="{{ route('subscribers.download') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Download
                            </a>
                        </div>
                    </div>

                    @include('errors.success')
                    @include('errors.message')

                    <div class="py-2">
                        <div class="max-w-7xl mx-auto">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            ID
                                                        </th>

                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Email
                                                        </th>

                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Status
                                                        </th>

                                                        <th scope="col" class="relative px-6 py-3">
                                                            <span class="sr-only">Action</span>
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody class="bg-white divide-y divide-gray-200" x-max="1">

                                                    @foreach($subscribers as $subscriber)
                                                         <tr>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                {{ $subscriber->id }}
                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                {{ $subscriber->email }}
                                                            </td>

                                                            <td class="px-6 py-4 whitespace-nowrap text-sm {{ $subscriber->isVerified() ? 'text-green-500' : 'text-gray-500' }}">
                                                                {{ $subscriber->status() }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                                <form method="post" action="{{ route('subscribers.delete', $subscriber) }}">
                                                                    @csrf

                                                                    @method('DELETE')

                                                                    <button type="submit" onclick="return confirm('Are you sure?')">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="py-3">
                                            {{ $subscribers->links() }}
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
