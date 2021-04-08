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
