<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('img/logo/LogoV2.png') }}">

    <title>{{ $title ?? null }} {{ config('app.name', 'Laravel') }} </title>

    <!-- Styles -->
    @stack('styles')

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">


    @livewireStyles


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/navigation-menu-guest.js') }}" defer></script>
    <script src="{{ asset('js/catalog-sorting.js') }}" defer></script>
    <script src="{{ asset('js/product-reviews.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>

</head>

<body class="font-sans antialiased bg-gray-100">

    @include('sweetalert::alert')

    {{-- Main navbar for normal users --}}
    @include('normal-nav')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->

    <main>
        {{ $slot }}
    </main>
    @include('footer')



    @livewireScripts

    @stack('scripts')


    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 1,
            dots: '.dots',
            draggable: false,
            rewind: true,
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });

        new Glider(document.querySelector('.products'), {
            // Mobile-first defaults
            slidesToShow: 2,
            itemWidth: 150,
            dots: '.dots-products',
            draggable: false,
            arrows: {
                prev: '.glider-prev-products',
                next: '.glider-next-products'
            },
            responsive: [{
                // screens greater than >= 640px
                breakpoint: 640,
                settings: {
                    slidesToShow: '2',
                }
            }, {
                // screens greater than >= 768px
                breakpoint: 768,
                settings: {
                    slidesToShow: '4',
                }
            }]
        });

        new Glider(document.querySelector('.most-viewed'), {
            // Mobile-first defaults
            slidesToShow: 2,
            itemWidth: 150,
            dots: '.dots-most-viewed',
            draggable: false,
            arrows: {
                prev: '.glider-prev-most-viewed',
                next: '.glider-next-most-viewed'
            },
            responsive: [{
                // screens greater than >= 640px
                breakpoint: 640,
                settings: {
                    slidesToShow: '4',
                }
            }]
        });
    </script>

</body>

</html>
