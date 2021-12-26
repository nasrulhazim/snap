@error($name)
    <span class="mt-2 inline-flex items-center text-sm text-red-500 font-medium">
        <x-icon name="o-exclamation" class="w-5 h-5 mr-1"></x-icon>
        <span>{{ $message }}</span>
    </span>
@enderror
