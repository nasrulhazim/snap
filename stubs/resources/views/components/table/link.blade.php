<a href="{{ $route }}" {{ $attributes->merge(['class' => 'pb-1 hover:text-primary-500 border-b border-dashed hover:border-primary-500 transition duration-150']) }}>
    {!! $slot !!}
</a>
