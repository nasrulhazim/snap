@props(['name', 'label', 'disabled' => false, 'inline' => true, 'description' => false])

<div class="w-full mb-7 md:flex md:space-x-8">
    @if($label ?? false)
        <x-form.label name="{{ $name }}">{{ $label }}</x-form.label>
    @endif
    
    <div class="md:w-4/6">
        <div class="{{ $inline ? 'md:inline-flex space-y-4 md:space-y-0 md:space-x-6' : '' }}">
            {!! $slot !!}
        </div>

        @if($description)
            <span class="mt-2 block text-gray-700 text-sm">{!! $description !!}</span>
        @endif

        <div class="block">
            <x-form.error :name="$name"></x-form.error>
        </div>
    </div>
</div>
