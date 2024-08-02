<x-app-layout>
    <livewire:blog.index :viewStyle="$viewStyle"/>
</x-app-layout>

@push('scripts')
    <script type="text/javascript">
        window.onscroll = function (event) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endpush
