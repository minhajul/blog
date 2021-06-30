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

                @include('errors.success')
                @include('errors.message')

                <div class="py-2">
                    <div class="max-w-7xl mx-auto">

                        <form class="divide-y divide-gray-200 lg:col-span-9" action="#" method="POST">
                            <!-- Profile section -->
                            <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                <div>
                                    <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                                    <p class="mt-1 text-sm text-gray-500">
                                        This information will be displayed publicly so be careful what you share.
                                    </p>
                                </div>

                                <div class="mt-6 flex flex-col lg:flex-row">
                                    <div class="flex-grow space-y-6">
                                        <div>
                                            <label for="username" class="block text-sm font-medium text-gray-700">
                                                Username
                                            </label>
                                            <div class="mt-1 rounded-md shadow-sm flex">
                        <span class="bg-gray-50 border border-r-0 border-gray-300 rounded-l-md px-3 inline-flex items-center text-gray-500 sm:text-sm">
                          workcation.com/
                        </span>
                                                <input type="text" name="username" id="username" autocomplete="username" class="focus:ring-light-blue-500 focus:border-light-blue-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300" value="lisamarie">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="about" class="block text-sm font-medium text-gray-700">
                                                About
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-light-blue-500 focus:border-light-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">
                                                Brief description for your profile. URLs are hyperlinked.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                                        <p class="text-sm font-medium text-gray-700" aria-hidden="true">
                                            Photo
                                        </p>
                                        <div class="mt-1 lg:hidden">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                                                    <img class="rounded-full h-full w-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=80h" alt="">
                                                </div>
                                                <div class="ml-5 rounded-md shadow-sm">
                                                    <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-light-blue-500">
                                                        <label for="user_photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                                            <span>Change</span>
                                                            <span class="sr-only"> user photo</span>
                                                        </label>
                                                        <input id="user_photo" name="user_photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hidden relative rounded-full overflow-hidden lg:block">
                                            <img class="relative rounded-full w-40 h-40" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80" alt="">
                                            <label for="user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                                                <span>Change</span>
                                                <span class="sr-only"> user photo</span>
                                                <input type="file" id="user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 grid grid-cols-12 gap-6">
                                    <div class="col-span-12 sm:col-span-6">
                                        <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                        <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-12 sm:col-span-6">
                                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                        <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-12">
                                        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                                        <input type="text" name="url" id="url" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-12 sm:col-span-6">
                                        <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                        <input type="text" name="company" id="company" autocomplete="organization" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>

                            <!-- Privacy section -->
                            <div class="pt-6 divide-y divide-gray-200">
                                <div class="px-4 sm:px-6">
                                    <div>
                                        <h2 class="text-lg leading-6 font-medium text-gray-900">Privacy</h2>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Ornare eu a volutpat eget vulputate. Fringilla commodo amet.
                                        </p>
                                    </div>
                                    <ul class="mt-2 divide-y divide-gray-200">
                                        <li class="py-4 flex items-center justify-between">
                                            <div class="flex flex-col">
                                                <p id="privacy-option-label-1" class="text-sm font-medium text-gray-900">
                                                    Available to hire
                                                </p>
                                                <p id="privacy-option-description-1" class="text-sm text-gray-500">
                                                    Nulla amet tempus sit accumsan. Aliquet turpis sed sit lacinia.
                                                </p>
                                            </div>
                                            <button type="button" @click="on = !on" :aria-pressed="on.toString()" aria-pressed="true" aria-labelledby="privacy-option-label-1" aria-describedby="privacy-option-description-1" x-data="{ on: true }" :class="{ 'bg-gray-200': !on, 'bg-teal-500': on }" class="ml-4 bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-blue-500">
                                                <span class="sr-only">Use setting</span>
                                                <span aria-hidden="true" :class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                            </button>
                                        </li>
                                        <li class="py-4 flex items-center justify-between">
                                            <div class="flex flex-col">
                                                <p id="privacy-option-label-2" class="text-sm font-medium text-gray-900">
                                                    Make account private
                                                </p>
                                                <p id="privacy-option-description-2" class="text-sm text-gray-500">
                                                    Pharetra morbi dui mi mattis tellus sollicitudin cursus pharetra.
                                                </p>
                                            </div>
                                            <button type="button" @click="on = !on" :aria-pressed="on.toString()" aria-pressed="false" aria-labelledby="privacy-option-label-2" aria-describedby="privacy-option-description-2" x-data="{ on: false }" :class="{ 'bg-gray-200': !on, 'bg-teal-500': on }" class="ml-4 bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-blue-500">
                                                <span class="sr-only">Use setting</span>
                                                <span aria-hidden="true" :class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                            </button>
                                        </li>
                                        <li class="py-4 flex items-center justify-between">
                                            <div class="flex flex-col">
                                                <p id="privacy-option-label-3" class="text-sm font-medium text-gray-900">
                                                    Allow commenting
                                                </p>
                                                <p id="privacy-option-description-3" class="text-sm text-gray-500">
                                                    Integer amet, nunc hendrerit adipiscing nam. Elementum ame
                                                </p>
                                            </div>
                                            <button type="button" @click="on = !on" :aria-pressed="on.toString()" aria-pressed="true" aria-labelledby="privacy-option-label-3" aria-describedby="privacy-option-description-3" x-data="{ on: true }" :class="{ 'bg-gray-200': !on, 'bg-teal-500': on }" class="ml-4 bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-blue-500">
                                                <span class="sr-only">Use setting</span>
                                                <span aria-hidden="true" :class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                            </button>
                                        </li>
                                        <li class="py-4 flex items-center justify-between">
                                            <div class="flex flex-col">
                                                <p id="privacy-option-label-4" class="text-sm font-medium text-gray-900">
                                                    Allow mentions
                                                </p>
                                                <p id="privacy-option-description-4" class="text-sm text-gray-500">
                                                    Adipiscing est venenatis enim molestie commodo eu gravid
                                                </p>
                                            </div>
                                            <button type="button" @click="on = !on" :aria-pressed="on.toString()" aria-pressed="true" aria-labelledby="privacy-option-label-4" aria-describedby="privacy-option-description-4" x-data="{ on: true }" :class="{ 'bg-gray-200': !on, 'bg-teal-500': on }" class="ml-4 bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-blue-500">
                                                <span class="sr-only">Use setting</span>
                                                <span aria-hidden="true" :class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                                    <button type="button" class="bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-blue-500">
                                        Cancel
                                    </button>
                                    <button type="submit" class="ml-5 bg-light-blue-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-light-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-blue-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
