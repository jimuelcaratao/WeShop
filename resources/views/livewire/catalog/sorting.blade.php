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
                  <a href="#" class="flex flex-row hover:underline py-1"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                  </svg>Peripherals</a>
                  <a href="#" class="flex flex-row hover:underline py-1"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                  </svg>Components</a>
                  <a href="#" class="flex flex-row hover:underline py-1"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                  </svg>Mobile devices</a>
                  <a href="#" class="flex flex-row hover:underline py-1"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                  </svg>Branded pc</a>
                  <a href="#" class="flex flex-row hover:underline py-1"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                  </svg>wearables</a>
                  <a href="#" class="flex flex-row hover:underline py-1"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                  </svg>gaming console</a>
                  <a href="#" class="flex flex-row hover:underline py-1"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                  </svg>others</a>
                  <a href="#" class="flex flex-row hover:underline py-1"><svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                  </svg>bundle program</a>
              </div>
           </div>  {{-- product categories content --}}

           {{-- filter by brands trigger --}}
           <a href="#" class="uppercase font-bold flex flex-row mt-3" id="filter-by-brands">Filter by brands<svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="filter-by-brands-svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg></a>

          {{-- filter by brands content --}}
           <div class="p-3 uppercase border-b-2 border-gray-500" id="filter-by-brands-content">
            <form id="brand-form">
              <div class="flex flex-col px-5">
                 @foreach ($brands as $brand)
                     <label class="inline-flex items-center">
                        <input type="radio" class="form-radio brand-radio" name="brand_type" value="{{ $brand->brand_id }}">
                        <span class="ml-2">{{ $brand->brand_name }}</span>
                     </label>
                 @endforeach
             
               </div>
            </form>

           </div>  {{-- filter by brands content --}}

      </div> 

   </div>
</div>
