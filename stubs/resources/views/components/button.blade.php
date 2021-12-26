@props(['variant' => 'default'])

@php
    $class = 'rounded-md px-5 py-2 h-9 text-sm font-semibold transition-all duration-150 whitespace-nowrap disabled:bg-opacity-50 inline-flex space-x-2 items-center ';

    $class .= color_variant($variant);
@endphp

@if($attributes->has('href'))
    <a {{ $attributes->merge(['class' => $class]) }} role="button">{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</button>
@endif
