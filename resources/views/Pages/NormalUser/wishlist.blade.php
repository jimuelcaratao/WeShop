<x-normal_user>
    <div class="w-11/12 my-12 mx-auto">
        <h1 class="text-center text-3xl sm:text-4xl font-bold">My Wish list</h1>

        <div class="mt-12 flex flex-col justify-center items-center space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-4/5">
                <h1 class="text-left text-2xl sm:text-3xl font-bold">Wish list (1 item)</h1>
                <hr class="my-2 border-b border-gray-500">
                <div class="flex flex-col md:flex-row p-2">
                    <img src="{{ asset('./img/RAM.jpg') }}" alt="RAM" class="block h-2/4 w-2/4 md:h-1/4 md:w-1/4 mx-auto">
                    <div class="px-4 w-full flex flex-col justify-around items-start space-y-3">
                        <h1 class="text-gray-600 font-bold">RAM V2. X2111111X2111111X2111111X2111111</h1>
                        <p>Brand: ASUS</p>
                        <p class="font-bold">&#8369; 12,000</p>
                        <div class="flex flex-row space-x-2">
                            <x-jet-button><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>Remove item</x-jet-button>
                            <x-jet-button><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>Add to cart</x-jet-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </x-normal_user>
 