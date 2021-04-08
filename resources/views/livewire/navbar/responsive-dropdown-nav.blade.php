
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