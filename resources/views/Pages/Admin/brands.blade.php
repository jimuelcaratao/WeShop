<x-app-layout>

    @push('styles')

    @endpush

    @push('scripts')
    {{-- Sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        //delete
        $(".delete-brand").click(function(e) {
            e.preventDefault();
            swal({
                title: "Are you sure to Delete?",
                text: "Once you Deleted, theres no turning back!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(e.target)
                        .closest("form")
                        .submit(); // Post the surrounding form
                    } else {
                        return false;
                    }
            });
        });


    </script>
       
    @endpush


    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Brands
              </h2>
            </div>

            <div class=" flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3">
                    <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                    <!-- Heroicon name: solid/plus -->
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                        Add Brand
                    </button>
                </span>


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
                            ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Brand Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                            </th>
                            <th scope="col-2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Action
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tableRow">

                       @forelse ($brands as $brand)
                            <tr>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $brand->brand_id }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $brand->brand_name }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    @if ($brand->status == 'Active')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $brand->status }}
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ $brand->status }}
                                        </span>
                                    @endif
                                  
                                 
                                </td>


                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <a 
                                            href="#"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#edit-modal"
                                            data-tooltip="tooltip"
                                            data-placement="top"
                                            title="Edit"
                                            data-community="{{ json_encode($brand) }}"
                                            data-item-brand_id="{{ $brand->brand_id }}"
                                            data-item-brand_name="{{ $brand->brand_name }}"
                                            data-item-status="{{ $brand->status }}"
                                            id="edit-item"
                                            class="text-indigo-600 hover:text-indigo-900 mr-5">Edit</a>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                
                                                <form class="delete-brand" action="{{ route('brands.destroy', [$brand->brand_id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                
                                                    <button type="submit"class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                           
                                    </div>
                                </td>
                            </tr>
                       @empty
                            <tr>
                                <td colspan="8" class="pr-4 py-2 whitespace-nowrap text-sm font-medium text-center">
                                    <img class="mx-auto d-block text-center py-4" style="width: 275px" src="{{ asset('images/components/no-products.svg') }}" alt="no products">
                                        Hmmm.. There is no Brands in here yet.
                                </td>
                            </tr>
                       @endforelse

                    </x-slot>
                </x-admin.table>

            </div>
        </div>
    </div>

    <x-admin.brand.add-brand-modal>
    </x-admin.brand.add-brand-modal>

</x-app-layout>
