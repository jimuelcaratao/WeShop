<x-normal_user>
    {{-- Parent container for the whole page --}}
    <div class="w-screen my-5 mx-auto px-5 flex md:flex-row relative">
        
        {{-- Sorting for products --}}
        @livewire('catalog.sorting')

        {{-- List of products --}}
        @livewire('catalog.products')

    </div>
 </x-normal_user>
 