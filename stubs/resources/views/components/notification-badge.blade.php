@php
    $hasNotification = auth()->user()->hasNotifications();
@endphp

<div class="relative">
    @if($hasNotification)
        <div class="w-3 h-3 rounded-full absolute ml-4 -mt-2 bg-red-500"></div>
        <x-icon name="bell-ringing" class="text-primary text-opacity-80 w-6 h-6"></x-icon>
    @else
        <x-icon name="bell" class="text-primary text-opacity-80 w-6 h-6"></x-icon>
    @endif
</div>
