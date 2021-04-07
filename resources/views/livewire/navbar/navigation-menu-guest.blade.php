<div>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-nav-link>
                    {{-- Dropdown --}}
                    <div class="mt-5">
                        <x-jet-nav-link href="#" id="product-dropdown">
                            Products<svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                              </svg>
                        </x-jet-nav-link>
                        
                        <div class="hidden space-x-7 mx-auto mt-24 h-1/2 w-4/5 shadow-md absolute inset-0" id="product-content">
                            {{-- navbar product container --}}
                            <div class="flex flex-row">
                                 {{-- navbar product content --}}
                                <div class="w-1/6 flex flex-col border-r border-gray-400">
                                    <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-accessories">
                                        Accessories <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg></a>
                                    <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-supplies">
                                        Case and Power Supplies <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg></a>  
                                    <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-headsets">
                                        Headsets <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg></a>
                                    <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-keyboards">
                                        Keyboards <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg></a>
                                    <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-mice">
                                        Mice <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg></a>
                                    <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-prebuild">
                                        Pre-Build <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg></a>
                                </div>
                                {{-- Navbar product item container --}}
                                <div class="hidden" id="accessory-container">
                                    <div class="flex flex-col">
                                        <a href="#" class="py-2 px-4 hover:underline flex flex-row justify-between" id="accessory-item">Accessory Item 1
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                        <a href="#" class="py-2 px-4 hover:underline">Accessory Item 2</a>  
                                        <a href="#" class="py-2 px-4 hover:underline">Accessory Item 3</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Accessory Item 4</a>
                                    </div>
                                </div>
                                <div class="hidden" id="supply-container">
                                    <div class="flex flex-col">
                                        <a href="#" class="py-2 px-4 hover:underline">Supply Item 1</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Supply Item 2</a>  
                                        <a href="#" class="py-2 px-4 hover:underline">Supply Item 3</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Supply Item 4</a>
                                    </div>
                                </div>
                                <div class="hidden" id="headset-container">
                                    <div class="flex flex-col">
                                        <a href="#" class="py-2 px-4 hover:underline">Headset Item 1</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Headset Item 2</a>  
                                        <a href="#" class="py-2 px-4 hover:underline">Headset Item 3</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Headset Item 4</a>
                                    </div>
                                </div>
                                <div class="hidden" id="keyboard-container">
                                    <div class="flex flex-col">
                                        <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 1</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 2</a>  
                                        <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 3</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 4</a>
                                    </div>
                                </div>
                                <div class="hidden" id="mouse-container">
                                    <div class="flex flex-col">
                                        <a href="#" class="py-2 px-4 hover:underline">Mouse Item 1</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Mouse Item 2</a>  
                                        <a href="#" class="py-2 px-4 hover:underline">Mouse Item 3</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Mouse Item 4</a>
                                    </div>
                                </div>
                                <div class="hidden" id="prebuild-container">
                                    <div class="flex flex-col">
                                        <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 1</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 2</a>  
                                        <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 3</a>
                                        <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 4</a>
                                    </div>
                                </div>
                                {{-- Sub item for accesory item 1 --}}
                                <div class="hidden" id="accessory-sub-item">
                                    <div class="flex flex-row">
                                        <a href="#" class="p-2 hover:underline">Accessory Sub Item 1</a>
                                        <a href="#" class="p-2 hover:underline">Accessory Sub Item 2</a>  
                                        <a href="#" class="p-2 hover:underline">Accessory Sub Item 3</a>
                                        <a href="#" class="p-2 hover:underline">Accessory Sub Item 4</a>
                                    </div>
                                </div>
                            </div>   {{-- End of navbar product container --}}
                        </div>
                     </div> {{-- End of Dropdown --}}
                    {{-- <x-jet-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('contact-us') }}" :active="request()->routeIs('contact-us')">
                        {{ __('Contact Us') }}
                    </x-jet-nav-link> --}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                {{-- <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif --}}

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                {{-- I modified this navbar --}}
                    @if (Route::has('login'))
                        @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
    
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>
    
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>
    
                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>
    
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif
    
                                <div class="border-t border-gray-100"></div>
    
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
    
                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                        @else   
                            <x-jet-nav-link href="{{ route('login') }}">Log in</x-jet-nav-link>
                            @if (Route::has('register'))
                                <x-jet-nav-link href="{{ route('register') }}">Register</x-jet-nav-link>
                            @endif
                        @endauth
                    
                    @endif
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="#" id="product-dropdown-small">
                   <div class="flex flex-row">
                    Products<svg xmlns="http://www.w3.org/2000/svg" class="mt-1 ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                      </svg>
                   </div>
                </x-jet-responsive-nav-link>
                
                <div class="hidden space-x-7 mx-auto mt-24 h-auto w-full shadow-md" id="product-content-small">
                    {{-- navbar contents --}}
                    <div class="flex flex-row">
                        <div class="w-2/5 flex flex-col border-r border-gray-400">
                            <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-accessories-small">
                                Accessories <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg></a>
                            <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-supplies-small">
                                Case and Power Supplies <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg></a>  
                            <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-headsets-small">
                                Headsets <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg></a>
                            <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-keyboards-small">
                                Keyboards <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg></a>
                            <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-mice-small">
                                Mice <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg></a>
                            <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-prebuild-small">
                                Pre-Build <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg></a>
                        </div>
                        <div class="hidden" id="accessory-container-small">
                            <div class="flex flex-col">
                                <a href="#" class="py-2 px-4 hover:underline flex flex-row justify-between" id="accessory-item-small">Accessory Item 1
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                                <a href="#" class="py-2 px-4 hover:underline">Accessory Item 2</a>  
                                <a href="#" class="py-2 px-4 hover:underline">Accessory Item 3</a>
                                <a href="#" class="py-2 px-4 hover:underline">Accessory Item 4</a>
                            </div>
                        </div>
                        <div class="hidden" id="supply-container-small">
                            <div class="flex flex-col">
                                <a href="#" class="py-2 px-4 hover:underline">Supply Item 1</a>
                                <a href="#" class="py-2 px-4 hover:underline">Supply Item 2</a>  
                                <a href="#" class="py-2 px-4 hover:underline">Supply Item 3</a>
                                <a href="#" class="py-2 px-4 hover:underline">Supply Item 4</a>
                            </div>
                        </div>
                        <div class="hidden" id="headset-container-small">
                            <div class="flex flex-col">
                                <a href="#" class="py-2 px-4 hover:underline">Headset Item 1</a>
                                <a href="#" class="py-2 px-4 hover:underline">Headset Item 2</a>  
                                <a href="#" class="py-2 px-4 hover:underline">Headset Item 3</a>
                                <a href="#" class="py-2 px-4 hover:underline">Headset Item 4</a>
                            </div>
                        </div>
                        <div class="hidden" id="keyboard-container-small">
                            <div class="flex flex-col">
                                <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 1</a>
                                <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 2</a>  
                                <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 3</a>
                                <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 4</a>
                            </div>
                        </div>
                        <div class="hidden" id="mouse-container-small">
                            <div class="flex flex-col">
                                <a href="#" class="py-2 px-4 hover:underline">Mouse Item 1</a>
                                <a href="#" class="py-2 px-4 hover:underline">Mouse Item 2</a>  
                                <a href="#" class="py-2 px-4 hover:underline">Mouse Item 3</a>
                                <a href="#" class="py-2 px-4 hover:underline">Mouse Item 4</a>
                            </div>
                        </div>
                        <div class="hidden" id="prebuild-container-small">
                            <div class="flex flex-col">
                                <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 1</a>
                                <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 2</a>  
                                <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 3</a>
                                <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 4</a>
                            </div>
                        </div>
                         {{-- Sub item for accesory item 1 --}}
                         <div class="hidden" id="accessory-sub-item-small">
                            <div class="flex flex-col">
                                <a href="#" class="p-2 hover:underline">Accessory Sub Item 1</a>
                                <a href="#" class="p-2 hover:underline">Accessory Sub Item 2</a>  
                                <a href="#" class="p-2 hover:underline">Accessory Sub Item 3</a>
                                <a href="#" class="p-2 hover:underline">Accessory Sub Item 4</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 mr-3">
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

                    {{-- <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-jet-responsive-nav-link>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                    @endif --}} 
                </div>
            </div>
            @else
                <div class="pt-2 pb-3 space-y-1">
                    <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="#" id="product-dropdown-small">
                       <div class="flex flex-row">
                        Products<svg xmlns="http://www.w3.org/2000/svg" class="mt-1 ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                       </div>
                    </x-jet-responsive-nav-link>
                    
                    <div class="hidden space-x-7 mx-auto mt-24 h-auto w-full shadow-md" id="product-content-small">
                        {{-- navbar contents --}}
                        <div class="flex flex-row">
                            <div class="w-2/5 flex flex-col border-r border-gray-400">
                                <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-accessories-small">
                                    Accessories <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg></a>
                                <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-supplies-small">
                                    Case and Power Supplies <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg></a>  
                                <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-headsets-small">
                                    Headsets <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg></a>
                                <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-keyboards-small">
                                    Keyboards <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg></a>
                                <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-mice-small">
                                    Mice <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg></a>
                                <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-prebuild-small">
                                    Pre-Build <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg></a>
                            </div>
                            <div class="hidden" id="accessory-container-small">
                                <div class="flex flex-col">
                                    <a href="#" class="py-2 px-4 hover:underline flex flex-row justify-between" id="accessory-item-small">Accessory Item 1
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <a href="#" class="py-2 px-4 hover:underline">Accessory Item 2</a>  
                                    <a href="#" class="py-2 px-4 hover:underline">Accessory Item 3</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Accessory Item 4</a>
                                </div>
                            </div>
                            <div class="hidden" id="supply-container-small">
                                <div class="flex flex-col">
                                    <a href="#" class="py-2 px-4 hover:underline">Supply Item 1</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Supply Item 2</a>  
                                    <a href="#" class="py-2 px-4 hover:underline">Supply Item 3</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Supply Item 4</a>
                                </div>
                            </div>
                            <div class="hidden" id="headset-container-small">
                                <div class="flex flex-col">
                                    <a href="#" class="py-2 px-4 hover:underline">Headset Item 1</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Headset Item 2</a>  
                                    <a href="#" class="py-2 px-4 hover:underline">Headset Item 3</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Headset Item 4</a>
                                </div>
                            </div>
                            <div class="hidden" id="keyboard-container-small">
                                <div class="flex flex-col">
                                    <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 1</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 2</a>  
                                    <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 3</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Keyboard Item 4</a>
                                </div>
                            </div>
                            <div class="hidden" id="mouse-container-small">
                                <div class="flex flex-col">
                                    <a href="#" class="py-2 px-4 hover:underline">Mouse Item 1</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Mouse Item 2</a>  
                                    <a href="#" class="py-2 px-4 hover:underline">Mouse Item 3</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Mouse Item 4</a>
                                </div>
                            </div>
                            <div class="hidden" id="prebuild-container-small">
                                <div class="flex flex-col">
                                    <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 1</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 2</a>  
                                    <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 3</a>
                                    <a href="#" class="py-2 px-4 hover:underline">Pre-build Item 4</a>
                                </div>
                            </div>
                             {{-- Sub item for accesory item 1 --}}
                             <div class="hidden" id="accessory-sub-item-small">
                                <div class="flex flex-col">
                                    <a href="#" class="p-2 hover:underline">Accessory Sub Item 1</a>
                                    <a href="#" class="p-2 hover:underline">Accessory Sub Item 2</a>  
                                    <a href="#" class="p-2 hover:underline">Accessory Sub Item 3</a>
                                    <a href="#" class="p-2 hover:underline">Accessory Sub Item 4</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 space-y-1">
                    <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Log in') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-jet-responsive-nav-link>
                </div>
        @endauth
    </div>
</nav>
</div>
