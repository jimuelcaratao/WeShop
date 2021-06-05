
                    <x-jet-responsive-nav-link href="#" id="product-dropdown-small">
                        <div class="flex flex-row">
                         Shop Now<svg xmlns="http://www.w3.org/2000/svg" class="mt-1 ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="arrow-down-med">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                           </svg>
                        </div>
                     </x-jet-responsive-nav-link>
                     
                     <div class="hidden space-x-7 mx-auto mt-24 h-auto w-full shadow-md" id="product-content-small">
                         <div class="flex flex-col">
                              {{-- Navbar products content --}}
                             <div class="w-auto flex flex-row border-r border-gray-400 bg-primary text-gray-300">
                            
                                <a href="#" class="py-2 px-4 flex flex-row justify-between hover:text-gray-100" id="product-peripherals-small">
                                    Peripherals 
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                                <a href="#" class="py-2 px-4 flex flex-row justify-between hover:text-gray-100" id="product-components-small">
                                    Components 
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                                <a href="#" class="py-2 px-4 flex flex-row justify-between hover:text-gray-100" id="product-mobiledevices-small">
                                    Mobile Devices 
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>

                                <a href="#" class="py-2 px-4 flex flex-row justify-between hover:text-gray-100" id="product-prebuild-small">
                                    Pre-Build 
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>

                                <a href="{{ route('catalog') }}" class="py-2 px-4 flex flex-row justify-between hover:text-gray-100" id="product-components-small">
                                    View All.. 
                                </a>
                               
                             </div>
                            <div class="hidden bg-secondary" id="prebuild-content-small">
                                <div class="flex flex-col h-48">
                                    <a href="{{ route('catalog.collection',['pre-build' ,'gaming']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Gaming Pre-build</a>
                                    <a href="{{ route('catalog.collection',['pre-build' ,'office']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Office Pre-build</a>  
                                </div>
                            </div>

                            <div class="hidden bg-secondary" id="mobiledevices-content-small">
                                <div class="flex flex-col h-48">
                                    <a href="{{ route('catalog.collection',['mobile devices' ,'laptops']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Laptops</a>
                                    <a href="{{ route('catalog.collection',['mobile devices' ,'mobile phone']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Mobile Phone</a>  
                                    <a href="{{ route('catalog.collection',['mobile devices' ,'tablet']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Tablet</a>  
                    
                                </div>
                            </div>


                            <div class="hidden bg-secondary" id="peripherals-content-small">
                                <div class="flex flex-row">
                                    <div class="flex flex-col h-48">
                                        <a href="{{ route('catalog.collection',['peripherals' ,'mouse']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Mouse</a>
                                        <a href="{{ route('catalog.collection',['peripherals' ,'keyboard']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Keyboard</a>  
                                        <a href="{{ route('catalog.collection',['peripherals' ,'headphones']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Headphone</a>
                                        <a href="{{ route('catalog.collection',['peripherals' ,'headset']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Headset</a>
                                    </div>
                                    <div class="flex flex-col h-48">
                                        <a href="{{ route('catalog.collection',['peripherals' ,'speakers']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Speakers</a>
                                        <a href="{{ route('catalog.collection',['peripherals' ,'earphones']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Earphones</a>
                                        <a href="{{ route('catalog.collection',['peripherals' ,'monitor']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Monitor</a>
                                        <a href="{{ route('catalog.collection',['peripherals' ,'avr']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">AVR</a>
                                    </div>
                                    <div class="flex flex-col h-48">
                                        <a href="{{ route('catalog.collection',['peripherals' ,'mousepad']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Mousepad</a>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden bg-secondary" id="components-content-small">
                                <div class="flex flex-row">
                                    <div class="flex flex-col h-48">
                                        <a href="{{ route('catalog.collection',['components' ,'motherboard']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Motherboard</a>
                                        <a href="{{ route('catalog.collection',['components' ,'pc case']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">PC Case</a>  
                                        <a href="{{ route('catalog.collection',['components' ,'processor']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Processor</a>
                                    </div>
                                    <div class="flex flex-col h-48">
                                        <a href="{{ route('catalog.collection',['components' ,'cpu cooling']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">CPU Cooling</a>
                                        <a href="{{ route('catalog.collection',['components' ,'memory']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Memory</a>
                                        <a href="{{ route('catalog.collection',['components' ,'graphics card']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Graphics Card</a>
                                        <a href="{{ route('catalog.collection',['components' ,'hard disk']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Hard Disk</a>
                                    </div>
                                    <div class="flex flex-col h-48">
                                        <a href="{{ route('catalog.collection',['components' ,'solid state drive']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Solid State Drive</a>
                                        <a href="{{ route('catalog.collection',['components' ,'power supply']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Power Supply</a>
                                        <a href="{{ route('catalog.collection',['components' ,'chassis fan']) }}" class="py-1 px-4 text-gray-300 hover:text-gray-100 hover:underline">Chassis Fan</a>
                                    </div>
                                </div>
                            </div>
                         </div>
                     </div>