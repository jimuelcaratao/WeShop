<x-normal_user>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/normal/normal.css') }}">
    @endpush

    <div class="w-11/12 my-12 p-6 md:p-12 mx-auto">

        @php
            $total = 0;
        @endphp

        <div class="flex flex-col md:flex-row justify-center items-center md:items-start space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-3/5">
                <h1 class="text-left text-xl font-bold">My Cart ({{ count($carts) }} item/s)</h1>
                <hr class="my-2 border-b border-gray-500">

                @forelse ($carts as $cart)

                    <div class="flex flex-col md:flex-row p-2 border-b border-gray-500">
                        {{-- {{ asset('storage/media/products/main_'.$cart->product->product_code.'_'.$cart->product->default_photo) }} --}}
                        <img  class="h-1/2 w-1/2 md:h-1/4 md:w-1/4 block mx-auto" src="{{ asset('img/RAM1.jpg') }}" alt="{{ $cart->product->product_name }}">
                        <div class="px-4 w-full flex flex-col justify-around items-start space-y-3">
                            <h1 class="text-gray-700 font-bold">
                                <a href="{{ route('product',[$cart->product->product_code]) }}">
                                    {{ $cart->product->product_name }}
                                </a>
                            </h1>
                            <p>Brand: {{ $cart->product->brand->brand_name }}</p>

                            {{-- Buttons --}}
                            <div class="flex flex-row space-x-2">
                                <form action="{{ route('cart.remove', [$cart->product->product_code]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                              

                                <form action="{{ route('cart.move', [$cart->product->product_code]) }}" method="POST">
                                    @csrf
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </form>
                              
                            </div>

                        </div>
                        <div class="mt-3 md:mt-0 px-4 flex flex-col justify-around items-center">
                            <div class="flex flex-col items-center">

                                <form class="formQuantity" action="{{ route('cart.quantity',[$cart->cart_id]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    {{-- <label for="quantity">Quantity:</label> --}}
                                    {{-- <input class="input_quantity"  type="number" name="quantity" min="1" max="5"  value="{{ $cart->quantity }}"> --}}


                                    <td>
                                        <div class="justify-content-center">
                                            <div class=" mx-auto mb-0">
                                                <label for="quantity">Quantity :</label>
                                                <div class="number-input">

                                                <button  class="qty-btn" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                                                <input class="input_quantity quantity" min="1" max="5" name="quantity" value="{{ $cart->quantity }}" type="number">
                                                <button  class="qty-btn plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </form>
                            </div>
                            
                            
                            @if (!empty($cart->product->product_price->discounted_price))
                                <h1 class="mt-5">&#8369; @convert($cart->product->product_price->discounted_price)</h1>
                                <h6 class="text-sm text-red-600"><span class="line-through">&#8369; @convert(optional($cart->product->product_price)->price)</span>
                                    <span>
                                        @if ($cart->product->product_price->discount_type == 'Money' )
                                            - &#8369;  {{ $cart->product->product_price->discount_price }}  Off
                                        @else
                                            -   {{ $cart->product->product_price->discount_price }} % Off
                                        @endif
                                    </span>
                                </h6>
                            @else
                                <h1 class="mt-5">&#8369; @convert(optional($cart->product->product_price)->price)</h1>
                            @endif

                        </div>
                    </div> {{-- end of item --}}

                    @php

                        $price = 0;

                        if (optional($cart->product->product_price)->discounted_price != null) {
                            $price = optional($cart->product->product_price)->discounted_price;
                        }

                        if (optional($cart->product->product_price)->discounted_price == null) {
                            $price = optional($cart->product->product_price)->price;
                        }

                        $total = ($cart->quantity * $price) + $total;

                    @endphp

                @empty
                    <div class="flex flex-col md:flex-row ">
                        <div class="px-4 w-full flex flex-col justify-around items-start ">
                            <img src="{{ asset('images/undraw_empty_cart_co35.svg') }}" alt="RAM" class="block h-2/4 w-2/4  mx-auto">
                            <p class="font-bold block mx-auto">No item on carts</p>
                        </div>
                    </div>
                @endforelse

            </div>

            <div class="p-4 bg-white shadow-md w-11/12 md:w-auto m-auto" style="margin-top: 0;">
                <h1 class="mx-10 mb-5 text-center text-xl font-bold">The total amount of</h1>
                <div class="flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <p>Subtotal: ({{ count($carts) }} item/s)</p>
                        <p>&#8369; @convert($total) </p>
                    </div>
                     <div class="flex flex-row justify-between items-center">
                          <p>Shipping</p>
                          <p>Free</p>
                     </div>
                </div>
                <hr class="my-5 border-b border-gray-500">
                <div class="flex flex-row justify-between items-center font-bold mb-5">
                    <p class="text-sm">The total amount: </p>
                    <p>&#8369; @convert($total) </p>
                </div>
                <x-jet-button>
                    <a href="{{ route('checkout.index') }}">
                        Go to checkout
                    </a>
                </x-jet-button>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
            $(".input_quantity").on("input", function() {
                $("form.formQuantity").submit();
            });

        </script>
    @endpush

 </x-normal_user>
 