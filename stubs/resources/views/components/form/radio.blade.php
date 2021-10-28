@props(['name'])

@php
    $class = 'h-5 w-5 border-gray-300 text-primary-600 shadow-xs focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50';
@endphp

<div class="flex">
    <input 
        type="radio" 
        name="{{ $name }}"
        {!! $attributes->merge(['class' => $class]) !!}>
    <x-form.label name="{{ $attributes->get('id') }}" class="mb-0 ml-3 font-medium">
        {{ $slot }}
    </x-form.label>
</div>
