<x-app-layout>

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

    <div class="container">

        {{-- mini cards --}}
        <div class="row gap-4 pb-4">
            <div class="col-md-3 bg-white sm:rounded-md shadow-sm py-3">
                <p class="title-card">Users</p>
                <p class="content-card mt-2 offset-md-1">{{ count($users)  }} users</p>
            </div>
            <div class="col-md-3 bg-white sm:rounded-md shadow-sm py-3">
                <p class="title-card">New Users</p>
                <p class="content-card mt-2 offset-md-1">{{ $new_users }} created acc.</p>
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
                <div id="chartContainerVisits" style="height: 300px; width: 100%;"></div>
            </div>
            
            <div class="col-md-5 bg-white sm:rounded-md shadow-sm py-3">
                <p class="title-card">Popular Items</p>
                <div class="popular-items">
                    <ul class="list-decimal list-inside bg-rose-200">
                        <li>Rakker331 - 131231231</li>
                        <li>Rakker331123 - 131231231</li>
                        <li>Rakker33113 - 131231231</li>
                        <li>Rakker33113 - 131231231</li>
                        <li>Rakker33113 - 131231231</li>
                        <li>Rakker33113 - 131231231</li>
                        <li>Rakker33113 - 131231231</li>
                        <li>Rakker33113 - 131231231</li>
                        <li>Rakker33113 - 131231231</li>
                        <li>Rakker33113 - 131231231</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Sales chart --}}
        <div class="row  ">
            <div class="col-md-12 bg-white sm:rounded-md mb-4 py-4">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
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

        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,  
                title:{
                    text: "WeShop Revenue by Months"
                },
                axisY: {
                    title: "Revenue in PHP",
                    valueFormatString: "#0,,.",
                    suffix: "k",
                    prefix: "₱"
                },
                data: [{
                    type: "splineArea",
                    color: "rgba(54,158,173,.7)",
                    markerSize: 5,
                    xValueFormatString: "YYYY",
                    yValueFormatString: "₱#,##0.##",
                    dataPoints: [
                        { x: new Date(2000, 0), y: 3289000 },
                        { x: new Date(2001, 0), y: 3830000 },
                        { x: new Date(2002, 0), y: 2009000 },
                        { x: new Date(2003, 0), y: 2840000 },
                        { x: new Date(2004, 0), y: 2396000 },
                        { x: new Date(2005, 0), y: 1613000 },
                        { x: new Date(2006, 0), y: 2821000 },
                        { x: new Date(2007, 0), y: 2000000 },
                        { x: new Date(2008, 0), y: 1397000 },
                        { x: new Date(2009, 0), y: 2506000 },
                        { x: new Date(2010, 0), y: 2798000 },
                        { x: new Date(2011, 0), y: 3386000 },
                        { x: new Date(2012, 0), y: 6704000},
                        { x: new Date(2013, 0), y: 6026000 },
                        { x: new Date(2014, 0), y: 2394000 },
                        { x: new Date(2015, 0), y: 1872000 },
                        { x: new Date(2016, 0), y: 2140000 }
                    ]
                }]
                });


                var chart2 = new CanvasJS.Chart("chartContainerVisits", {
                animationEnabled: true,  
                title:{
                    text: "WeShop Web Visits Per Month"
                },
                axisY: {
                    // title: "Revenue in PHP",
                    valueFormatString: "#0,,.",
                    suffix: "k",
                    // prefix: "₱"
                },
                data: [{
                    type: "splineArea",
                    color: "rgba(54,158,173,.7)",
                    markerSize: 5,
                    xValueFormatString: "YYYY",
                    yValueFormatString: "₱#,##0.##",
                    dataPoints: [
                        { x: new Date(2000, 0), y: 3289000 },
                        { x: new Date(2001, 0), y: 3830000 },
                        { x: new Date(2002, 0), y: 2009000 },
                        { x: new Date(2003, 0), y: 2840000 },
                        { x: new Date(2004, 0), y: 2396000 },
                        { x: new Date(2005, 0), y: 1613000 },
                        { x: new Date(2006, 0), y: 2821000 },
                        { x: new Date(2007, 0), y: 2000000 },
                        { x: new Date(2008, 0), y: 1397000 },
                        { x: new Date(2009, 0), y: 2506000 },
                        { x: new Date(2010, 0), y: 2798000 },
                        { x: new Date(2011, 0), y: 3386000 },
                        { x: new Date(2012, 0), y: 6704000},
                        { x: new Date(2013, 0), y: 6026000 },
                        { x: new Date(2014, 0), y: 2394000 },
                        { x: new Date(2015, 0), y: 1872000 },
                        { x: new Date(2016, 0), y: 2140000 }
                    ]
                }]
                });

            chart.render();
            chart2.render();

        }
    </script>
       
    @endpush
</x-app-layout>
