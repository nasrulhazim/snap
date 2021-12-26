@props(['title' => null, 'variant' => false, 'icon' => false])

@php
    // $class = 'rounded-full px-3 py-1 relative text-xs font-semibold inline-flex items-center before:w-1 before:h-1 before:mr-1.5 before:rounded-full ';
    $class = 'rounded-md px-2 py-0.5 relative text-xs font-medium inline-flex items-center border  ';
    $class .= color_variant($variant);
@endphp

<div {{ $attributes->merge(['class' => $class]) }}>
    @if($title)
        <span class="text-gray-600">{{ $title }}</span>
    @endif
    <span>{{ $slot }}</span>
</div>
