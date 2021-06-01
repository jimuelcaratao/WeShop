<x-normal_user>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/normal/normal.css') }}">
    @endpush


    <div class="w-11/12 my-12 mx-auto">
        {{-- <h1 class="text-center text-3xl sm:text-4xl font-bold">My Wish list</h1> --}}

        <div class="mt-12 flex flex-col justify-center items-center space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-4/5">
                <h1 class="text-left text-xl font-bold">
                    <div class="flex flex-row justify-between">
                        Order No. Status: 
                        <svg xmlns="http://www.w3.org/2000/svg" class="my-auto h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                     
                </h1>
                <hr class="my-2 border-b border-gray-500">
                <div class="container my-12 mx-auto px-4 md:px-12">
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">
                          
                        <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Order No.: {{ $order->order_no }}
                                 
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Writing a review will be very much appreciated.
                                </p>
                            </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">

                                @if (empty($order->packaged_at))
                                    <div class="mx-auto font-bold">
                                        <p>Your order is being processed..</p>
                                    </div>
                                @endif

                                <!-- timeline component -->
                                <div class="container">
                                    <div
                                    class="flex flex-col md:grid grid-cols-9 mx-auto p-2 text-green-50"
                                    >
                                
                                    @if (!empty($order->packaged_at))
                                        <!-- left -->
                                        <div class="flex flex-row-reverse md:contents">
                                            <div
                                            class="bg-green-500 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md"
                                            >
                                            <h3 class="font-semibold text-lg mb-1">Packaged</h3>
                                            <p class="leading-tight text-justify">
                                                {{ $order->packaged_at }}
                                            </p>
                                            </div>
                                            <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                                            <div class="h-full w-6 flex items-center justify-center">
                                                <div class="h-full w-1 bg-green-800 pointer-events-none"></div>
                                            </div>
                                            <div
                                                class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-green-500 shadow"
                                            ></div>
                                            </div>
                                        </div> 
                                    @endif
                                   
                                    @if (!empty($order->shipped_at))
                                        <!-- right -->
                                        <div class="flex md:contents">
                                            <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
                                            <div class="h-full w-6 flex items-center justify-center">
                                                <div class="h-full w-1 bg-green-800 pointer-events-none"></div>
                                            </div>
                                            <div
                                                class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-green-500 shadow"
                                            ></div>
                                            </div>
                                            <div
                                            class="bg-green-500 col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-md"
                                            >
                                            <h3 class="font-semibold text-lg mb-1">Shipped</h3>
                                            <p class="leading-tight text-justify">
                                                {{ $order->shipped_at }}
                                            </p>
                                            </div>
                                        </div>
                                    @endif

                                    @if (!empty($order->delivered_at))
                                    <!-- left -->
                                    <div class="flex flex-row-reverse md:contents">
                                        <div
                                        class="bg-green-500 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md"
                                        >
                                        <h3 class="font-semibold text-lg mb-1">Delivered</h3>
                                        <p class="leading-tight text-justify">
                                            {{ $order->delivered_at }}
                                        </p>
                                        </div>
                                        <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                                        <div class="h-full w-6 flex items-center justify-center">
                                            <div class="h-full w-1 bg-green-800 pointer-events-none"></div>
                                        </div>
                                        <div
                                            class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-green-500 shadow"
                                        ></div>
                                        </div>
                                    </div> 
                                    @endif
                                    
                           
                                
                                  
                                    </div>
                                </div>




                                {{-- @if ($order->packaged_at == null)
                                   
                                @endif --}}
                                <div class="overflow-hidden sm:rounded-md">
                                    <form action="#" method="POST">
                                        @csrf
                                            <div class="px-4 py-3  text-right sm:px-6">
                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-800 hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Cancel Order 
                                                </button>
                                            
                                            </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        </div>
           
                
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-normal_user>    