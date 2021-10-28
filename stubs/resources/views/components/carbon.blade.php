@props(['date', 'format' => false])

<!-- format: default, human -->

@php
    $formattedDate = match ($format) {
        'human' => \Carbon\Carbon::parse($date)->diffForHumans(),
        default => \Carbon\Carbon::parse($date)->format('Y-m-d, H:i'),
    }
@endphp

<span {{ $attributes }}>{{ $formattedDate }}</span>
