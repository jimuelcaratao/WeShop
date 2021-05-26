<x-normal_user>
   <div class="flex flex-col space-y-5">
       
      {{-- Landing page's carousel --}}
       <div class="glider-contain relative h-1/2 md:h-screen md:w-screen">
         {{-- Slide Container --}}
         <div class="glider">
             <div><img src="{{ asset('./img/home-banner/Banner1.jpg') }}" class="h-full w-full"></div>
             <div><img src="{{ asset('./img/home-banner/Banner2.jpg') }}" class="h-full w-full"></div>
             <div><img src="{{ asset('./img/home-banner/Banner3.jpg') }}" class="h-full w-full"></div>
         </div>
         {{-- Buttons for previous and next --}}
         <button aria-label="Previous" class="glider-prev">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
           </svg>
         </button>
         <button aria-label="Next" class="glider-next">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
           </svg>
         </button>
     </div>

      {{-- Products carousel --}}
      <div class="px-12">
         <h1 class="text-center text-purple-900 text-3xl md:text-5xl my-5">Best Sellers</h1>
         {{-- Carousel Container --}}
         <div class="glider-contain relative h-1/2 w-screen shadow-md rounded-xl">
            {{-- Slide Container --}}
            <div class="products bg-white flex justify-evenly items-center">
               @foreach ($products as $product)
                     <div class="h-full w-60 p-5 flex flex-col justify-center items-center space-y-5 hover:shadow-md bg-gray-50">
                        <img src="{{ asset('./img/RAM1.jpg') }}" alt="RAM's picture" class="block h-2/4 w-auto mx-auto">
                        <p class="text-sm sm:text-md">{{ $product->product_name }}</p>
                        <p class="text-sm">{{ $product->description }}</p>
                        <p class="text-sm">&#8369; 2,448.00</p>
                     </div>
               @endforeach
            </div>
         </div>
         {{-- Buttons for previous and next --}}
         <button aria-label="Previous" class="glider-prev-products">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current text-purple-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
         </button>
         <button aria-label="Next" class="glider-next-products">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current text-purple-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
         </button>
      </div>
      <br>
      <br>
      <br>
      {{-- <div class="px-12">
         <h1 class="text-center text-purple-900 text-3xl md:text-5xl my-5">Most Viewed</h1>
        
      </div> --}}
   </div>

</x-normal_user>
