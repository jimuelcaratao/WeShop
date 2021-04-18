@props(['active'])

@php
$sad = ' text-gray-300 hover:text-gray-100 focus:text-gray-900 bg-white';

$classes = $active
            ? 'text-gray-400 hover:text-gray-900 focus:text-gray-900 bg-gray-900'
            : 'text-gray-100 hover:text-gray-100 focus:text-gray-900 bg-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
