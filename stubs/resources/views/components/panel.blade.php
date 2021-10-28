@props(['title' => false, 'description' => false])

<div {{ $attributes->merge(['class' => 'rounded-lg shadow-sm overflow-hidden border border-gray-200 bg-white p-4 md:p-6 mb-7']) }}>
    @if($title)
        <div class="border-b border-dashed pb-4 md:-mt-2">
            <h4 class="text-lg font-semibold">{!! $title !!}</h4>
            @if($description)
                <p class>{!! $description !!}</p>
            @endif
        </div>
    @endif
    
    {!! $slot !!}
</div>
