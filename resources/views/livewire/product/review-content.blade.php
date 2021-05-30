<div>
    <div class="mt-3 flex flex-col justify-start">
        <div class="flex flex-row items-center">

            {{-- images --}}
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="h-12 w-12 rounded-full object-cover mr-3 border p-1" src="{{ $reviews->user->profile_photo_url }}" alt="{{ $reviews->user->name }}" />
            @else
                <span class="inline-flex rounded-md">
                    {{ $reviews->user->name }}
                    <svg class="ml-2 -mr-0.5 h-4 w-4 mr-3 border p-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </span>
            @endif

             {{-- <img src="{{ asset('img/luffy-test-picture.png') }}" class="h-2/5 w-2/5 md:h-1/6 md:w-1/6" alt="Luffy's picture"> --}}
             <div>
                 <div class="flex flex-row">
                    <p class="font-bold text-2nxl mr-2">
                      {{ $reviews->user->name }}
                    </p>
                    <div clas="text-gray-100 text-sm"> 
                      - 
                      @if (strtotime($reviews->created_at) > time() - 86400)
                          {{ $reviews->created_at->diffForHumans() }}
                      @else
                          {{ \Carbon\Carbon::parse($reviews->created_at)->format('d / F / Y') }}
                      @endif
                      
                    </div>
                    @if (!empty($reviews->user->email_verified_at ))
                      <div class=" ml-2 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="verified h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    @endif
                   
                 </div>

                 <div class="flex flex-row">
                    {!! str_repeat('
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>
                    ', $reviews->stars) !!}
                    {!! str_repeat('
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                      </svg>
                    ', 5 - $reviews->stars) !!}
                 </div>
   
             </div>
        </div>
        <p class="text-gray-900 mt-5">{{ $reviews->body }}</p>
        <p class="text-gray-500 mt-2 text-sm">on {{ $product->product_name }}</p>

        
    
     </div>
     <div class="float-right mb-4">
        <a href="{{ route('product.review', [$reviews->product_code,$reviews->id]) }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>  



    <hr class="my-3">
</div>
