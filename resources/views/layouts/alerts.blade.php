@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

@if (session()->has('messageStatus'))
    <div class="alert alert-{{ session('messageStatus') }}">
        {{ session('message') }}
    </div>
@endif
