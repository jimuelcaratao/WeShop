<x-normal_user>
   <div class="flex flex-col space-y-20">
       
      {{-- Landing page's carousel --}}
       <div class="glider-contain h-1/2 w-screen">
         {{-- Slide Container --}}
         <div class="glider">
            <div>
                <img src="{{ asset('./img/home-banner/Banner1.jpg') }}" class="h-full w-full">
            </div>
            <div>
                <img src="{{ asset('./img/home-banner/Banner2.jpg') }}" class="h-full w-full">
            </div>
            <div>
                <img src="{{ asset('./img/home-banner/Banner3.jpg') }}" class="h-full w-full">
            </div>
         </div>
         {{-- Buttons for previous and next --}}
         <div class="flex justify-between items-center">
            <x-jet-button aria-label="Previous" class="glider-prev">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
            </x-jet-button>
            <x-jet-button aria-label="Next" class="glider-next">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </x-jet-button>
         </div>
     </div>

      {{-- Products carousel --}}
      <div class="px-6 sm:px-12">
         <h1 class="text-center text-2xl md:text-3xl my-5">BEST SELLERS</h1>
         {{-- Carousel Container --}}
         <div class="relative glider-contain relative h-1/2 w-screen shadow-md rounded-lg">
            {{-- Slide Container --}}   
            <div class="products bg-white flex justify-evenly items-center">
                  @forelse ($products as $product)
                     <div class="h-full w-60 p-5 flex flex-col justify-center items-center space-y-5 hover:shadow-md bg-gray-50">
                        <img src="{{ asset('storage/media/products/main_'.$product->product_code.'_'.$product->default_photo) }}" alt="{{ $product->product_name }}" class="block h-2/4 w-auto mx-auto">
                        <p class="text-sm sm:text-md font-semibold">{{ $product->product_name }}</p>
                        @if (!empty($product->product_price->discounted_price))
                              <h1 class="mr-2 0">&#8369; @convert($product->product_price->discounted_price)</h1>
                              <p class="text-red-600 text-sm">&#8369; <span class="line-through ">@convert($product->product_price->price)</span>
                                 <span>
                                    @if ($product->product_price->discount_type == 'Money' )
                                          - &#8369;  {{ $product->product_price->discount_price }}  Off
                                    @else
                                          -   {{ $product->product_price->discount_price }} % Off
                                    @endif
                                 </span>
                              </p>
                        @else
                              {{-- Added optional helper to render even if the price is null, to prevent non object error --}}
                              <h1 class=" ">&#8369; @convert(optional($product->product_price)->price)</h1> 
                        @endif
                        <x-jet-secondary-button>
                           <a href="/product/{{ $product->product_code }}" class="flex flex-row justify-center items-center">View product
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-3" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                              <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                           </a>
                        </x-jet-secondary-button>
                     </div>
                  @empty
                     <div class="flex flex-col justify-center items-center p-5 mx-auto">
                        <img src="{{ asset('images/undraw_empty_cart_co35.svg') }}" alt="A boy with a empty cart">
                        <h1 class="text-center font-bold text-md sm:text-lg mt-5">No products found in the database.</h1>
                     </div>   
                  @endforelse
            </div>
            {{-- Buttons for previous and next --}}
               <div class="flex justify-between items-center">
                  <x-jet-button aria-label="Previous" class="absolute top-1/2 left-0 glider-prev-products">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                     </svg>
                  </x-jet-button>
                  <x-jet-button aria-label="Next" class="absolute top-1/2 right-0 glider-next-products">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                     </svg>
                  </x-jet-button>
               </div>
         </div>
      </div>

      {{-- Explore more --}}
      <div class="h-auto md:h-screen w-screen flex flex-col md:flex-row bg-gray-900">
         <div>
            <a href="{{ route('catalog.collection',['components' ,'power supply']) }}">
               <img src="{{ asset('images/home-squares/Network.jpg') }}" class="h-1/2 w-full block mx-auto" alt="A network">
            </a>
            <a href="{{ route('catalog.collection',['peripherals' ,'headset']) }}">
               <img src="{{ asset('images/home-squares/Headset.jpg') }}" class="h-1/2 w-full block mx-auto" alt="A headset">
            </a>
         </div>
         <div>
            <a href="{{ route('catalog.collection',['mobile devices' ,'laptops']) }}">
               <img src="{{ asset('images/home-squares/Laptop.jpg') }}" class="h-1/2 w-full block mx-auto" alt="A laptop">
            </a>
            <a href="{{ route('catalog.collection',['peripherals' ,'monitor']) }}">
               <img src="{{ asset('images/home-squares/Monitor.jpg') }}" class="h-1/2 w-full block mx-auto" alt="A monitor">
            </a>
         </div>
      </div>
      {{-- Most viewed carousel --}}
      <div class="px-6 sm:px-12">
         <h1 class="text-center text-2xl md:text-3xl my-5">NEW PRODUCTS</h1>
         {{-- Carousel Container --}}
         <div class="relative glider-contain relative h-1/2 w-screen shadow-md rounded-lg">
            {{-- Slide Container --}}   
            <div class="most-viewed bg-white flex justify-evenly items-center">
                  @forelse ($products as $product)
                     <div class="h-full w-60 p-5 flex flex-col justify-center items-center space-y-5 hover:shadow-md bg-gray-50">
                        <img src="{{ asset('storage/media/products/main_'.$product->product_code.'_'.$product->default_photo) }}" alt="{{ $product->product_name }}" class="block h-2/4 w-auto mx-auto">
                        <p class="text-sm sm:text-md font-semibold">{{ $product->product_name }}</p>
                        @if (!empty($product->product_price->discounted_price))
                              <h1 class="mr-2 0">&#8369; @convert($product->product_price->discounted_price)</h1>
                              <p class="text-red-600 text-sm">&#8369; <span class="line-through ">@convert($product->product_price->price)</span>
                                 <span>
                                    @if ($product->product_price->discount_type == 'Money' )
                                          - &#8369;  {{ $product->product_price->discount_price }}  Off
                                    @else
                                          -   {{ $product->product_price->discount_price }} % Off
                                    @endif
                                 </span>
                              </p>
                        @else
                              {{-- Added optional helper to render even if the price is null, to prevent non object error --}}
                              <h1 class=" ">&#8369; @convert(optional($product->product_price)->price)</h1> 
                        @endif
                        <x-jet-secondary-button>
                           <a href="/product/{{ $product->product_code }}" class="flex flex-row justify-center items-center">View product
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-3" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                              <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                           </a>
                        </x-jet-secondary-button>
                     </div>
                  @empty
                     <div class="flex flex-col justify-center items-center p-5 mx-auto">
                        <img src="{{ asset('images/undraw_empty_cart_co35.svg') }}" alt="A boy with a empty cart">
                        <h1 class="text-center font-bold text-md sm:text-lg mt-5">No products found in the database.</h1>
                     </div>   
                  @endforelse
            </div>
            {{-- Buttons for previous and next --}}
               <div class="flex justify-between items-center">
                  <x-jet-button aria-label="Previous" class="absolute top-1/2 left-0 glider-prev-most-viewed">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                     </svg>
                  </x-jet-button>
                  <x-jet-button aria-label="Next" class="absolute top-1/2 right-0 glider-next-most-viewed">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                     </svg>
                  </x-jet-button>
               </div>
         </div>
      </div>

      {{-- Finding products --}}
      <div class="p-5 h-1/2 w-screen bg-secondary flex flex-col md:flex-row justify-center items-center">
         <img src="{{ asset('images/undraw_community_8nwl.svg') }}" class="h-1/2 w-1/2 block mx-auto" alt="Three girls facing forward...">
         <div class="flex flex-col justify-center items-center p-5">
            <h1 class="text-3xl md:text-5xl text-gray-100">Easy shopping for computer enthusiastics</h1>
            <br>
            <p class="text-gray-200">There are many products here. Go explore this website, you might find what you like...</p>
         </div>
      </div>
   </div>

</x-normal_user>
