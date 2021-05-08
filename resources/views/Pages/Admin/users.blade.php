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
        $(".delete-user").click(function(e) {
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
                Users
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
                                Social Media
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
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
                        @forelse ($users as $user)
                            <tr>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    @if ($user->is_admin == 1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Admin
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
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
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $user->external_provider }}
                                        </span>
                                    @elseif ($user->external_provider == 'Google')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ $user->external_provider }}
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            None
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Active</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($user->created_at)->format('d / F / Y')}}</div>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <a 
                                            href="#"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#edit-modal-user"
                                            data-tooltip="tooltip"
                                            data-placement="top"
                                            title="Edit"
                                            data-community="{{ json_encode($user) }}"
                                            data-item-id="{{ $user->id }}"
                                            data-item-name="{{ $user->name }}"
                                            data-item-email="{{ $user->email }}"
                                            id="edit-item-user"
                                            class="text-indigo-600 hover:text-indigo-900 mr-5">Edit</a>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                
                                                <form class="delete-user" action="" method="POST">
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
                                        Hmmm.. There is no users in here yet.
                                </td>
                            </tr>
                        @endforelse
      

                    </x-slot>
                </x-admin.table>

            </div>
        </div>
    </div>



</x-app-layout>
