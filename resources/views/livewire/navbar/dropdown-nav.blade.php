<x-jet-nav-link href="#" id="product-dropdown">
    Shop Now<svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
</x-jet-nav-link>

<div class="bg-white hidden space-x-7 mx-auto mt-24 h-1/2 w-4/5 shadow-md absolute inset-0 z-50" id="product-content">
    <div class="flex flex-row">
         {{-- Navbar products content --}}
        <div class="w-1/6 flex flex-col border-r border-gray-400 bg-white text-gray-700">
            <a href="{{ route('catalog.category',[$category_name = 'peripherals']) }}" class="hover:bg-gray-100 py-2 px-4 border-b border-gray-400 flex flex-row justify-between hover:text-gray-900" id="product-peripherals">
                Peripherals 
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
            <a href="{{ route('catalog.category',[$category_name = 'components']) }}" class="hover:bg-gray-100 py-2 px-4 border-b border-gray-400 flex flex-row justify-between hover:text-gray-900" id="product-components">
                Components 
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
            <a href="{{ route('catalog.category',[$category_name = 'pre-build']) }}" class="hover:bg-gray-100 py-2 px-4 border-b border-gray-400 flex flex-row justify-between hover:text-gray-900" id="product-prebuild">
                Pre-Build 
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="{{ route('catalog.category',[$category_name = 'mobile devices']) }}" class="hover:bg-gray-100 py-2 px-4 border-b border-gray-400 flex flex-row justify-between hover:text-gray-900" id="product-mobiledevices">
                Mobile Devices 
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="{{ route('catalog') }}" class="hover:bg-gray-100 py-2 px-4 border-b border-gray-400 flex flex-row justify-between hover:text-gray-900">
                View All ..
            </a>
        </div>
        {{-- Navbar product items content --}}
        <div class="hidden" id="prebuild-content">
            <div class="flex flex-col">
                <a href="{{ route('catalog.collection',['pre-build' ,'gaming']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Gaming Pre-build</a>
                <a href="{{ route('catalog.collection',['pre-build' ,'office']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Office Pre-build</a>  
            </div>
        </div>
        <div class="hidden" id="peripherals-content">
            <div class="flex flex-row">
                <div class="flex flex-col">
                    <a href="{{ route('catalog.collection',['peripherals' ,'mouse']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Mouse</a>
                    <a href="{{ route('catalog.collection',['peripherals' ,'keyboard']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Keyboard</a>  
                    <a href="{{ route('catalog.collection',['peripherals' ,'headphones']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Headphone</a>
                    <a href="{{ route('catalog.collection',['peripherals' ,'headset']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Headset</a>
                </div>
                <div class="flex flex-col">
                    <a href="{{ route('catalog.collection',['peripherals' ,'speakers']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Speakers</a>
                    <a href="{{ route('catalog.collection',['peripherals' ,'earphones']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Earphones</a>
                    <a href="{{ route('catalog.collection',['peripherals' ,'monitor']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Monitor</a>
                    <a href="{{ route('catalog.collection',['peripherals' ,'avr']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">AVR</a>
                </div>
                <div class="flex flex-col">
                    <a href="{{ route('catalog.collection',['peripherals' ,'mousepad']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Mousepad</a>
                </div>
            </div>
        </div>
        <div class="hidden" id="components-content">
            <div class="flex flex-row">
                <div class="flex flex-col">
                    <a href="{{ route('catalog.collection',['components' ,'motherboard']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Motherboard</a>
                    <a href="{{ route('catalog.collection',['components' ,'pc case']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">PC Case</a>  
                    <a href="{{ route('catalog.collection',['components' ,'processor']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Processor</a>
                </div>
                <div class="flex flex-col">
                    <a href="{{ route('catalog.collection',['components' ,'cpu cooling']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">CPU Cooling</a>
                    <a href="{{ route('catalog.collection',['components' ,'memory']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Memory</a>
                    <a href="{{ route('catalog.collection',['components' ,'graphics card']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Graphics Card</a>
                    <a href="{{ route('catalog.collection',['components' ,'hard disk']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Hard Disk</a>
                </div>
                <div class="flex flex-col">
                    <a href="{{ route('catalog.collection',['components' ,'solid state drive']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Solid State Drive</a>
                    <a href="{{ route('catalog.collection',['components' ,'power supply']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Power Supply</a>
                    <a href="{{ route('catalog.collection',['components' ,'chassis fan']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Chassis Fan</a>
                </div>
            </div>
        </div>

        <div class="hidden" id="mobiledevices-content">
            <div class="flex flex-col">
                <a href="{{ route('catalog.collection',['mobile devices' ,'laptops']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Laptops</a>
                <a href="{{ route('catalog.collection',['mobile devices' ,'mobile phone']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Mobile Phone</a>  
                <a href="{{ route('catalog.collection',['mobile devices' ,'tablet']) }}" class="py-1 px-4 text-gray-700 hover:text-gray-900 hover:underline">Tablet</a>  

            </div>
        </div>


    </div>{{-- End of navbar product content --}}
</div>

<div class='hidden bg-black bg-opacity-75 mx-auto h-screen w-full absolute inset-0 z-40' id="overlay"></div>


