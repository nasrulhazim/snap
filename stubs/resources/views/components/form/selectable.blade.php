@props(['name', 'label', 'disabled' => false, 'description' => false, 'options' => []])

@php
    $options = array_merge([
                    'dropdownAutoWidth' => true,
                    'placeholder' => $attributes->get('placeholder') ?: "Please select",
                    'minimumResultsForSearch' => 10,
                ], $options);

    $class = 'w-full h-10 border-gray-300 focus:border-primary-500 focus:ring focus:ring-primary-400 focus:ring-opacity-50 rounded text-sm shadow-xs block w-full disabled:bg-gray-50 disabled:cursor-not-allowed ';
    $class .= $errors->has($name) ? 'border-red-500 ring ring-red-400 ring-opacity-50' : '';
@endphp

<div class="w-full mb-7 md:flex md:space-x-8"
    x-data="{
        model: @entangle($attributes->wire('model')),
    }"
    x-init="
        select2 = window.$($refs.select)
            .not('.select2-hidden-accessible')
            .select2({{ json_encode((object)$options) }});
        select2.on('select2:select', (event) => {
            model = event.target.hasAttribute('multiple') ? Array.from(event.target.options).filter(option => option.selected).map(option => option.value) : event.params.data.id;
        });
        select2.on('select2:unselect', (event) => {
            model = Array.from(event.target.options).filter(option => option.selected).map(option => option.value);
        });
        $watch('model', (value) => {
            select2.val(value).trigger('change');
        });
    "
    wire:ignore>
    @if($label ?? false)
        <x-form.label name="{{ $name }}">{{ $label }}</x-form.label>
    @endif
    <div class="{{ ($label ?? false) ? 'md:w-4/6' : 'w-full' }}">
        <select 
            x-ref="select" 
            name="{{ $name }}"
            {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge(['class' => $class]) !!}>
            {{ $slot }}
        </select>
        @if($description)
            <span class="mt-2 block text-gray-700 text-sm">{!! $description !!}</span>
        @endif
        <x-form.error :name="$name"></x-form.error>
    </div>
</div>

