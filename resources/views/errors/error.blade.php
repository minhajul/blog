@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline"><strong>Whoops!</strong> There were some problems with your input.<br></span>
        @foreach ($errors->all() as $error)
            <li class="text-red-700">{{ $error }}</li>
        @endforeach
    </div>
@endif
