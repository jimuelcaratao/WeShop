<x-app-layout>

    @push('styles')
        {{-- <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet"> --}}

        <!-- Latest compiled and minified CSS -->
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> --}}

    @endpush

    @push('scripts')

    {{-- <script src="{{ asset('js/dropzone.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">

    </script>
       
    @endpush


    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Category
              </h2>
            </div>

            {{-- <x-jet-validation-errors class="mb-4" /> --}}

            <div class=" flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3">
                    <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                    <!-- Heroicon name: solid/plus -->
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Category
                    </button>
                </span>

               
                {{-- @foreach ($subcategories as $cat)
                    <p>{{ $cat->category_name }}</p>

                    @foreach ($cat->sub_categories as $item)
                        <p>{{$item->sub_category_name}}</p>
                    @endforeach
                @endforeach --}}

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
                            Category Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                            </th>
                            <th scope="col-2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Action
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tableRow">

                        @forelse ($categories as $category)
                        <tr>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $category->category_id }}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $category->category_name }}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Main Category
                                </span>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        {{-- src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" --}}
                                        <a 
                                        href="#"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#edit-modal"
                                        data-tooltip="tooltip"
                                        data-placement="top"
                                        title="Edit"
                                        data-community="{{ json_encode($category) }}"
                                        data-item-sku="{{ $category->sku }}"
                                        data-item-category_id="{{ $category->category_id }}"
                                        data-item-category_name="{{ $category->category_name }}"
                                        id="edit-item"
                                        class="text-indigo-600 hover:text-indigo-900 mr-5">Edit</a>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm text-gray-900">
                                            <a 
                                            href="#"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#edit-modal"
                                            data-tooltip="tooltip"
                                            data-placement="top"
                                            title="Edit"
                                            id="edit-item"
                                            class="text-green-600 hover:text-green-900 mr-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                        </tr>

                            @foreach ($category->sub_categories as $item)
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                              </svg>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $item->sub_category_name }}</div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Secondary Category
                                        </span>
                                    </td>

                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                {{-- src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" --}}
                                                <a 
                                                href="#"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#edit-modal"
                                                data-tooltip="tooltip"
                                                data-placement="top"
                                                title="Edit"
                                            
                                                id="edit-item"
                                                class="text-indigo-600 hover:text-indigo-900 mr-5">Edit</a>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('DELETE')
        
                                                        <button type="submit"class="text-red-600 hover:text-red-900">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                               
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        @empty
                        <tr>
                            <td colspan="8" class="pr-4 py-2 whitespace-nowrap text-sm font-medium text-center">
                                <img class="mx-auto d-block text-center py-4" style="width: 275px" src="{{ asset('images/components/no-products.svg') }}" alt="no products">
                                    Hmmm.. There is no Category in here.
                            </td>
                        </tr>
                        @endforelse
                       

                    </x-slot>
                </x-admin.table>

              

            </div>
        </div>
    </div>





</x-app-layout>
