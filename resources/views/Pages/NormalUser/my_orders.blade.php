<x-normal_user>
    @push('styles')

    @endpush

    @push('scripts')


    <script type="text/javascript">

    </script>
       
    @endpush

    <div class="w-11/12 my-12 mx-auto">
        {{-- <h1 class="text-center text-3xl sm:text-4xl font-bold">My Wish list</h1> --}}

        <div class="mt-12 flex flex-col justify-center items-center space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-4/5">
                <h1 class="text-left text-xl font-bold">
                    My Orders ({{ count($orders) }} item/s)
                </h1>
                <hr class="my-2 border-b border-gray-500">
                <div class="container my-12 mx-auto px-4 md:px-12">
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">

                      @forelse ($orders as $order)
                        <p>Order on {{ $order->created_at }}</p>

                     

                        @foreach ($order->order_items as $item)
                          <!--Card 1-->
                          <div class="my-2 w-full lg:max-w-full lg:flex border rounded-b lg:rounded-b-none lg:rounded-r">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden  " style="background-image: url('{{ asset('storage/media/products/main_'.$item->product->product_code.'_'.$item->product->default_photo) }}')" title="Mountain">

                          
                            </div>
                            <div class=" bg-white  p-4 flex flex-col justify-between leading-normal">
                              <div class="mb-8">
                                <div class=" flex flex-row justify-between">
                                  <div>
                                    <a href="{{ route('product',[$item->product->product_code]) }}">
                                      <div class="text-gray-900 font-bold text-xl mb-2">{{ $item->product->product_name }}</div>
        
                                    </a>
                                    <p class="text-gray-700 text-base">
                                      {{ \Illuminate\Support\Str::limit($item->product->description, 120) }}
                                    </p>
                                  </div>

                                  <div>
                                    @php
                                        $user_has_review = App\Models\Review::where('user_id' , 'like', '%' . Auth::user()->id . '%')
                                          ->where('order_no' , $order->order_no)
                                          ->where('product_code' , $item->product->product_code)
                                          ->first();
                                    @endphp
                                    @if ($order->status == "Delivered")
                                      @if ($user_has_review != null)
                                        <a class="italic" href="{{ route('product',[$item->product->product_code]) }}">
                                          Reviewed
                                        </a>
                                      @endif
                                      @empty($user_has_review)
                                        <button class="bg-green-800 hover:bg-green-900 text-white  px-4 rounded">
                                          <a href="{{ route('write_review',[$item->product->product_code,$order->order_no]) }}">
                                            Review
                                          </a>
                                        </button>
                                      @endempty
                                     
                                    @endif
                                  </div>
                                </div>
                               
                              </div>
                              <div class="flex items-center justify-between">
                                <div class="text-sm">
                                  <p class="text-gray-900 leading-none">₱ @convert($item->price)</p>
                                  <p class="text-gray-600">Qty: {{ $item->quantity }}</p>
                                </div>

                                <div class=" ml-6">
                                  <p class="text-gray-900 leading-none font-bold ">Subtotal(1 item): ₱ @convert( $item->quantity * $item->price)</p>
                                </div>
                              
                              </div>
                              <div class="flex items-center justify-end">
                                  <a class="italic" href="{{ route('my_orders.status',[$item->product->product_code,$order->order_no]) }}">
                                      {{ $order->status }}
                                  </a>
                              </div>
                            </div>
                          </div>
                        @endforeach

                      @empty
                        <div class="flex flex-col md:flex-row ">
                            <div class="px-4 w-full flex flex-col justify-around ">
                                <img src="{{ asset('images/undraw_Wishlist_re_m7tv.svg') }}" alt="RAM" class="block h-2/4 w-2/4  mx-auto">
                                <p class="font-bold block mx-auto">No orders</p>
                            </div>
                        </div> 
                      @endforelse
              
                
                    </div>
                </div>

            </div>
        </div>
    </div>
  

</x-normal_user>    