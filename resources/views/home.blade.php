<x-layouts.app>
    <livewire:blog.index :viewStyle="$viewStyle"/>
</x-layouts.app>

{{--@push('scripts')
    <script type="text/javascript">
        window.onscroll = function (event) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endpush--}}
