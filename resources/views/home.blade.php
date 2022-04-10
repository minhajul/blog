@extends('layouts.app')

@section('content')

    <livewire:blog.index :viewStyle="$viewStyle"/>

@endsection


@push('scripts')
    <script type="text/javascript">
        window.onscroll = function(event) {
            console.log(event)
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                console.log('sss');
                window.livewire.emit('load-more');
            }
        };
    </script>
@endpush
