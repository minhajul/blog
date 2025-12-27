<x-layouts.app>
    <x-layouts.dashboard>
        <div class="py-5 max-w-3xl mx-auto lg:max-w-7xl">
            <div class="flex justify-between">
                <flux:heading size="xl">Create</flux:heading>

                <flux:button href="{{ route('dashboard.blogs.index') }}"> View Blogs</flux:button>
            </div>

            <div class="mt-5 p-4 bg-color shadow-md rounded-md">

                @include('errors.success')
                @include('errors.message')

                <form action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <flux:input
                                name="title"
                                label="Title"
                                required="true"
                                value="{{ old('title') }}"
                            />
                        </div>

                        <div class="col-span-6">
                            <flux:input
                                type="file"
                                name="banner"
                                label="Upload Banner"
                            />
                        </div>

                        <div class="col-span-6">
                            <x-trix-editor label="Details" required="true" name="details" value="{{ old('details') }}"></x-trix-editor>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between">
                        <flux:button
                            type="submit"
                            name="status"
                            value="drafted"
                        >
                            Save as Draft
                        </flux:button>

                        <flux:button
                            type="submit"
                            name="status"
                            value="published"
                            variant="primary"
                        >
                            Publish
                        </flux:button>
                    </div>
                </form>
            </div>
        </div>
    </x-layouts.dashboard>
</x-layouts.app>

@push('scripts')
    <script>
        (function () {
            let HOST = "{{ route('dashboard.blogs.upload.file') }}";

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
