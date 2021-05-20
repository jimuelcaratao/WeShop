<x-normal_user>

   @livewire('carousel.landing')

   <div class="px-12">
      <h1 class="text-center text-purple-900 text-3xl md:text-6xl my-5">Best Sellers</h1>

      @livewire('carousel.products')
   </div>
   <div class="px-12">
      <h1 class="text-center text-purple-900 text-3xl md:text-6xl my-5">Most Viewed</h1>

      @livewire('carousel.most-viewed')
   </div>

</x-normal_user>
