@extends('layouts.app')

@section('content')

    @include('profile._nav')

    <div class="bg-gray-100">
        <div class="py-5 max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
                <div class="grid grid-cols-1 lg:col-span-3">
                    <div class="flex items-center justify-between flex-wrap sm:flex-nowrap">
                        <div class="mt-2">
                            <h3 class="text-3xl my-5 tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                                Add Image
                            </h3>
                        </div>
                        <div class="ml-4 mt-2 shrink-0">
                            <a href="{{ route('profile.gallery.index') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                View Gallery
                            </a>
                        </div>
                    </div>

                    <div class="px-4 py-5 bg-white sm:p-6 shadow rounded-md">

                        @include('errors.success')
                        @include('errors.message')

                        <form action="{{ route('profile.gallery.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label class="block font-medium text-sm text-gray-700" for="image">
                                        Upload Image <span class="text-red-500">*</span>
                                    </label>

                                    <input type="file" name="image" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                                    @error('image') <span class="text-red-500 text-sm italic">{{ $message }}</span> @enderror
                                </div>

                            </div>

                            <div class="mt-5">
                                <button type="submit" class="mb-5 float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function () {
            let HOST = "{{ route('upload.file') }}";

            addEventListener("trix-attachment-add", function (event) {
                if (event.attachment.file) {
                    uploadFileAttachment(event.attachment)
                }
            })

            function uploadFileAttachment(attachment) {
                uploadFile(attachment.file, setProgress, setAttributes)

                function setProgress(progress) {
                    attachment.setUploadProgress(progress)
                }

                function setAttributes(attributes) {
                    attachment.setAttributes(attributes)
                }
            }

            function uploadFile(file, progressCallback, successCallback) {
                let formData = createFormData(file);
                let xhr = new XMLHttpRequest();

                xhr.open("POST", HOST, true);
                xhr.setRequestHeader('X-CSRF-TOKEN', getMeta('csrf-token'));

                xhr.upload.addEventListener("progress", function (event) {
                    let progress = event.loaded / event.total * 100;
                    progressCallback(progress)
                })

                xhr.addEventListener("load", function (event) {
                    let attributes = {
                        url: xhr.responseText,
                        href: xhr.responseText + "?content-disposition=attachment"
                    };
                    successCallback(attributes)
                })

                xhr.send(formData)
            }

            function createFormData(file) {
                let data = new FormData();
                data.append("Content-Type", file.type)
                data.append("file", file)
                return data
            }

            function getMeta(metaName) {
                const metas = document.getElementsByTagName('meta');

                for (let i = 0; i < metas.length; i++) {
                    if (metas[i].getAttribute('name') === metaName) {
                        return metas[i].getAttribute('content');
                    }
                }

                return '';
            }
        })();
    </script>
@endpush
