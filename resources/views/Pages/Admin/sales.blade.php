<x-app-layout>

    @push('styles')

    @endpush

  


    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Sales
              </h2>
            </div>

            <div class=" flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3">
                    <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
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

                <div class="col-start-1 col-end-7 py-5 px-3 bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>

                <div class="col-start-1 col-end-3  py-5 px-3 bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div id="chartContainerVisits" style="height: 300px; width: 100%;"></div>
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

            var chartVisit = new CanvasJS.Chart("chartContainerVisits", {
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

            var chartUser = new CanvasJS.Chart("chartContainerUser", {
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

            chart.render();
            chartVisit.render();
            chartUser.render();

        }
    </script>
       
    @endpush


</x-app-layout>
