<x-normal_user>
    <div class="w-11/12 my-12 mx-auto">
        {{-- <h1 class="text-center text-3xl sm:text-4xl font-bold">My Wish list</h1> --}}

        <div class="mt-12 flex flex-col justify-center items-center space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-4/5">
                <h1 class="text-left text-xl font-bold">
                    My Wish list ({{ count($wishlists) }} item/s)
                </h1>
                <hr class="my-2 border-b border-gray-500">
                <div class="container my-12 mx-auto px-4 md:px-12">
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">
                

                        @forelse ($wishlists as $wishlist)
                              <!-- Column -->
                        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                
                            <!-- Article -->
                            <article class="overflow-hidden rounded-lg shadow-lg">
                
                                <a href="{{ route('product',[$wishlist->product->product_code]) }}">
                                    <img class="block h-3/4 w-full"  src="{{ asset('storage/media/products/main_'.$wishlist->product->product_code.'_'.$wishlist->product->default_photo) }}" alt="{{ $wishlist->product->product_name }}">
                                </a>
                
                                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                    <h1 class="text-lg">
                                        <a class="no-underline text-black" href="{{ route('product',[$wishlist->product->product_code]) }}">
                                            {{ $wishlist->product->product_name }}
                                        </a>
                                    </h1>

                                    <p class="text-grey-darker text-sm">
                                        Brand: {{ $wishlist->product->brand->brand_name }}
                                    </p>  
                                </header>
                                
                                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                    <a class="flex items-center no-underline text-black">
                                        <p class="ml-2 text-sm">
                                            @if (!empty($wishlist->product->product_price->discounted_price))
                                                <h1 class="mr-2 0">&#8369; @convert($wishlist->product->product_price->discounted_price)</h1>
                                                <h6 class=" ">&#8369; <span class="line-through ">@convert($wishlist->product->product_price->price)</span>
                                                    <span>
                                                        @if ($wishlist->product->product_price->discount_type == 'Money' )
                                                            - &#8369;  {{ $wishlist->product->product_price->discount_price }}  Off
                                                        @else
                                                            -   {{ $wishlist->product->product_price->discount_price }} % Off
                                                        @endif
                                                    </span>
                                                </h6>
                                            @else
                                                <h1 class=" ">&#8369; @convert($wishlist->product->product_price->price)</h1>
                                            @endif
                                        </p>
                                    </a>
                                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                        <form action="{{ route('wishlist.remove', [$wishlist->product->product_code]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-right">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </a>
                                </footer>
                
                            </article>
                            <!-- END Article -->
                
                        </div>
                        <!-- END Column -->
                        @empty
                        <div class="flex flex-col md:flex-row ">
                            <div class="px-4 w-full flex flex-col justify-around ">
                                <img src="{{ asset('images/undraw_Wishlist_re_m7tv.svg') }}" alt="RAM" class="block h-2/4 w-2/4  mx-auto">
                                <p class="font-bold block mx-auto">No item on wishlist</p>
                            </div>
                        </div>
                        @endforelse

                      
                
                    </div>
                </div>

            </div>
        </div>
    </div>
 </x-normal_user>
 