<div class="p-5 mr-4 hidden md:block bg-white shadow-md">
   <div class="mr-5 w-52 flex flex-col min-h-screen max-h-auto">

         {{-- product categories trigger --}}
         <a class="mt-3 font-bold flex flex-row cursor-pointer" id="product-categories">Categories
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="product-categories-svg">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
         </a>

          {{-- product categories content --}}
           <div class="ml-4 my-4" id="product-categories-content">
               <details class="flex flex-col">
                  <summary class="cursor-pointer">Peripherals</summary>
                  <a class="ml-4 hover:underline cursor-pointer">Mouse</a>
                  <a class="ml-4 hover:underline cursor-pointer">Keyboard</a>
                  <a class="ml-4 hover:underline cursor-pointer">Headphone</a>
                  <a class="ml-4 hover:underline cursor-pointer">Headset</a>
                  <a class="ml-4 hover:underline cursor-pointer">Speakers</a>
                  <a class="ml-4 hover:underline cursor-pointer">Earphones</a>
                  <a class="ml-4 hover:underline cursor-pointer">Monitor</a>
                  <a class="ml-4 hover:underline cursor-pointer">AVR</a>
                  <a class="ml-4 hover:underline cursor-pointer">AVR</a>
               </details>
               <details class="flex flex-col">
                  <summary class="cursor-pointer">Components</summary>
                  <a class="ml-4 hover:underline cursor-pointer">Motherboard</a>
                  <a class="ml-4 hover:underline cursor-pointer">PC Case</a>
                  <a class="ml-4 hover:underline cursor-pointer">Processor</a>
                  <a class="ml-4 hover:underline cursor-pointer">CPU Cooling</a>
                  <a class="ml-4 hover:underline cursor-pointer">Memory</a>
                  <a class="ml-4 hover:underline cursor-pointer">Graphics Card</a>
                  <a class="ml-4 hover:underline cursor-pointer">Hard Disk</a>
                  <a class="ml-4 hover:underline cursor-pointer">Solid State Drive</a>
                  <a class="ml-4 hover:underline cursor-pointer">Power Supply</a>
                  <a class="ml-4 hover:underline cursor-pointer">Chassis Fan</a>
               </details>
               <details class="flex flex-col">
                  <summary class="cursor-pointer">Pre Build</summary>
                  <a class="ml-4 hover:underline cursor-pointer">Gaming Pre-Build</a>
                  <a class="ml-4 hover:underline cursor-pointer">Office Pre-Build</a>
               </details>
               <details class="flex flex-col">
                  <summary class="cursor-pointer">Mobile Devices</summary>
                  <a class="ml-4 hover:underline cursor-pointer">Laptops</a>
                  <a class="ml-4 hover:underline cursor-pointer">Mobile Phone</a>
                  <a class="ml-4 hover:underline cursor-pointer">Tablet</a>
               </details>
           </div>

         <form id="brand-form">

            {{-- filter by brands trigger --}}
            <div class="flex flex-row ">
               <a class="font-bold flex flex-row mt-3 cursor-pointer" id="filter-by-brands">Filter by brands
                  <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="filter-by-brands-svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
               </a>

               {{-- clear brand filter --}}
               @if (!empty(request()->brand_type))
                  <svg xmlns="http://www.w3.org/2000/svg" id="brand_type_clear" class="cursor-pointer h-5 w-5 mt-3" viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
               @endif
            </div>

            {{-- filter by brands content --}}
            <div class="ml-4 my-4" id="filter-by-brands-content">
               <div class="flex flex-col">
                  @foreach ($brands as $brand)
                        <label class="inline-flex items-center">
                           <input type="radio" class="form-radio brand-radio" name="brand_type" value="{{ $brand->brand_id }}">
                           <span class="ml-2">{{ $brand->brand_name }}</span>
                        </label>
                  @endforeach
               </div>
            </div>

            {{-- filter by Stock trigger --}}
            <div class="flex flex-row ">
               <a class="font-bold flex flex-row mt-3 cursor-pointer" id="filter-by-stocks">Filter by Stocks
                  <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="filter-by-stocks-svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
               </a>

               {{-- clear Stock filter --}}
               @if (!empty(request()->stock_type))
                  <svg xmlns="http://www.w3.org/2000/svg" id="stock_type_clear" class="cursor-pointer h-5 w-5 mt-3" viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
               @endif
            </div>



            {{-- filter by Stock content --}}
            <div class="ml-4 my-4" id="filter-by-stocks-content">
                  <div class="flex flex-col">
                        <label class="inline-flex items-center">
                           <input type="radio" class="form-radio brand-radio" name="stock_type" value="in">
                           <span class="ml-2">In Stock</span>
                        </label>
                        <label class="inline-flex items-center">
                           <input type="radio" class="form-radio brand-radio" name="stock_type" value="out">
                           <span class="ml-2">Out of Stock</span>
                        </label>
                  </div>
            </div> 

         </form>
            

   </div>
</div>
