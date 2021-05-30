@extends('layout')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">
        <div class="text-center">
            <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                From the blog
            </h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.
            </p>
        </div>

        <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">

            @foreach([1, 2, 3] as $blog)
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1679&amp;q=80" alt="">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a href="#" class="hover:underline">
                                    Article
                                </a>
                            </p>
                            <a href="{{ route('blog.show', $blog) }}" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">
                                    Boost your conversion rate
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">Roel Aufderehar</span>
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#" class="hover:underline">
                                        Roel Aufderehar
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-16">
                                        Mar 16, 2020
                                    </time>
                                    <span aria-hidden="true">
                                      ·
                                    </span>
                                    <span>
                                      6 min read
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection