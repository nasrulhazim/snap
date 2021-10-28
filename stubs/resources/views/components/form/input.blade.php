@props(['name', 'label', 'description' => false, 'disabled' => false])

@php
    $class = 'w-full h-10 border-gray-300 focus:border-primary-500 focus:ring focus:ring-primary-400 focus:ring-opacity-50 rounded text-sm shadow-xs block w-full disabled:bg-gray-50 disabled:cursor-not-allowed ';
    $class .= $errors->has($name) ? 'border-red-500 ring ring-red-400 ring-opacity-50' : '';
@endphp

<div class="w-full mb-7 md:flex md:space-x-8">
    @if($label ?? false)
        <x-form.label name="{{ $name }}">{{ $label }}</x-form.label>
    @endif
    
    <div class="md:w-4/6">
        <input {{ $disabled ? 'disabled' : '' }} 
            type="{{ $attributes->get('type') ?? 'text' }}" 
            name="{{ $name }}"
            {!! $attributes->merge(['class' => $class]) !!}>
        @if($description)
            <span class="mt-2 block text-gray-700 text-sm">{!! $description !!}</span>
        @endif
        <x-form.error :name="$name"></x-form.error>
    </div>
</div>
