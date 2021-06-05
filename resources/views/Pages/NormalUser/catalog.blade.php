<x-normal_user>

    @push('scripts')

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('.brand-radio').click(function() {
            brand =  $('input[name="brand_type"]:checked').val();

            $('#brand-form').submit();
        });

        $('.stock-radio').click(function() {
            brand =  $('input[name="stock_type"]:checked').val();

            $('#stock-form').submit();
        });

        $('#brand_type_clear').click(function() {
            
            $('input[name="brand_type"][value={{ request()->brand_type }}]').prop("checked",false);
            $('#brand-form').submit();
        });

        $('#stock_type_clear').click(function() {

            $('input[name="stock_type"][value={{ request()->stock_type }}]').prop("checked",false);
            $('#brand-form').submit();
        });

        window.document.onload = $(document).ready(function() { 
            if ('{{ request()->brand_type }}' != '') {
                $('input[name="brand_type"][value={{ request()->brand_type }}]').prop("checked",true);
            }

            if ('{{ request()->stock_type }}' != '') {
                $('input[name="stock_type"][value={{ request()->stock_type }}]').prop("checked",true);
            }
        });
    </script>
       
    @endpush

    <div class="text-center pt-5">
            <p class="mt-2 text-4xl leading-8 font-extrabold tracking-tight text-gray-900 ">
              Products 
            </p>
            <p class="mt-4 max-w-2xl text-sm text-gray-500 lg:mx-auto">
                <nav class="text-black font-bold " aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <a href="#">WeShop</a>
                        </li>

                        @if (!empty($category_name))
                            <span class="text-md  mx-2">-</span>
                            <li class="flex capitalize items-center">
                                <a href="#">{{ $category_name }}</a>
                            </li>
                        @endif

                        @if (!empty($sub_category_name))
                            <span class="text-md  mx-2">-</span>
                            <li class="flex capitalize items-center">
                                <a href="#">{{ $sub_category_name }}</a>
                            </li>
                        @endif
                        @empty($brands_search)
                            <span class="text-md  mx-2">-</span>
                            <li class="flex items-center">
                            <a href="#">ALL</a>
                            </li>
                        @endempty

                        @if (!empty($brands_search))
                            <span class="text-md  mx-2">-</span>
                            <li class="flex items-center">
                                <a href="#">{{ $brands_search }}</a>
                            </li>
                        @endif
                    
                    </ol>
                </nav>
            </p>
    </div>

    {{-- Parent container for the whole page --}}
    <div class="w-11/12 my-12 mx-auto flex md:flex-row items-start">
        
        {{-- Sorting for products --}}
        @livewire('catalog.sorting')

        {{-- List of products --}}

        <div class="container">
            <div class="flex flex-wrap place-self-start -mx-4">

                @forelse ($products as $product)
                    <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 px-4 pb-4">
                        <a href="{{ route('product',[$product->product_code]) }}" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('storage/media/products/main_'.$product->product_code.'_'.$product->default_photo) }}" alt="{{ $product->product_name }}">
                            </div>
                            <div class="p-4">
                                <h2 class="mt-2 mb-2  font-bold">{{ $product->product_name }}</h2>
                                <div class="mt-3 flex items-center">
                                        @if (!empty($product->product_price->discounted_price))
                                            <span class="text-sm font-semibold">₱</span>&nbsp;<span class="font-bold text-xl">@convert($product->product_price->price)</span>&nbsp;

                                            <p class="text-red-600 text-sm">&#8369; <span class="line-through ">@convert($product->product_price->price)</span>
                                                <span class="text-sm font-semibold">
                                                    @if ($product->product_price->discount_type == 'Money' )
                                                        - &#8369;  {{ $product->product_price->discount_price }}  Off
                                                    @else
                                                        -   {{ $product->product_price->discount_price }} % Off
                                                    @endif
                                                </span>
                                            </p>
                                        @else
                                            {{-- Added optional helper to render even if the price is null, to prevent non object error --}}
                                            <span class="text-sm font-semibold">₱</span>&nbsp;<span class="font-bold text-xl">@convert($product->product_price->price)</span>&nbsp;

                                        @endif
                                </div>
                            </div>
                            <div class="p-4 border-t border-b text-xs text-gray-700 flex justify-between">
                                <span class="flex items-center mb-1">
                                    {{ $product->brand->brand_name }}
                                </span>
                                @if ($product->stock <= 0)
                                    <span class="flex items-center mb-1 text-red-600">
                                        Out of Stocks
                                    </span>
                                @endif
                            </div>
                            <div class="p-4 flex items-center text-sm text-gray-600">

                                @php
                                    $product_ave_reviews = App\Models\Review::where('product_code',$product->product_code)->avg('stars');
                                @endphp

                                {!! str_repeat('
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg>
                                ', round($product_ave_reviews, 0)) !!}

                                {!! str_repeat('
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-gray-400"><path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path></svg>
                                ', 5 - round($product_ave_reviews, 0)) !!}

                                ( {{ round($product_ave_reviews, 0) }} )


                                <span class="ml-2">{{ count($product->product_reviews) }} Reviews</span>
                            </div>
                        </a>
                    </div>
                @empty
                    
                @endforelse

                
   
            
            </div>
        </div>

 </x-normal_user>
 