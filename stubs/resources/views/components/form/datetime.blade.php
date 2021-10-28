@props(['name', 'label', 'disabled' => false, 'options' => []])

@php
    $options = array_merge([
                    'enableTime' => false,
                    'defaultDate' => "today"
                    ], $options);
@endphp

<div class="w-full mb-7 md:flex md:space-x-8">
    @if($label ?? false)
        <x-form.label name="{{ $name }}">{{ $label }}</x-form.label>
    @endif

    <div class="{{ ($label ?? false) ? 'md:w-4/6' : 'w-full' }}">
        <input 
            x-data
            x-init="window.flatpickr($refs.input, {{ json_encode((object)$options) }});"
            x-ref="input"
            {{ $disabled ? 'disabled' : '' }} 
            type="text"
            name="{{ $name }}"
            {!! $attributes->merge(['class' => 'flatpickr h-10 border-gray-300 focus:border-primary-500 focus:ring focus:ring-primary-400 focus:ring-opacity-50 rounded text-sm shadow-xs block w-full disabled:bg-gray-50 disabled:cursor-not-allowed']) !!}
            data-input>
            <x-icon name="chevron-down" class="absolute text-gray-600 my-auto inset-y-0 right-3 w-4 h-4"></x-icon>
        <x-form.error :name="$name"></x-form.error>
    </div>
</div>
