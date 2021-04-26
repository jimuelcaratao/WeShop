<x-normal_user>
    <div class="w-11/12 my-12 mx-auto">
        <h1 class="text-center text-3xl sm:text-4xl font-bold">Shopping Cart</h1>

        <div class="mt-12 flex flex-col md:flex-row justify-center items-center space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-3/5">
                <h1 class="text-left text-2xl sm:text-3xl font-bold">Cart (1 item)</h1>
                <hr class="my-2 border-b border-gray-500">
                <div class="flex flex-col md:flex-row p-2">
                    <img src="{{ asset('./img/RAM.jpg') }}" alt="RAM" class="block h-2/4 w-2/4 md:h-1/4 md:w-1/4 mx-auto">
                    <div class="px-4 w-full flex flex-col justify-around items-start space-y-3">
                        <h1 class="text-gray-600 font-bold">RAM V2. X2111111X2111111X2111111X2111111</h1>
                        <p>Brand: ASUS</p>
                        <div class="flex flex-row space-x-2">
                            <x-jet-button><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>Remove item</x-jet-button>
                            <x-jet-button><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>Move to wishlist</x-jet-button>
                        </div>
                    </div>
                    <div class="mt-3 md:mt-0 px-4 flex flex-col justify-around items-center">
                        <div class="flex flex-col items-center">
                            <label for="quantity">Quantity</label>
                            <input class="" type="number" name="quantity" min="1" value="1">
                        </div>
                        <p class="font-bold mt-5">&#8369; 12,000</p>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white shadow-md w-11/12 md:w-auto">
                <h1 class="mb-5 text-center text-2xl sm:text-3xl font-bold">The total amount of</h1>
                <div class="flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <p>Temporary Amount</p>
                        <p>&#8369; 12,000</p>
                    </div>
                    <div class="flex flex-row justify-between items-center">
                        <p>Shipping</p>
                        <p>Free</p>
                    </div>
                </div>
                <hr class="my-5 border-b border-gray-500">
                <div class="flex flex-row justify-between items-center font-bold mb-5">
                    <p class="text-sm">The total amount of (including VAT)</p>
                    <p>&#8369; 12,000</p>
                </div>
                <x-jet-button>Go to checkout</x-jet-button>
            </div>
        </div>
    </div>
 </x-normal_user>
 