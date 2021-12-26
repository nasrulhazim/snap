<div x-data="sidebar" x-init="init" x-on:resize.window="onResize">
    <button class="fixed top-0 z-50 p-4 md:hidden inline-flex items-center" x-on:click="show = !show">
        <x-icon name="o-menu-2" class="text-primary text-opacity-80" x-show="!show" x-cloak></x-icon>
        <x-icon name="o-x" class="text-primary text-opacity-80" x-show="show" x-cloak></x-icon>
        <span class="text-primary text-opacity-80 ml-2 text-sm">{{ __('Menu') }}</span>
    </button>
    
    <aside class="w-15 md:w-68 h-screen py-3 px-4 md:px-3 md:py-6 fixed bg-white shadow z-10 overflow-auto" 
        x-show="show"
        x-on:click.away="isMobile() ? (show = false) : null"
        x-cloak>
        
        <div class="-mt-3">
            <a href="{{ auth()->user() ? url('/dashboard') : url('/') }}">
                <x-logo-horizontal></x-logo-horizontal>
            </a>
        </div>
        
        <ul class="w-full">
            @foreach ($menus as $menuMain)
                @if($menuMain['show'])
                    <li class="border-t py-3 mt-3">
                        <div class="flex py-1.5 flex items-center group text-malaya-blue">
                            <x-icon 
                                name="{{ $menuMain['icon'] }}" 
                                class="w-6 h-6 mr-2.5 ">
                            </x-icon>
                            <span class="inline-block uppercase tracking-widest font-bold text-xs ">{{ $menuMain['name'] }}</span>
                        </div>
                        @if($menuMain['subs'] ?? false)
                        <div class="px-2.5">
                            <ul class=" ">
                                @foreach ($menuMain['subs'] as $menu)
                                    @if($menu['show'])
                                        <li class="py-1.5 pl-6 border-l hover:border-l-2 hover:border-malaya-blue hover:bg-grey-100 cursor-pointer" 
                                            x-data="{ show: false }"
                                            x-init="show = '{{ is_sub_menu_active($menu) }}'">
                                            <a 
                                                @if($menu['route'])
                                                    href="{{ $menu['route'] }}" 
                                                @else
                                                    @click="show = !show"
                                                @endif
                                                class="flex items-center group 
                                                
                                                {{ 
                                                    active_link($menu['route']) || is_sub_menu_active($menu)  ? 
                                                    'text-malaya-lightblue font-semibold' : 'font-normal text-malaya-blue hover:text-malaya-lightestblue' 
                                                }}">

                                                {{-- @if(active_link($menu['route']) || is_sub_menu_active($menu))
                                                    <div class="bg-primary-500 w-3 h-[1.5px] absolute left-0"></div>
                                                @endif --}}
                                                <h4 class="">{{ $menu['name'] }}</h4>
                                                @if($menu['subs'] ?? false)
                                                    <x-icon 
                                                        name="chevron-down"
                                                        class="w-4 h-4 ml-auto text-gray-400"
                                                        x-show="show">
                                                    </x-icon>
                                                    <x-icon 
                                                        name="chevron-right"
                                                        class="w-4 h-4 ml-auto text-gray-400"
                                                        x-show="!show">
                                                    </x-icon>
                                                @endif
                                            </a>
                                            @if($menu['subs'] ?? false)
                                                <ul class="pl-11" x-show="show" x-cloak>
                                                    @foreach ($menu['subs'] as $subMenu)
                                                        @if($subMenu['show']) 
                                                            <li>
                                                                <a 
                                                                    href="{{ $subMenu['route'] }}" 
                                                                    class="py-1 block text-gray-600 hover:text-primary-500 {{ active_link($subMenu['route']) ? 'text-malaya-lightblue font-medium' : 'text-malaya-blue hover:text-malaya-lightestblue hover:bg-grey-100 hover:shadow-outline' }}">{{ $subMenu['name'] }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    </aside>
</div>
