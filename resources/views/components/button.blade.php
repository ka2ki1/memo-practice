@props([
    'variant' => 'secondary', // primary | secondary | danger
])

@php
    $base = 'inline-flex items-center justify-center px-3 py-2 rounded text-sm font-medium transition border';

    $styles = match($variant) {
        'primary' => 'bg-blue-600 text-white border-blue-600 hover:bg-blue-700',
        'danger' => 'bg-red-600 text-white border-red-600 hover:bg-red-700',
        default => 'bg-gray-200 text-gray-800 border-gray-200 hover:bg-gray-300',
    };
@endphp

<button {{ $attributes->merge(['class' => "$base $styles"]) }}>
    {{ $slot }}
</button>
