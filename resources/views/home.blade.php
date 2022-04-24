@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">
        <livewire:blog.index :viewStyle="$viewStyle"/>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        window.onscroll = function (event) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endpush
