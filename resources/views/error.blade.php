@if (session()->has('error'))
    <div class="alert alert-danger">
        @if(is_array(session()->get('error')))
            @foreach (session()->get('error') as $message)
                {{ $message }}
            @endforeach
        @else
            {{ session()->get('error') }}
        @endif
    </div>
@endif
