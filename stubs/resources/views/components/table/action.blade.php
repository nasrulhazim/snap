<div>
    <x-jet-dropdown align="right" width="48" 
        position="static"
        dropdownClasses="right-6 md:right-14">

        <x-slot name="trigger" class="text-right">
            <button type="button" class="border rounded text-sm px-4 py-1.5 text-center inline-flex items-center space-x-2 bg-white hover:bg-gray-50 focus:outline-none transition">
                <span>{{ __('Action') }}</span>
                <x-icon name="o-chevron-down" class="w-4 h-4"></x-icon>
            </button>
        </x-slot>

        <x-slot name="content">
            {!! $content !!}
        </x-slot>
    </x-jet-dropdown>
</div>
