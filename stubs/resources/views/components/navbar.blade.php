<nav x-data="{ open: false }" class="bg-primary-1000 fixed top-0 inset-x-0 z-20">
    <!-- Primary Navigation Menu -->
    <div class="max-w-screen-xxl mx-auto px-4 md:px-6">
        <div class="flex justify-between h-14">
            <div class="w-2/6 md:hidden">&nbsp;</div>
            
            <div class="w-2/6 md:w-auto flex items-center justify-center">
                <a href="{{ route('dashboard') }}">
                    <div class="bg-white h-9 w-9 rounded-md inline-flex items-center justify-center shadow-xl">
                        <x-logo-mark class="block h-6 w-auto" />
                    </div>
                </a>
                <div class="hidden md:block">
                    {{ Breadcrumbs::render() }}
                </div>
            </div>

            <div class="w-2/6 md:w-auto flex items-center justify-end">
                <x-icon name="notification" class="text-white text-opacity-80 w-6 h-6"></x-icon>
                <!-- Settings Dropdown -->
                <div class="ml-1 relative">
                    <x-jet-dropdown align="right" width="w-72">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white focus:outline-none transition">
                                    <div class="h-9 w-9 rounded-full bg-primary-200 text-center py-2 text-primary-500 lowercase md:mr-4">
                                        {{ substr(Auth::user()->name, 0, 2) }}
                                    </div>
                                    <h4 class="hidden md:inline-block">{{ Auth::user()->name }}</h4>
                                    <x-icon name="chevron-down" class="ml-2 h-4 w-4"></x-icon>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="p-2">
                                <div class="mb-2 flex space-x-4 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md focus:outline-none transition">
                                    <div class="h-9 w-9 rounded-full bg-primary-200 text-center py-2 text-primary-500 lowercase">
                                        {{ substr(Auth::user()->name, 0, 2) }}
                                    </div>
                                    <div>
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-gray-500">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>

                                <x-jet-dropdown-link class="flex items-center py-2 px-3 rounded-full group hover:text-primary-500 hover:bg-primary-50" href="{{ route('profile.show') }}">
                                    <x-icon name="user" class="text-gray-500 w-5 h-5 group-hover:text-primary-500"></x-icon>
                                    <span class="font-medium">{{ __('Profile') }}</span>
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100 my-1"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link 
                                            class="flex items-center py-2 px-3 rounded-full group hover:text-red-500 hover:bg-red-50" href="{{ route('logout') }}"
                                            :default="false"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        <x-icon name="logout" class="text-gray-500 w-5 h-5 group-hover:text-red-500"></x-icon>
                                        <span class="font-medium">{{ __('Log Out') }}</span>
                                    </x-jet-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-1">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
