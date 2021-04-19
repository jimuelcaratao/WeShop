<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">


        @livewireStyles
        

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="{{ asset('js/admin/admin.js') }}" defer></script>
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        
        @include('sweetalert::alert')

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            {{-- main navbar for admin --}}
            @livewire('navigation-menu')
      
            @if (isset($header))
                <header class="bg-white shadow" id="pageHeader">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <div id="pageContent">
            <!-- Page Heading -->
                {{ $slot }}
            </div>
            
        </div>

        @stack('modals')

        @livewireScripts
        @stack('scripts')
    </body>
</html>
