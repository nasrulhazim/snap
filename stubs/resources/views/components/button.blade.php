@props(['variant' => 'default'])

@php
    $class = 'rounded-md px-5 py-2 h-9 text-sm font-semibold transition-all duration-150 whitespace-nowrap disabled:bg-opacity-50 inline-flex space-x-2 items-center ';

    $class .= match ($variant) {
        'primary' => 'bg-primary-500 text-primary-100 hover:bg-primary-600',
        'danger' => 'bg-red-500 text-red-100 hover:bg-red-600',
        default => 'bg-gray-200 text-gray-600 hover:bg-gray-300',
    };
@endphp

@if($attributes->has('href'))
    <a {{ $attributes->merge(['class' => $class]) }} role="button">{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</button>
@endif
