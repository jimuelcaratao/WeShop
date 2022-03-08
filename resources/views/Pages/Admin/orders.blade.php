<x-app-layout>

    <x-slot name="title">
        Orders |
    </x-slot>

    @push('styles')
    @endpush

    @push('scripts')
        {{-- Sweet alert --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <script type="text/javascript">

        </script>
    @endpush


    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Orders
                </h2>
            </div>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="lg:flex lg:items-center lg:justify-between mb-3">
                <div class="flex-1 min-w-0">
                    {{-- search --}}
                    <form class="flex">
                        <div>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-36  sm:text-sm border-gray-300 rounded-md"
                                    type="search" name="search" placeholder="Search.." aria-label="Search"
                                    value="{{ request()->search }}">
                                <div class="absolute inset-y-0 left-0 flex items-center">
                                    <label for="search_col" class="sr-only">Currency</label>
                                    <select id="search_col" name="search_col"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-6 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                        @if (!empty(request()->search_col))
                                            <option class="bg-gray-200" disabled
                                                selected="{{ request()->search_col }}">{{ request()->search_col }}
                                            </option>
                                        @endif
                                        <option value="">ALL</option>
                                        <option value="Confirm Pending">Confirm Pending</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Packaging">Packaging</option>
                                        <option value="Shipping">Shipping</option>
                                        <option value="Delivering">Delivering</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="Returned">Returned</option>
                                        {{-- <option>Type</option> --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="text-green-600 hover:text-green-800 mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mt-3">
                {{-- Table --}}
                <x-admin.table>
                    <x-slot name="tableColumn">
                        <tr class="border-b-2">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order No.
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Customer
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Payment Method
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Confirmed Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Canceled Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Packaged Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Shipped Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Delivered Date
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Returned Date
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Paid Date
                            </th>
                            <th scope="col-2"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tableRow">
                        @forelse ($orders as $order)
                            <tr>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order->order_no }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order->user->name }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order->payment_method }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        {{ $order->status }}
                                    </span>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order->confirmed }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order->canceled_at }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order->packaged_at }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order->shipped_at }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $order->delivered_at }}
                                    </span>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        {{ $order->returned_at }}
                                    </span>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $order->paid_at }}
                                    </span>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#view-modal"
                                                data-tooltip="tooltip" data-placement="top" title="view"
                                                data-item-order_no="{{ $order->order_no }}"
                                                data-item-name="{{ $order->user->name }}"
                                                data-item-email="{{ $order->user->email }}"
                                                data-item-mobile_no="{{ $order->user->user_address->mobile_no ?? null }}"
                                                data-item-house="{{ $order->user->user_address->house ?? null }}"
                                                data-item-city="{{ $order->user->user_address->city ?? null }}"
                                                data-item-province="{{ $order->user->user_address->province ?? null }}"
                                                data-item-barangay="{{ $order->user->user_address->barangay ?? null }}"
                                                data-item-status="{{ $order->status }}"
                                                data-item-confirmed="{{ $order->confirmed }}"
                                                data-item-packaged_at="{{ $order->packaged_at }}"
                                                data-item-shipped_at="{{ $order->shipped_at }}"
                                                data-item-delivered_at="{{ $order->delivered_at }}"
                                                data-item-returned_at="{{ $order->returned_at }}"
                                                data-item-paid_at="{{ $order->paid_at }}" id="view-order"
                                                class="text-indigo-600 hover:text-indigo-900 mr-5">View</a>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#update-modal"
                                                data-tooltip="tooltip" data-placement="top" title="Update"
                                                data-item-update_order_no="{{ $order->order_no }}"
                                                data-item-update_status="{{ $order->status }}"
                                                data-item-update_packaged_at="{{ $order->packaged_at }}"
                                                data-item-update_shipped_at="{{ $order->shipped_at }}"
                                                data-item-update_delivered_at="{{ $order->delivered_at }}"
                                                data-item-update_created_at="{{ $order->created_at }}"
                                                data-item-update_returned_at="{{ $order->returned_at }}"
                                                data-item-update_paid_at="{{ $order->paid_at }}" id="update-order"
                                                class="text-indigo-600 hover:text-indigo-900 mr-5">Update</a>
                                        </div>

                                    </div>
                                </td>
                            </tr>

                            <tr class="bg-gray-50">
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order Items.
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Code
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Name
                                </th>
                                <th colspan="7"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category
                                </th>

                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantity
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                            </tr>
                            {{-- order products --}}
                            @forelse ($order->order_items as $order_item)
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $order_item->product->product_code }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $order_item->product->product_name }}
                                        </div>
                                    </td>
                                    <td colspan="7" class="px-6 py-2 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $order_item->product->category_name }} /
                                            {{ $order_item->product->sub_category_name }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $order_item->quantity }}</div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">PHP @convert($order_item->price)</div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            {{-- order products total --}}
                            <tr class="bg-gray-50">
                                <td colspan="11" class="text-right px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Total:</div>
                                </td>
                                <td colspan="1" class="px-6 py-2 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        PHP @convert($order->getTotalPrice())
                                    </span>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="11" class="pr-4 py-2 whitespace-nowrap text-sm font-medium text-center">
                                    <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                        src="{{ asset('images/components/no-products.svg') }}" alt="no products">
                                    Hmmm.. There is no orders yet.
                                </td>
                            </tr>
                        @endforelse
                    </x-slot>
                </x-admin.table>

            </div>
        </div>
    </div>


    <x-admin.orders.update-order-modal>
    </x-admin.orders.update-order-modal>

    <x-admin.orders.view-order-modal>
    </x-admin.orders.view-order-modal>

</x-app-layout>
