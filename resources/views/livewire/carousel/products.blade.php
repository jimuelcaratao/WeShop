<div>
   {{-- Carousel Container --}}
   <div class="glider-contain relative h-1/2 md:h-screen md:w-screen">
    {{-- Slide Container --}}
    <div class="products">
        <div><img src="{{ asset('./img/home-banner/Banner_1.jpg') }}" class="h-full w-full" alt=""></div>
        <div><img src="{{ asset('./img/home-banner/Banner_2.jpg') }}" class="h-full w-full" alt=""></div>
        <div><img src="{{ asset('./img/home-banner/Banner_3.jpg') }}" class="h-full w-full" alt=""></div>
        <div><img src="{{ asset('./img/home-banner/Banner_1.jpg') }}" class="h-full w-full" alt=""></div>
        <div><img src="{{ asset('./img/home-banner/Banner_2.jpg') }}" class="h-full w-full" alt=""></div>
    </div>
    {{-- Buttons for previous and next --}}
    <button aria-label="Previous" class="glider-prev-products"><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current text-purple-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg></button>
    <button aria-label="Next" class="glider-next-products"><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-current text-purple-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg></button>
    {{-- Dots for number of content in slides --}}
    <div role="tablist" class="dots-products"></div>
</div>
</div>
