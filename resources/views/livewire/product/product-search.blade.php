<div>
    <form class="flex justify-center items-center w-screen px-8 md:px-12">
        <x-jet-input 
            class="relative w-full" 
            type="text" 
            placeholder="Product name or brand name"
            wire:model="search" 
            wire:keydown.escape="resetSearch"
        />
    </form>
    {{-- Search content --}}
    <div class="px-8 md:px-12 absolute top-18 left-0 z-40 bg-gray-50 w-full rounded-b-md">
        <div class="max-h-72 overflow-auto divide-y divide-gray-200">
            @if (!empty($search))
                @forelse ($products as $product)
                    <a href="/product/{{ $product->product_code }}" class="flex flex-row py-2 hover:bg-gray-100">
                        <img src="{{ asset('storage/media/products/main_'.$product->product_code.'_'.$product->default_photo) }}" class="h-auto w-20 mr-3" alt="{{ $product->product_name }}">
                        <div class="flex flex-col space-y-2">
                            <p class="text-gray-900">{{ $product->product_name }}</p>
                            <p class="text-gray-600">{{ $product->brand_name }}</p>
                        </div>
                    </a>
                @empty
                    <a class="px-5 py-2 overscroll-none">No results found...</a>
                @endforelse    
            @endif
        </div>
    </div>
</div>
