<div class="h-full md:h-screen w-screen bg-main p-4 flex flex-col md:flex-row justify-around md:items-center text-gray-100">
    <div class="flex flex-col p-4 place-self-start">
        <h1 class="text-3xl font-bold mb-4 uppercase">contact us</h1>
        <p>+ 44 123 456 789</p>
        <p>weshop.computers@gmail.com</p>
        <p>Find a store</p>
    </div>
    <div class="flex flex-col p-4 place-self-start">
        <h1 class="text-3xl font-bold mb-4 uppercase">pre build</h1>
        <x-jet-nav-link href="{{ route('catalog.collection',['pre-build' ,'gaming']) }}">Gaming pre build</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['pre-build' ,'office']) }}">Office pre build</x-jet-nav-link>
    </div>
    <div class="flex flex-col p-4 place-self-start">
        <h1 class="text-3xl font-bold mb-4 uppercase">peripherals</h1>
        <x-jet-nav-link href="{{ route('catalog.collection',['peripherals' ,'mouse']) }}">Mouse</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['peripherals' ,'keyboard']) }}">Keyboard</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['peripherals' ,'headphones']) }}">Headphone</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['peripherals' ,'headset']) }}">Headset</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['peripherals' ,'speakers']) }}">Speakers</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['peripherals' ,'earphones']) }}">Earphones</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['peripherals' ,'monitor']) }}">Monitor</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['peripherals' ,'avr']) }}">AVR</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['peripherals' ,'mousepad']) }}">Mouse pad</x-jet-nav-link>
    </div>
     <div class="flex flex-col p-4 place-self-start">
        <h1 class="text-3xl font-bold mb-4 uppercase">components</h1>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'motherboard']) }}">Motherboard</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'pc case']) }}">PC case</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'processor']) }}">Processor</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'cpu cooling']) }}">CPU cooling</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'memory']) }}">Memory</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'graphics card']) }}">Graphics card</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'hard disk']) }}">Hard Disk</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'solid state drive']) }}">Solid State Drive</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'power supply']) }}">Power supply</x-jet-nav-link>
        <x-jet-nav-link href="{{ route('catalog.collection',['components' ,'chassis fan']) }}">Chassis fan</x-jet-nav-link>
    </div>
    <div class="flex flex-col p-4 place-self-center md:place-self-start">
        <img src="{{ asset('img/logo/LogoV2.png') }}" class="h-50 w-60 block mx-auto" alt="Site's logo">
    </div>
</div>