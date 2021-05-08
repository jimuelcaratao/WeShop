<x-normal_user>
    {{-- Parent container for the whole page --}}
    <div class="w-11/12 my-12 mx-auto flex md:flex-row">
        
        {{-- Sorting for products --}}
        @livewire('catalog.sorting')

        {{-- List of products --}}
        @livewire('catalog.products')

    </div>
 </x-normal_user>
 