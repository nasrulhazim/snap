<div x-data="sidebar" x-init="init" x-on:resize.window="onResize">
    <button class="fixed top-0 z-20 p-4 md:hidden inline-flex items-center" x-on:click="show = !show">
        <x-icon name="menu-2" class="text-white" x-show="!show" x-cloak></x-icon>
        <x-icon name="x" class="text-white" x-show="show" x-cloak></x-icon>
        <span class="text-gray-300 ml-2 text-sm">Menu</span>
    </button>
    
    <aside class="w-15 md:w-68 h-screen py-3 px-4 md:px-3 md:py-6 fixed bg-white shadow z-10" 
        x-show="show"
        x-on:click.away="isMobile() ? (show = false) : null"
        x-cloak>

        <span class="ml-3 mb-2 inline-block uppercase tracking-widest font-medium text-xs text-gray-600">Navigations</span>
        <ul class="w-full">
            @foreach ($menus as $menu)
                @if($menu['show'])
                    <li class="py-0.5" 
                        x-data="{ show: false }"
                        x-init="show = '{{ is_sub_menu_active($menu) }}'">
                        <a 
                            @if($menu['route'])
                                href="{{ $menu['route'] }}" 
                            @else
                                @click="show = !show"
                            @endif
                            class="py-1.5 px-2.5 flex items-center group hover:text-primary-500 rounded-full cursor-pointer {{ active_link($menu['route']) || is_sub_menu_active($menu)  ? 'text-primary-500 bg-primary-50 hover:bg-primary-100' : '' }}">

                            @if(active_link($menu['route']) || is_sub_menu_active($menu))
                                <div class="bg-primary-500 w-3 h-[1.5px] absolute left-0"></div>
                            @endif
                            <x-icon 
                                name="{{ $menu['icon'] }}" 
                                class="w-6 h-6 mr-2.5 text-gray-500 group-hover:text-primary-500 {{ active_link($menu['route']) || is_sub_menu_active($menu) ? 'text-primary-500' : '' }}">
                            </x-icon>
                            <h4 class="font-medium">{{ $menu['name'] }}</h4>
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
                                                class="py-1 block text-gray-600 hover:text-primary-500 {{ active_link($subMenu['route']) ? 'text-primary-500' : '' }}">{{ $subMenu['name'] }}
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
    </aside>
</div>
