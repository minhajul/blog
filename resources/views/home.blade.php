@extends('layouts.app')

@section('content')

    <livewire:blog.index :viewStyle="$viewStyle"/>

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
