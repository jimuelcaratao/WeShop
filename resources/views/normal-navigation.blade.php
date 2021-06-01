{{-- For search --}}
<div class="hidden" id="search-container">
    <div class="h-1/2 w-screen mx-auto bg-white absolute inset-0 z-50 flex flex-col justify-center items-center space-y-5">
        <div class="space-y-5 flex flex-col justify-center items-center">
            <x-jet-nav-link href="#" id="search-close"> <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </x-jet-nav-link>
        </div>
        <div>
            <h1 class="text-2xl md:text-3xl font-bold">Search</h1>
        </div>
        <div class="w-screen px-3 mt-5">
            <form class="flex justify-center items-center">
                @csrf
                <input id="search" type="search" class="w-4/5">
            </form>
        </div>
    </div>
</div>
<div class="hidden h-screen w-screen bg-black bg-opacity-75 absolute inset-0 z-40" id="search-overlay"></div>

{{-- First navbar || Log in and Register --}}
<nav class="bg-black-secondary hidden sm:block">

    <div class="flex justify-end items-center space-x-5 py-2 px-4 sm:px-6 lg:px-8">
        @guest
            <x-jet-nav-link href="{{ route('login') }}">Log in</x-jet-nav-link>
                @if (Route::has('register'))
                    <x-jet-nav-link href="{{ route('register') }}">Register</x-jet-nav-link>
                @endif 
        @endguest

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
                        <!-- Transaction Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Transaction') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('my_orders') }}">
                            {{ __('My Orders') }}
                        </x-jet-dropdown-link>
                      <!-- Account Management -->
                      <div class="block px-4 py-2 text-xs text-gray-400">
                          {{ __('Manage Account') }}
                      </div>

                      <x-jet-dropdown-link href="{{ route('profile.show') }}">
                          {{ __('Profile') }}
                      </x-jet-dropdown-link>


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
          @endauth
      @endif

    </div>
</nav>

{{-- Second navbar || Home, Shop Now etc.. --}}
<nav x-data="{ open: false }" class="bg-main">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex justify-start items-center">
                        <a href="{{ route('home') }}">
                            {{-- <h1 class="text-gray-100">WeShop.</h1> --}}
                            <img src="{{ asset('img/logo/LogoV2.png') }}" class="h-12 w-12 block mx-auto" alt="Site's logo">
                        </a>
                    </div>
    
                    <!-- Navigation Links for Tablets and Larger Devies -->
                    <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                        <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-jet-nav-link>
                        
                        {{-- Dropdown --}}
                        <div class=" nav-shop">
                            {{-- Normal resolution dropdown --}}
                            @livewire('navbar.dropdown-nav')
                            
                        </div>
                        <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('WFH Essentials') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Community') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Support') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Track Orders') }}
                        </x-jet-nav-link>
                    </div>
                </div>
                
                {{-- Navbar medium devices --}}
                <div class="hidden md:flex md:items-center md:ml-6">
                    
                    <!-- Settings Dropdown -->
                    <div class="lg:ml-3 relative space-x-2">
                            <x-jet-nav-link href="#" id="search-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </x-jet-nav-link>

                            {{-- cart item per user --}}
                            @auth
                                @php
                                    $cart_count = App\Models\Cart::where('user_id' , 'like', '%' . Auth::user()->id  . '%')
                                            ->get();
                                @endphp
                            @endauth
                      

                            <x-jet-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')">
                                <span class="relative inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>

                                    @if (!empty($cart_count))
                                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
                                            {{ count($cart_count) }}
                                        </span>
                                    @endif
                                   
                                </span>
                            </x-jet-nav-link>
                            <x-jet-nav-link href="{{ route('wishlist') }}" :active="request()->routeIs('wishlist')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </x-jet-nav-link>
                    </div>
                </div>
    
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
         </div> {{-- End of Navigation Links for Tablets and Larger Devies --}}
    
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
          
                <div class="pt-2 pb-3 space-y-1">
            
                    <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-responsive-nav-link>


                    {{-- Responsive resolution dropdown --}}
                    @livewire('navbar.responsive-dropdown-nav')

                    <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('WFH Essentials') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Community') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Support') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Track Orders') }}
                    </x-jet-responsive-nav-link>    
                    
                    <x-jet-responsive-nav-link href="#" id="search-button-small">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                          </svg>
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('wishlist') }}" :active="request()->routeIs('wishlist')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                          </svg>
                    </x-jet-responsive-nav-link>
                </div>

                
                @guest
                    <div class="border-t border-gray-200 space-y-1">
                        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Log in') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-jet-responsive-nav-link>
                    </div>
                @endguest

                @auth
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="flex-shrink-0 mr-3">
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif
        
                            <div>
                                <div class="font-medium text-base text-gray-300">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
        
                        <div class="mt-3 space-y-1">

                            <x-jet-responsive-nav-link href="{{ route('my_orders') }}" :active="request()->routeIs('my_orders')">
                                {{ __('My Orders') }}
                            </x-jet-responsive-nav-link>
                            <!-- Account Management -->
                            <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-jet-responsive-nav-link>
        
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
                @endauth
                   
        </div>
    </nav>