<x-jet-nav-link href="#" id="product-dropdown">
    Shop Now<svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
</x-jet-nav-link>

<div class="bg-white hidden space-x-7 mx-auto mt-24 h-1/2 w-4/5 shadow-md absolute inset-0 z-50" id="product-content">
    <div class="flex flex-row">
         {{-- Navbar products content --}}
        <div class="w-1/6 flex flex-col border-r border-gray-400">
            <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-prebuild">
                Pre-Build <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg></a>
            <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-peripherals">
                Peripherals <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg></a>
            <a href="#" class="py-2 px-4 hover:bg-gray-100 border-b border-gray-400 flex flex-row justify-between" id="product-components">
                Components <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-4 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg></a>
        </div>
        {{-- Navbar product items content --}}
        <div class="hidden" id="prebuild-content">
            <div class="flex flex-col">
                <a href="#" class="py-1 px-4 hover:underline">Gaming Pre-build</a>
                <a href="#" class="py-1 px-4 hover:underline">Productive Pre-build</a>  
            </div>
        </div>
        <div class="hidden" id="peripherals-content">
            <div class="flex flex-row">
                <div class="flex flex-col">
                    <a href="#" class="py-1 px-4 hover:underline">Mouse</a>
                    <a href="#" class="py-1 px-4 hover:underline">Keyboard</a>  
                    <a href="#" class="py-1 px-4 hover:underline">Mouse and Keyboard</a>
                    <a href="#" class="py-1 px-4 hover:underline">Headset</a>
                </div>
                <div class="flex flex-col">
                    <a href="#" class="py-1 px-4 hover:underline">Speakers</a>
                    <a href="#" class="py-1 px-4 hover:underline">Cable</a>
                    <a href="#" class="py-1 px-4 hover:underline">Monitor</a>
                    <a href="#" class="py-1 px-4 hover:underline">Operating System</a>
                </div>
                <div class="flex flex-col">
                    <a href="#" class="py-1 px-4 hover:underline">Avr</a>
                    <a href="#" class="py-1 px-4 hover:underline">Web and Digital Cam</a>
                    <a href="#" class="py-1 px-4 hover:underline">Chair</a>
                    <a href="#" class="py-1 px-4 hover:underline">Mousepad</a>
                </div>
            </div>
        </div>
        <div class="hidden" id="components-content">
            <div class="flex flex-row">
                <div class="flex flex-col">
                    <a href="#" class="py-1 px-4 hover:underline">Motherboard</a>
                    <a href="#" class="py-1 px-4 hover:underline">PC Case</a>  
                    <a href="#" class="py-1 px-4 hover:underline">Processor AMD</a>
                    <a href="#" class="py-1 px-4 hover:underline">Processor Intel</a>
                </div>
                <div class="flex flex-col">
                    <a href="#" class="py-1 px-4 hover:underline">CPU Cooling</a>
                    <a href="#" class="py-1 px-4 hover:underline">Memory</a>
                    <a href="#" class="py-1 px-4 hover:underline">Graphics Card</a>
                    <a href="#" class="py-1 px-4 hover:underline">Hard Disk</a>
                </div>
                <div class="flex flex-col">
                    <a href="#" class="py-1 px-4 hover:underline">Solid State Drive</a>
                    <a href="#" class="py-1 px-4 hover:underline">Power Supply</a>
                    <a href="#" class="py-1 px-4 hover:underline">Chassis Fan</a>
                </div>
            </div>
        </div>
    </div>{{-- End of navbar product content --}}
</div>

<div class='hidden bg-black bg-opacity-75 mx-auto mt-16 h-screen w-full absolute inset-0 z-40' id="overlay"></div>


