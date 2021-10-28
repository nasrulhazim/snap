@unless ($breadcrumbs->isEmpty())
    <ol class="flex flex-nowrap overflow-x-scroll w-full items-center space-x-3 font-medium text-xs md:ml-6 whitespace-nowrap no-scrollbar">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="text-black md:text-white text-opacity-60 hover:text-opacity-100">
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                </li>
            @else
                <li class="text-black md:text-white text-opacity-100 md:text-opacity-70">{{ $breadcrumb->title }}</li>
            @endif

            @if(!$loop->last)
                <x-icon name="chevron-right" class="w-4 h-4 text-gray-400 flex-shrink-0"></x-icon>
            @endif
        @endforeach
    </ol>
@endunless
