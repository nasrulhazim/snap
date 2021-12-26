<nav x-data="{ open: false }" class="bg-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-screen-xxl mx-auto px-4 md:px-6">
        <div class="flex justify-between h-14">
            <div class="w-2/6 md:hidden">&nbsp;</div>

            <div class="w-1/2 md:w-auto flex items-center justify-center">
                <div class="hidden md:block">
                    {{ Breadcrumbs::render() }}
                </div>
            </div>

            <div class="w-2/6 md:w-auto flex items-center justify-end">
                <a href="{{ route('notifications') }}" class="ml-4">
                    <x-notification-badge />
                </a>

                <x-lang-switcher />
            
                <x-profile-menu />
                </div>
            </div>
        </div>
    </div>
</nav>
