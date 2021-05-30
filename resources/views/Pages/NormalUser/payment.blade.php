<x-normal_user>

    @php
        $total = 0;
    @endphp

    <div class="w-auto mb-5 p-5 flex flex-row justify-center items-center space-x-3 bg-white  shadow-sm">
        <p class="text-purple-700 font-semibold">Cart</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-700" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        <p class="text-purple-700 font-semibold">Checkout</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-700" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        <p class="font-semibold text-purple-700">Payment</p>
    </div>

    <div class="w-11/12 my-10 mx-auto p-5 flex flex-col md:flex-row items-start space-y-5 md:space-x-5">
        <div class="w-11/12 md:w-1/2 mx-auto md:mr-auto mb-5 md:mb-0 p-5 bg-white rounded-lg shadow-md">
            <h1 class="text-lg md:text-2xl mb-5 md:mb-10 text-gray-700">Note: Cash on Delivery is available within Metro Manila only.</h1>
                <div class="mt-4">
                    <x-jet-input type="text" class="mt-1 block w-full" placeholder="Standard Delivery - Est.Arrival 2-3 days." disabled />
                </div>
        </div>
        <div class="w-11/12 md:w-1/2 mx-auto p-5 bg-white rounded-lg shadow-md" style="margin-top: 0;">

            @foreach ($carts as $cart)  
                <div class="flex flex-col md:flex-row p-2 border-b border-gray-300">
                    <img  class="block h-1/4 w-1/4 mx-auto" src="{{ asset('storage/media/products/main_'.$cart->product->product_code.'_'.$cart->product->default_photo) }}" alt="{{ $cart->product->product_name }}">
                    <div class="px-4 w-full flex flex-col justify-center items-start space-y-3">
                        <h1 class="text-gray-600 font-bold">
                            <a href="{{ route('product',[$cart->product->product_code]) }}">
                                {{ $cart->product->product_name }}
                            </a>
                        </h1>
                        <p>Brand: {{ $cart->product->brand->brand_name }}</p>
                        <p>&#8369; @convert(optional($cart->product->product_price)->price)</p>
                    </div>
                </div>    
            @endforeach  
            
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

            <div class="p-4 bg-white w-11/12 md:w-auto m-auto">
                <h1 class="mx-auto mb-5 text-center text-xl font-bold">The total amount of</h1>
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
            </div>
                
        </div>
    </div>
</x-normal_user>