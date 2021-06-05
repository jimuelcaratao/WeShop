<x-normal_user>
    <x-slot name="title">
        {{ $product->product_name }} review's | 
    </x-slot>

    @push('styles')
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        {{-- <link rel="stylesheet" href="{{ asset('css/normal/normal.css') }}"> --}}
    @endpush

    @push('scripts')

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    @endpush

    <div class="container py-4 my-4 ">

        <div class="row justify-content-center">
            <div class="col-8  bg-white p-5">
                <h4 class="mb-5">Review:</h4>
                
                <div class="flex flex-row">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img class="h-12 w-12 rounded-full object-cover mr-3 border p-1" src="{{ $review->user->profile_photo_url }}" alt="{{ $review->user->name }}" />
                    @else
                        <span class="inline-flex rounded-md">
                            {{ $review->user->name }}
                            <svg class="ml-2 -mr-0.5 h-4 w-4 mr-3 border p-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                    <span>
                        <h2>{{ $review->user->name }} on 
                            <a href="{{ route('product',[ $product->product_code]) }}">{{ $product->product_name }}</a>
                            - 
                            @if (strtotime($review->created_at) > time() - 86400)
                                {{ $review->created_at->diffForHumans() }}
                            @else
                                {{ \Carbon\Carbon::parse($review->created_at)->format('d / F / Y') }}
                            @endif
                        </h2>
                    </span>
                
                </div>
                <div class="pl-5 flex flex-row">
                    {!! str_repeat('
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    ', $review->stars) !!}
                    {!! str_repeat('
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    ', 5 - $review->stars) !!}
                    ({{ $review->stars }}) 
                </div>
                <p class="py-2 pl-5">
                    {{ $review->body }}
                </p>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8  bg-white px-5 py-4">
                <hr class="mb-5">
                <div class="mb-5">

                    <h4>Comments:</h4>
                    <comments-list></comments-list>
                </div>
        
                <div>
                    @comments(['model' => $review])
                </div>
            </div>
          
        </div>
     
    </div>

</x-normal_user>    