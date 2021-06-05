<x-app-layout>

    <x-slot name="title">
        Sales | 
    </x-slot>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/admin/sales_print.css') }}">
    @endpush

    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Sales Report
              </h2>
            </div>

            <div class=" header-main flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3">
                    <button onclick="window.print()" data-bs-toggle="modal" data-bs-target="#add-modal" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                        <!-- Heroicon name: solid/plus -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Export
                    </button>
                </span>
            </div>

          </div>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-6 gap-4">

                <div class="col-start-1 col-end-7 py-5  px-3  bg-white overflow-hidden shadow-md sm:rounded-lg sales-chart">
                    {{-- datepicker --}}
                    <form method="GET" id="datePicker" class="flex flex-row mb-4 justify-end">
                        <label for="sales_from ">from:</label>
                        <div class="form-group input-group-sm mx-2 ">
                            <input class="form-control " type="date" id="sales_from" value="{{ request()->sales_from }}" name="sales_from" required>
                        </div>
                        <label for="sales_to">to:</label>
                        <div class="form-group input-group-sm  mx-2">
                            <input class="form-control " type="date" id="sales_to" value="{{ request()->sales_to }}" name="sales_to" required>
                        </div>
                        <button type="submit" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        @if (request()->sales_to != null && request()->sales_to != null)
                            <button type="button" class="ml-2 ">
                                <a href="{{ route('sales') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-red-700 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </button>
                        @endif
                    </form>

                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>

                <div class="col-start-1 col-end-3  py-5  px-3 bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div id="chartContainerOrders" style="height: 300px; width: 100%;"></div>
                </div>

                <div class="col-end-7 col-span-4  py-5 px-3 bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div id="chartContainerUser" style="height: 300px; width: 100%;"></div>
                </div>
                

            </div>
        </div>
    </div>
 

    @push('scripts')
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        var order_items = {!! json_encode($order_items->toArray(), JSON_HEX_TAG) !!};
        var order_counts = {!! json_encode($order_counts->toArray(), JSON_HEX_TAG) !!};
        var user_per_week = {!! json_encode($user_per_week->toArray(), JSON_HEX_TAG) !!};


        console.log(user_per_week);
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,  
                title:{
                    text: "WeShop Revenue "
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
                        @foreach ($order_items as $order_item)
                            { x: new Date("{{ $order_item->created_at }}"), y: {{ $order_item->price * $order_item->quantity }} },
                        @endforeach
                    ]
                }]
            });

            var chartVisit = new CanvasJS.Chart("chartContainerOrders", {
                animationEnabled: true,  
                title:{
                    text: "WeShop Order by Week"
                },
                axisY: {
                    // title: "Revenue in PHP",
                    valueFormatString: "#0.",
                },
                data: [{
                    type: "splineArea",
                    color: "rgba(54,158,173,.7)",
                    markerSize: 5,
                    xValueFormatString: "YYYY-MM-DD",
                    yValueFormatString: "#,##0.## order/s",
                    dataPoints: [
                        @foreach ($order_counts as $order_count)
                            { x: new Date("{{ $order_count->day }}"), y: {{ $order_count->order }}},
                        @endforeach
                    ]
                }]
            });

            var chartUser = new CanvasJS.Chart("chartContainerUser", {
                animationEnabled: true,  
                title:{
                    text: "WeShop new users weekly"
                },
                axisY: {
                    // title: "Revenue in PHP",
                    valueFormatString: "#0.",
                },
                data: [{
                    type: "splineArea",
                    color: "rgba(54,158,173,.7)",
                    markerSize: 5,
                    xValueFormatString: "YYYY-MM-DD",
                    yValueFormatString: "#,##0.## users created",
                    dataPoints: [
                        @foreach ($user_per_week as $user)
                            { x: new Date("{{ $user->day }}"), y: {{ $user->users }}},
                        @endforeach
                    ]
                }]
            });

            chart.render();
            chartVisit.render();
            chartUser.render();

        }
    </script>
       
    @endpush


</x-app-layout>
