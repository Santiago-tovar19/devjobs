@php
    $classes = " text-[16px] text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
@endphp

<div>
     <a {{$attributes->merge(["class" => $classes])}} >
                    {{ $slot }}
    </a>
</div>
