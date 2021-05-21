<x-normal_user>

   <div class="flex flex-col space-y-5">
      @livewire('carousel.landing')

      <div class="px-12">
         <h1 class="text-center text-purple-900 text-3xl md:text-5xl my-5">Best Sellers</h1>
         @livewire('carousel.products')
      </div>
      <br>
      <br>
      <br>
      <div class="px-12">
         <h1 class="text-center text-purple-900 text-3xl md:text-5xl my-5">Most Viewed</h1>
         @livewire('carousel.most-viewed')
      </div>
   </div>

</x-normal_user>
