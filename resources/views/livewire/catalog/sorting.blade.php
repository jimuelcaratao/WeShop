<div class="hidden md:block p-5 mr-4 bg-white shadow-md">
   <div class="flex flex-col h-auto mr-5 uppercase">
      {{-- Sorting for product categories --}}
      <div>
         
           {{-- product categories trigger --}}
           <a href="#" class="uppercase font-bold flex flex-row mt-3" id="product-categories">Categories<svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="product-categories-svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg></a>

          {{-- product categories content --}}
           <div class="p-3 uppercase border-b-2 border-gray-500" id="product-categories-content">
              <div class="flex flex-col px-5">
                  <a href="#" class="flex flex-row hover:underline py-1">
                     <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                     </svg>
                     Peripherals
                  </a>
                  <a href="#" class="flex flex-row hover:underline py-1">
                     <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                     </svg>
                     Components
                  </a>
                  <a href="#" class="flex flex-row hover:underline py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                     </svg>
                     Mobile devices
                  </a>
                  <a href="#" class="flex flex-row hover:underline py-1">
                     <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                     </svg>
                     Pre-Build
                  </a>
              </div>
           </div>  {{-- product categories content --}}

         <form id="brand-form">

            {{-- filter by brands trigger --}}
            <div class="flex flex-row ">
               <a href="#" class="uppercase font-bold flex flex-row mt-3" id="filter-by-brands">Filter by brands
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
            <div class="p-3 uppercase border-b-2 border-gray-500" id="filter-by-brands-content">
               <div class="flex flex-col px-5">
                  @foreach ($brands as $brand)
                        <label class="inline-flex items-center">
                           <input type="radio" class="form-radio brand-radio" name="brand_type" value="{{ $brand->brand_id }}">
                           <span class="ml-2">{{ $brand->brand_name }}</span>
                        </label>
                  @endforeach
               
                  </div>
            </div>  {{-- filter by brands content --}}

            {{-- filter by Stock trigger --}}
            <div class="flex flex-row ">
               <a href="#" class="uppercase font-bold flex flex-row mt-3" id="filter-by-stocks">Filter by Stocks
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
            <div class="p-3 uppercase border-b-2 border-gray-500" id="filter-by-stocks-content">
                  <div class="flex flex-col px-5">
                        <label class="inline-flex items-center">
                           <input type="radio" class="form-radio brand-radio" name="stock_type" value="in">
                           <span class="ml-2">In Stock</span>
                        </label>
                        <label class="inline-flex items-center">
                           <input type="radio" class="form-radio brand-radio" name="stock_type" value="out">
                           <span class="ml-2">Out of Stock</span>
                        </label>
                  </div>
            </div>  {{-- filter by Stock content --}}

         </form>
            
      </div> 

   </div>
</div>
