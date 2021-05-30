<x-normal_user>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/normal/normal.css') }}">
    @endpush



    <div class="w-11/12 my-12 mx-auto">
        {{-- <h1 class="text-center text-3xl sm:text-4xl font-bold">My Wish list</h1> --}}

        <div class="mt-12 flex flex-col justify-center items-center space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-4/5">
                <h1 class="text-left text-xl font-bold">
                    Write Review Order No. : {{ $order->order_no }}
                </h1>
                <hr class="my-2 border-b border-gray-500">
                <div class="container my-12 mx-auto px-4 md:px-12">
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">
                          
                        <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Writing a Review on {{ $product->product_name }} </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Writing a review will be very much appreciated.
                                </p>
                            </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">

                            <form action="{{ route('write_review.write', [$product->product_code,$order->order_no]) }}" method="POST">
                                @csrf
                                <div class="overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">


                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="stars" class="block text-sm font-medium text-gray-700">Star</label>
                                            <input type="text" name="stars" id="stars" value="{{ old('stars') }}" class="hidden mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <div class="flex justify-center items-center">
                                                <div class="flex items-center mt-2 mb-4">
                                                  <svg id="star-1" class="mx-1 cursor-pointer w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                  <svg id="star-2" class="mx-1 cursor-pointer w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                  <svg id="star-3" class="mx-1 cursor-pointer w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                  <svg id="star-4" class="mx-1 cursor-pointer w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                  <svg id="star-5" class="mx-1 cursor-pointer w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                                </div>
                                              </div>
                                        </div>
                            
                                        <div class="col-span-6 ">
                                            <div>
                                                <label for="body" class="block text-sm font-medium text-gray-700">
                                                    Message
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="body" name="body"  rows="3" class="shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" >{{ old('body') }}</textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Message on the product. URLs are hyperlinked.
                                                </p>
                                            </div>
                                        </div>
                        
                        
                                    </div>
                                </div>
                                    <div class="px-4 py-3  text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-800 hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Submit
                                        </button>
                                    </div>
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

    @push('scripts')
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // hover

            $("#star-1").hover(function () {
                $(this).toggleClass("text-yellow-500");


            });

            $("#star-2").hover(function () {
                $(this).toggleClass("text-yellow-500");
                $("#star-1").toggleClass("text-yellow-500");
       
            });

            $("#star-3").hover(function () {
                $(this).toggleClass("text-yellow-500");
                $("#star-1").toggleClass("text-yellow-500");
                $("#star-2").toggleClass("text-yellow-500");
   
            });

            $("#star-4").hover(function () {
                $(this).toggleClass("text-yellow-500");
                $("#star-1").toggleClass("text-yellow-500");
                $("#star-2").toggleClass("text-yellow-500");
                $("#star-3").toggleClass("text-yellow-500");
            });

            $("#star-5").hover(function () {
                $(this).toggleClass("text-yellow-500");
                $("#star-1").toggleClass("text-yellow-500");
                $("#star-2").toggleClass("text-yellow-500");
                $("#star-3").toggleClass("text-yellow-500");
                $("#star-4").toggleClass("text-yellow-500");
            });


            // onclik
            $('#star-1').click(function(){
                $(this).addClass("text-yellow-500");
                $("#star-2").removeClass("text-yellow-500");
                $("#star-3").removeClass("text-yellow-500");
                $("#star-4").removeClass("text-yellow-500");
                $("#star-5").removeClass("text-yellow-500");
                
                $('#stars').val(1);

                $("#star-1").unbind('mouseenter mouseleave');
                $("#star-2").unbind('mouseenter mouseleave');
                $("#star-3").unbind('mouseenter mouseleave');
                $("#star-4").unbind('mouseenter mouseleave');
                $("#star-5").unbind('mouseenter mouseleave');
            });
            $('#star-2').click(function(){
                $("#star-1").addClass("text-yellow-500");
                $(this).addClass("text-yellow-500");
                $("#star-3").removeClass("text-yellow-500");
                $("#star-4").removeClass("text-yellow-500");
                $("#star-5").removeClass("text-yellow-500");

                $('#stars').val(2);

                $("#star-1").unbind('mouseenter mouseleave');
                $("#star-2").unbind('mouseenter mouseleave');
                $("#star-3").unbind('mouseenter mouseleave');
                $("#star-4").unbind('mouseenter mouseleave');
                $("#star-5").unbind('mouseenter mouseleave');
            });
            $('#star-3').click(function(){
                $("#star-1").addClass("text-yellow-500");
                $("#star-2").addClass("text-yellow-500");
                $(this).addClass("text-yellow-500");
                $("#star-4").removeClass("text-yellow-500");
                $("#star-5").removeClass("text-yellow-500");

                $('#stars').val(3);

                $("#star-1").unbind('mouseenter mouseleave');
                $("#star-2").unbind('mouseenter mouseleave');
                $("#star-3").unbind('mouseenter mouseleave');
                $("#star-4").unbind('mouseenter mouseleave');
                $("#star-5").unbind('mouseenter mouseleave');
            });

            $('#star-4').click(function(){
                $("#star-1").addClass("text-yellow-500");
                $("#star-2").addClass("text-yellow-500");
                $("#star-3").addClass("text-yellow-500");
                $(this).addClass("text-yellow-500");
                $("#star-5").removeClass("text-yellow-500");

                $('#stars').val(4);

                $("#star-1").unbind('mouseenter mouseleave');
                $("#star-2").unbind('mouseenter mouseleave');
                $("#star-3").unbind('mouseenter mouseleave');
                $("#star-4").unbind('mouseenter mouseleave');
                $("#star-5").unbind('mouseenter mouseleave');
            });

            $('#star-5').click(function(){
                $("#star-1").addClass("text-yellow-500");
                $("#star-2").addClass("text-yellow-500");
                $("#star-3").addClass("text-yellow-500");
                $("#star-4").addClass("text-yellow-500");
                $(this).addClass("text-yellow-500");

                $('#stars').val(5);

                $("#star-1").unbind('mouseenter mouseleave');
                $("#star-2").unbind('mouseenter mouseleave');
                $("#star-3").unbind('mouseenter mouseleave');
                $("#star-4").unbind('mouseenter mouseleave');
                $("#star-5").unbind('mouseenter mouseleave');
            });
        });
    </script>
    @endpush

</x-normal_user>    