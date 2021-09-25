@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-3 text-lg text-gray-300 transition bg-primary cursor-pointer group hover:bg-gray-800'
            : 'flex items-center px-4 py-3 text-lg transition cursor-pointer group hover:primary hover:text-gray-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
