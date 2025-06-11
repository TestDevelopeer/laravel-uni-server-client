@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <div class="invalid-tooltip">
            {{ $message }}
        </div>
    @endforeach
@endif
