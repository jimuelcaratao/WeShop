<x-app-layout>

    @push('styles')

    @endpush

    @push('scripts')
    {{-- Sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">

    </script>
       
    @endpush


    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Sales
              </h2>
            </div>

          </div>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">

                {{-- Table --}}
                <x-admin.table>

                    <x-slot name="tableColumn">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                TYPE
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Full name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date Created
                            </th>
                            <th scope="col-2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Action
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tableRow">

                    </x-slot>
                </x-admin.table>

            </div>
        </div>
    </div>



</x-app-layout>
