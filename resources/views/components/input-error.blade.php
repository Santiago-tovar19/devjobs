@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'mt-3 list-none text-sm space-y-2']) }}>
        @foreach ((array) $messages as $message)
            <li class="bg-red-100 border-l-4 border-red-600 text-red-600 font-bold p-3">{{ $message }}</li>
        @endforeach
    </ul>
@endif
