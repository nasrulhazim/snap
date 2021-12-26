<div class="ml-1 relative">
    <x-jet-dropdown align="right" width="w-72">
        <x-slot name="trigger">
            <span class="inline-flex rounded-md">
                <button type="button"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white focus:outline-none transition">
                    <div class="h-9 w-9 rounded-full bg-malaya-blue text-center py-2 text-white lowercase md:mr-4">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    {{-- <h4 class="hidden md:inline-block">{{ Auth::user()->name }}</h4> --}}
                    <x-icon name="o-chevron-down" class="ml-2 h-4 w-4 text-malaya-blue"></x-icon>
                </button>
            </span>
        </x-slot>

        <x-slot name="content">
            <div class="p-2">
                <div
                    class="mb-2 flex space-x-4 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md focus:outline-none transition">
                    <div class="h-9 w-9 rounded-full bg-malaya-blue text-center py-2 text-primary-500 lowercase">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    <div>
                        <h4>{{ Auth::user()->name }}</h4>
                        <p class="text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <x-jet-dropdown-link
                    class="flex items-center py-2 px-3 rounded-full group hover:text-primary-500 hover:bg-primary-50"
                    href="{{ route('profile.show') }}">
                    <x-icon name="o-user" class="text-gray-500 w-5 h-5 group-hover:text-primary-500">
                    </x-icon>
                    <span class="font-medium ml-4">{{ __('Profile') }}</span>
                </x-jet-dropdown-link>

                <div class="border-t border-gray-100 my-1"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-dropdown-link
                        class="flex items-center py-2 px-3 rounded-full group hover:text-red-500 hover:bg-red-50"
                        href="{{ route('logout') }}" :default="false" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        <x-icon name="o-logout" class="text-red-500 w-5 h-5 group-hover:text-red-500">
                        </x-icon>
                        <span class="font-medium ml-4 text-red-500">{{ __('Log Out') }}</span>
                    </x-jet-dropdown-link>
                </form>
            </div>
        </x-slot>
    </x-jet-dropdown>
