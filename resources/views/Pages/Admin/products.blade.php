<x-app-layout>

    @push('styles')
    @endpush

    @push('scripts')
    @endpush
    
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Products
              </h2>
            </div>
            <div class=" flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3">
                    <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                    <!-- Heroicon name: solid/plus -->
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add product
                    </button>
                </span>

                <x-admin.add-modal></x-admin.add-modal>
                
            </div>
          </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">

                {{-- Table --}}
                <x-admin.table>

                    <x-slot name="tableColumn">
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            SKU
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Code
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Brand
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                            </th>
                            <th scope="col-2" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Delete</span>
                            </th>
                    </x-slot>

                    <x-slot name="tableRow">

                        @forelse ($products as $product)
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $product->sku }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $product->product_code }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                </div>
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $product->product_name }}
                                </div>
                                </div>
                            </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ \Illuminate\Support\Str::limit($product->description, 20) }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              {{ $product->category_name }} / {{ $product->sub_category_name }}
                            </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $product->brand->brand_name }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                               PHP @convert($product->price)
                            </td>

                            <td colspan="2"  class="pr-4 py-4 mt-2 whitespace-nowrap text-sm font-medium flex justify-between">
                                
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-5">Edit</a>

                                <form action="{{ route('products.destroy', [$product->product_code]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"class="text-red-600 hover:text-red-900">Delete</button>
                                </form>


                            </td>
                        @empty
                            <td colspan="8" class="pr-4 py-4 whitespace-nowrap text-sm font-medium text-center">
                                <img class="mx-auto d-block text-center py-4" style="width: 275px" src="{{ asset('images/components/no-products.svg') }}" alt="no products">
                                    Hmmm.. There is no Products in here.
                            </td>
                        @endforelse
                       

                    </x-slot>
                </x-admin.table>

            </div>
        </div>
    </div>
</x-app-layout>
