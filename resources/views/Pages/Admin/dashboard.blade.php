<x-app-layout>

    <x-slot name="title">
        Dashboard | 
    </x-slot>

    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Dashboard
                </h2>
                <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <p class="greetings">{{ $dayTerm }}, {{ Auth::user()->name }} | {{ \Carbon\Carbon::now()->format('d / F / Y') }}<p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-6 gap-4">

                <div class="col-start-1 col-end-2 px-3 pt-2 bg-white overflow-hidden shadow-md sm:rounded-lg card_border">
                    <p class="title-card">Users</p>
                    <p class="content-card offset-md-1">{{ count($users)  }} users</p>
                </div>
                <div class="col-start-2 col-end-3 px-3 pt-2 bg-white overflow-hidden shadow-md sm:rounded-lg card_border">
                    <p class="title-card">New Users</p>
                    <p class="content-card offset-md-1">{{ $new_users }} created acc.</p>
                </div>
                <div class="col-start-3 col-end-4 px-3 pt-2 bg-white overflow-hidden shadow-md sm:rounded-lg card_border">
                    <p class="title-card">Total Products</p>
                    <p class="content-card offset-md-1">{{ $products_count }}</p>
                </div>
                <div class="col-start-4 col-end-5 px-3 pt-2 bg-white overflow-hidden shadow-md sm:rounded-lg card_border">
                    <p class="title-card">Low stock products</p>
                    <p class="content-card offset-md-1">{{ $products_count_low }}</p>
                </div>
                <div class="col-end-7 col-span-2 px-3 pt-2 bg-white overflow-hidden shadow-md sm:rounded-lg card_border">
                    <p class="title-card">Orders today</p>
                    <p class="content-card offset-md-1">{{ $orders_count_today }}</p>
                </div>


                <div class="col-start-1 col-end-5  py-5 px-3 bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div id="chartContainerVisits" style="height: 300px; width: 100%;"></div>
                </div>
                <div class="col-end-7 col-span-2  py-4 px-3 bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <p class="title-card">Popular Items</p>
                    <div class="popular-items">
                        <ul class="list-decimal list-inside bg-rose-200">

                            @forelse ($popular_items as $popular_item)
                            <li>{{ $popular_item->product->product_name }} - {{ $popular_item->product->product_code }}</li>
                                
                            @empty
                                
                            @endforelse
                            
                        </ul>
                    </div>
                </div>

                <div class="col-start-1 col-end-7 py-5 px-3 bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>

            </div>
        </div>
    </div>

    {{-- Popular Products --}}
    {{-- best sellers --}}
    {{-- Most wishlist product --}}
    {{-- products on sale --}}

    @push('scripts')

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">

    // collections
        var revenue_per_month = {!! json_encode($revenue_per_month->toArray(), JSON_HEX_TAG) !!};

        var page_visits = {!! json_encode($page_visits->toArray(), JSON_HEX_TAG) !!};

        console.log(page_visits);

        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        const d = new Date();

        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,  
                title:{
                    text: "WeShop Revenue by month of "+ monthNames[d.getMonth()]
                },
                axisY: {
                    title: "Revenue in PHP",
                    valueFormatString: "#0,.",
                    suffix: "k",
                    prefix: "₱"
                },
                data: [{
                    type: "splineArea",
                    color: "rgba(54,158,173,.7)",
                    markerSize: 5,
                    xValueFormatString: "YYYY-MM-DD",
                    yValueFormatString: "₱#,##0.##",
                    dataPoints: [

                        @foreach ($revenue_per_month as $revenue)
                            { x: new Date("{{ $revenue->created_at }}"), y: {{ $revenue->price * $revenue->quantity }} },
                        @endforeach

                    ]
                }]
                });

                


                var chart2 = new CanvasJS.Chart("chartContainerVisits", {
                animationEnabled: true,  
                title:{
                    text: "WeShop Web Visits Per Day"
                },
                axisY: {
                    // title: "Revenue in PHP",
                    valueFormatString: "#0.",
                    // prefix: "₱"
                },
                data: [{
                    type: "splineArea",
                    color: "rgba(54,158,173,.7)",
                    markerSize: 5,
                    xValueFormatString: "YYYY-MM-DD",
                    yValueFormatString: "#,##0.##",
                    dataPoints: [
                        @foreach ($page_visits as $page_visit)
                            { x: new Date("{{ $page_visit->day }}"), y: {{ $page_visit->count }} },
                        @endforeach
                    ]
                }]
                });

            chart.render();
            chart2.render();

        }
    </script>
       
    @endpush
</x-app-layout>
