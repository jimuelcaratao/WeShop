<x-app-layout>

    <x-slot name="title">
        Users |
    </x-slot>

    @push('styles')
    @endpush

    @push('scripts')
        {{-- Sweet alert --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <!-- Development -->
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

        <script type="text/javascript">
            tippy('#info', {
                content: 'You cannot ban admins!',
            });

            //delete
            $(".ban-user").click(function(e) {
                e.preventDefault();
                swal({
                        title: "Are you sure?",
                        text: "Don't worry you can unban and ban anyone if your admin",
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
                    Users
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
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-20  sm:text-sm border-gray-300 rounded-md"
                                    type="search" name="search" placeholder="Search.." aria-label="Search"
                                    value="{{ request()->search }}">
                                <div class="absolute inset-y-0 left-0 flex items-center">
                                    <label for="search_col" class="sr-only">Currency</label>
                                    <select id="search_col" name="search_col"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                        @if (!empty(request()->search_col))
                                            <option class="bg-gray-200" disabled
                                                selected="{{ request()->search_col }}">{{ request()->search_col }}
                                            </option>
                                        @endif
                                        <option value="Name">Name</option>
                                        <option value="Email">Email</option>
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


            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">

                {{-- Table --}}
                <x-admin.table>

                    <x-slot name="tableColumn">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                TYPE
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Full name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Social Media
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Banned Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date Created
                            </th>
                            <th scope="col-2"
                                class="flex flex-row px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                                <svg id="info" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Please configure your password first. Ignore this if you're finish."
                                    xmlns="http://www.w3.org/2000/svg" class="cursor-pointer ml-3 h-4 w-4" fill="none"
                                    viewBox="0 0 24  24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tableRow">
                        @forelse ($users as $user)
                            <tr>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    @if ($user->is_admin == 1)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Admin
                                        </span>
                                    @else
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            Normal
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->name }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    @if ($user->external_provider == 'Facebook')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $user->external_provider }}
                                        </span>
                                    @elseif ($user->external_provider == 'Google')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ $user->external_provider }}
                                        </span>
                                    @else
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            None
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Active</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->is_banned }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d / F / Y') }}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="flex items-center">

                                        {{-- <div class="flex-shrink-0">
                                            <a 
                                            href="#"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#edit-modal-user"
                                            data-community="{{ json_encode($user) }}"
                                            data-item-id="{{ $user->id }}"
                                            data-item-name="{{ $user->name }}"
                                            data-item-email="{{ $user->email }}"
                                            id="edit-item-user"
                                            class="text-indigo-600 no-underline hover:text-indigo-900 mr-5">View</a>
                                        </div> --}}

                                        {{-- banned --}}
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">

                                                @if ($user->is_admin == false)
                                                    @if ($user->is_banned != null)
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#confirm-modal"
                                                            data-item-id="{{ $user->id }}" id=""
                                                            class="confirm-password text-red-600 no-underline hover:text-red-900 mr-5">Unbanned</a>
                                                    @endif

                                                    @empty($user->is_banned)
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                                            data-item-id="{{ $user->id }}" id=""
                                                            class="confirm-password text-red-600 no-underline hover:text-red-900 mr-5">Ban</a>
                                                    @endempty
                                                @endif


                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="pr-4 py-2 whitespace-nowrap text-sm font-medium text-center">
                                    <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                        src="{{ asset('images/components/no-products.svg') }}" alt="no products">
                                    Hmmm.. There is no users in here yet.
                                </td>
                            </tr>
                        @endforelse


                    </x-slot>
                </x-admin.table>

            </div>
        </div>
    </div>

    <x-admin.user.confirm-password-modal>
    </x-admin.user.confirm-password-modal>

</x-app-layout>
