<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <div class="container">
            {{-- mini cards --}}
            <div class="row gap-4 pb-4">
                <div class="col-md-3 bg-white sm:rounded-md shadow-sm py-3">
                    <p class="title-card">Users</p>
                    <p class="content-card mt-2 offset-md-1">10 users</p>
                </div>
                <div class="col-md-3 bg-white sm:rounded-md shadow-sm py-3">
                    <p class="title-card">New Users</p>
                    <p class="content-card mt-2 offset-md-1">10 created acc.</p>
                </div>
                <div class="col-md-3 bg-white sm:rounded-md shadow-sm py-3">
                    <p class="title-card">Revenue for Today</p>
                    <p class="content-card mt-2 offset-md-1">₱01239812</p>
                </div>
                <div class="col-md-2 bg-white sm:rounded-md shadow-sm py-3">
                    <p class="title-card">Orders today</p>
                    <p class="content-card mt-2 offset-md-1">0 orders</p>
                </div>
            </div>

            
            <div class="row gap-5 pb-4">
                {{-- Chart for web visits --}}
                <div class="col-md-6 bg-white sm:rounded-md shadow-sm py-3 mr-2">
                    <div id="chartContainerSales" style="height: 300px; width: 90%;"></div>
                </div>
                
                <div class="col-md-5 bg-white sm:rounded-md shadow-sm py-3">
                    <div id="chartContainerMini" style="height: 300px; width: 90%;"></div>
                </div>
            </div>

            {{-- Sales chart --}}
            <div class="row  ">
                <div class="col-md-12 bg-white sm:rounded-md mb-4 py-4">
                    <div id="chartContainer" style="height: 300px; width: 90%;"></div>
                </div>
            </div>
        </div>
        {{-- Popular Products --}}
        {{-- best sellers --}}
        {{-- Most wishlist product --}}
        {{-- products on sale --}}
</x-app-layout>
