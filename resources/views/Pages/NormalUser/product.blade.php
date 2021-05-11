<x-normal_user>
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="{{ asset('css/normal/normal.css') }}">
    @endpush

    @push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script type="text/javascript">
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
            thumbs: {
            swiper: swiper, 
            },
        });

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var img1 = document.getElementById("myImg_1");
        var img2 = document.getElementById("myImg_2");
        var img3 = document.getElementById("myImg_3");

        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");

        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        img1.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        img2.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        img3.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

    </script>
       
    @endpush
    <div class="bg-white p-5 my-12 w-11/12 mx-auto flex flex-col justify-center items-center">
        {{-- For product's show-off --}}
        <div class="p-5 w-4/5 border-b border-gray-400">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 md:col-span-2">
                    <!-- Swiper -->
                    <div
                    style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                    class="swiper-container mySwiper2"
                    >
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img id="myImg" src="{{ asset('storage/media/products/main_'.$product->product_code.'_'.$product->default_photo) }}" />
                            </div>
                            @if (!empty($product->product_photos->photo_1))
                                <div class="swiper-slide">
                                    <img id="myImg_1" class="product_image" src="{{ asset('storage/media/products/'.$product->product_code.'_photo_1_'.$product->product_photos->photo_1) }}" />
                                </div>
                            @endif
                            @if (!empty($product->product_photos->photo_2))
                                <div class="swiper-slide">
                                    <img id="myImg_2" class="product_image" src="{{ asset('storage/media/products/'.$product->product_code.'_photo_2_'.$product->product_photos->photo_2) }}" />
                                </div>
                            @endif
                            @if (!empty($product->product_photos->photo_3))
                                <div class="swiper-slide">
                                    <img id="myImg_3" class="product_image" src="{{ asset('storage/media/products/'.$product->product_code.'_photo_3_'.$product->product_photos->photo_3) }}" />
                                </div>
                            @endif

                        </div>
                        <div class="swiper swiper-button-next"></div>
                        <div class="swiper swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/media/products/main_'.$product->product_code.'_'.$product->default_photo) }}" />
                            </div>
                            @if (!empty($product->product_photos->photo_1))
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/media/products/'.$product->product_code.'_photo_1_'.$product->product_photos->photo_1) }}" />
                                </div>
                            @endif

                            @if (!empty($product->product_photos->photo_2))
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/media/products/'.$product->product_code.'_photo_2_'.$product->product_photos->photo_2) }}" />
                                </div>
                            @endif
                           
                            @if (!empty($product->product_photos->photo_3))
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/media/products/'.$product->product_code.'_photo_3_'.$product->product_photos->photo_3) }}" />
                                </div>
                            @endif

                        </div>
                    </div> <!--end of  Swiper -->
                </div>

                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- The Close Button -->
                    <span class="close">&times;</span>
                    <!-- Modal Content (The Image) -->
                    <img class="modal-content" id="img01">
                    
                    <!-- Modal Caption (Image Text) -->
                    <div id="caption"></div>
                </div>
            

                {{-- <img src="{{ asset('./img/RAM1.jpg') }}" alt="RAM" class="block h-2/4 w-2/4 md:h-1/4 md:w-1/4 mx-auto"> --}}
                <div class="flex flex-col">
                    <h1 class="text-2xl md:text-4xl font-bold">{{ $product->product_name }}</h1>
                    <div class="mt-5 flex flex-row justify-start">
                        <div class="mr-5 flex flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p>5 reviews</p>
                    </div>
                    <div class="mt-5 flex flex-row justify-start">
                        <p class="mr-5">Availability:</p>
                        <p class="font-bold">{{ $product->stock }} pieces left</p>
                    </div>
                    
                    @if (!empty($product->product_price->discounted_price))
                        <h1 class="mt-5 text-2xl md:text-4xl font-bold text-yellow-600">&#8369; @convert($product->product_price->discounted_price)</h1>
                        <h6 class="mt-5 text-sm md:text-md font-bold text-red-600">&#8369; @convert($product->product_price->price)
                            <span>
                                @if ($product->product_price->discount_type == 'Money' )
                                    - &#8369;  {{ $product->product_price->discount_price }}  Off
                                @else
                                    -   {{ $product->product_price->discount_price }} % Off
                                @endif
                            </span>
                        </h6>
                    @else
                        <h1 class="mt-5 text-2xl md:text-4xl font-bold text-yellow-600">&#8369; @convert($product->product_price->price)</h1>
                    @endif
                </div> {{-- end of product details --}}
                
            </div>
        </div>
        {{-- For product's overview --}}
        <div class="p-5 w-4/5 border-b border-gray-400">
            <h1 class="text-center font-bold">Overview</h1>
            <div class="mt-3 flex flex-col justify-start">
                <h1 class="mb-5 font-bold">Product's description</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem ipsam distinctio natus labore suscipit deleniti iste eius ut aliquid sint amet eligendi doloremque officia error in quas, impedit nisi veniam quidem obcaecati dicta? Assumenda quis culpa doloribus quidem asperiores earum enim deserunt, nemo, numquam iure illum, odit ipsum. Neque?</p>
                <br>
                <h1 class="mb-5 font-bold">Product's specification</h1>
                <ul class="list-disc">
                    <li class="text-gray-600">Test</li>
                    <li class="text-gray-600">Test</li>
                    <li class="text-gray-600">Test</li>
                    <li class="text-gray-600">Test</li>
                </ul>
            </div>  
        </div>
         {{-- For product's review --}}
         <div class="p-5 w-4/5 border-b border-gray-400">
            <h1 class="text-center font-bold">Reviews</h1>
            @livewire('product.review-content')

            @livewire('product.review-content') 

            @livewire('product.review-content')

            <x-jet-button class="mt-5" id="review-show-more">Show more reviews</x-jet-button>
            
            {{-- Reviews hidden by default --}}
            <div class="hidden" id="review-container-show">
                @livewire('product.review-content')

                @livewire('product.review-content') 

                @livewire('product.review-content')

                <x-jet-button class="mt-5" id="review-show-less">Show less reviews</x-jet-button>
            </div>    
        </div>
    </div>  

</x-normal_user>    