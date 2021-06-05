<x-app-layout>

    <x-slot name="title">
        Products | 
    </x-slot>


    @push('styles')

    @endpush

    @push('scripts')
    {{-- Sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/autosize.min.js') }}"></script>

    <script type="text/javascript">

        //delete
        $(".delete-product").click(function(e) {
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

        // Fetch Add Sub Categories
        $('#category_name').change(function () {
            var id = $(this).find(':selected')[0].value;
            // alert(id); 

            $.ajax({
                type: "GET",
                url: `/fetchcat?Id=${id}`,
                success: function(response) {
                    console.log(response.data);
                    let htmls = "";
                    x = null;

                    $("#sub_category_name").html(null);

                    $("#sub_category_name").append(
                        `<option selected disabled value="">Choose...</option>`
                    );
                    response.data.map(x => {
                        var sub_category_name = x.sub_category_name;
                        // console.log(photo_id);
                        $("#sub_category_name").append(
                            `<option>${sub_category_name}</option>`
                        );
                    });
                  
                    $('#sub_category_name').removeAttr('disabled');

                    // sub category display
                    $('#sub_category_name_label').show();
                    $('#sub_category_name').show();

                }
            });
        });

          // Fetch Search Sub Categories
          $('#searchCategory').change(function () {
            var id = $(this).find(':selected')[0].value;
            // alert(id); 

            $.ajax({
                type: "GET",
                url: `/fetchcat?Id=${id}`,
                success: function(response) {
                    console.log(response.data);
                    let htmls = "";
                    x = null;

                    $("#searchSubCategory").html(null);

                    $("#searchSubCategory").append(
                        `<option selected disabled value="">Choose...</option>`
                    );
                    response.data.map(x => {
                        var sub_category_name = x.sub_category_name;
                        // console.log(photo_id);
                        $("#searchSubCategory").append(
                            `<option>${sub_category_name}</option>`
                        );
                    });
                  
                    $('#searchSubCategory').removeAttr('disabled');

                    // sub category display
                    $('#searchSubCategoryLabel').show();
                    $('#searchSubCategory').show();

                }
            });
        });

        $('#edit-modal').on('show.bs.modal', function (e) {
           
        })
        $('#edit_category_name').change(function () {
            var id = $("#edit_category_name").find(':selected')[0].value;
           
            $.ajax({
                type: "GET",
                url: `/fetchcat?Id=${id}`,
                success: function(response) {
                    console.log(response.data);
                    let htmls = "";
                    x = null;

                    $("#edit_sub_category_name").html(null);

                    $("#edit_sub_category_name").append(
                        `<option selected disabled value="">Choose...</option>`
                    );
                    response.data.map(x => {
                        var sub_category_name = x.sub_category_name;
                        // console.log(photo_id);
                        $("#edit_sub_category_name").append(
                            `<option>${sub_category_name}</option>`
                        );
                    });
                }
            });
        });

        // display shop form
        $('#sub_category_name').change(function () {
            var id = $(this).find(':selected')[0].value;
            // alert(id); 
            $('.form-basic').show();

            $('#submit_product').removeAttr('disabled');
        });

    </script>
       
    @endpush


    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Products
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
                    Add product
                    </button>
                </span>
            </div>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="lg:flex lg:items-center lg:justify-between mb-3">
                <div class="flex-1 min-w-0">
                    {{-- search --}}
                    <div class="flex">
                        <form >
                            <input class="focus:ring-indigo-500 focus:border-indigo-500  sm:text-sm border-gray-300 rounded-md" type="search" name="search" placeholder="Search.." aria-label="Search" value="{{ request()->search }}">
                            
                            <button type="submit" class="text-green-600 hover:text-green-800 mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            {{-- advance search --}}
                                {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#search-modal" title="Advance search">
                                    advance search
                                </button> --}}

                            <button type="button" data-bs-toggle="modal" data-bs-target="#search-modal" title="Advance search" class="mr-3 mt-2 bg-green-500 w-6 h-6 p-2 text-sm font-bold tracking-wider text-white rounded-full hover:bg-green-600 inline-flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
                            </button>

                            {{-- search labels --}}
                            @if (!empty(request()->advanceSearch))
                                <span class="px-2 inline-flex text-center text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    word: {{ request()->advanceSearch }}
                                </span> 
                            @endif

                            @if (!empty(request()->searchCategory))
                                <span class="px-2 inline-flex text-center text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    category: {{ $categories_search  }}
                                </span> 
                            @endif

                            @if (!empty(request()->searchSubCategory))
                                <span class="px-2 inline-flex text-center text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Sub category: {{ $sub_categories_search  }}
                                </span> 
                            @endif
                        
                            @if (!empty(request()->searchBrand))
                                <span class="px-2 inline-flex text-center text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    brand: {{ $brands_search  }}
                                </span> 
                            @endif

                        </form>

                        @if ( !empty(request()->advanceSearch) || !empty(request()->searchCategory) || !empty(request()->searchSubCategory) || !empty(request()->searchBrand ))
                            <form class="flex" action="{{ route('products') }}">
                                <button type="submit" class="ml-3 mr-3 text-sm font-bold tracking-wider text-red-600 hover:text-red-800 inline-flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>


            
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">

                
                {{-- Table --}}
                <x-admin.table>

                    <x-slot name="tableColumn">
                        <tr>
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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Discounted Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stock
                            </th>
                            <th scope="col-2" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                    </x-slot>

                    <x-slot name="tableRow">

                        @forelse ($products as $product)
                        <tr>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $product->sku }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $product->product_code }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    {{-- src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" --}}
                                <img class="h-10 w-10 rounded-full" src="{{ asset('storage/media/products/main_'.$product->product_code.'_'.$product->default_photo) }}" alt="">
                                </div>
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $product->product_name }}
                                </div>
                                </div>
                            </div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ \Illuminate\Support\Str::limit($product->description, 20) }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              {{ $product->category_name }} / {{ $product->sub_category_name }}
                            </span>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                {{ $product->brand->brand_name }}
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                               PHP @convert($product->product_price->price)
                            </td>

                            @if ($product->product_price->discounted_price != null)
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    PHP @convert($product->product_price->discounted_price)
                                    @if ($product->product_price->discount_type == 'Money')
                                        ( {{ $product->product_price->discount_price }}₱ )
                                    @else
                                        ( {{ $product->product_price->discount_price }}% )
                                    @endif
                                </td>
                            @else
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    No sale
                                </td>
                            @endif
                            

                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">

                                @if ($product->stock <= 10)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        {{ $product->stock }}
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $product->stock }}
                                    </span>
                                @endif
                             </td>

                            <td colspan="2"  class="pr-4 py-2 mt-2 whitespace-nowrap text-sm font-medium flex justify-between">
                                
                                <a 
                                href="#"
                                data-bs-toggle="modal" 
                                data-bs-target="#edit-modal"
                                data-tooltip="tooltip"
                                data-placement="top"
                                title="Edit"
                                data-community="{{ json_encode($product) }}"
                                data-item-sku="{{ $product->sku }}"
                                data-item-product_code="{{ $product->product_code }}"
                                data-item-product_name="{{ $product->product_name }}"
                                data-item-description="{{ $product->description }}"
                                data-item-category="{{ $product->category_name }}"
                                data-item-sub_category="{{ $product->sub_category_name }}"
                                data-item-brand="{{ $product->brand->brand_name }}"
                                data-item-description="{{ $product->description }}"
                                data-item-specs="{{ $product->specs }}"
                                data-item-price="{{ $product->product_price->price }}"
                                data-item-discount_type="{{ $product->product_price->discount_type }}"
                                data-item-discount_price="{{ $product->product_price->discount_price }}"
                                data-item-stock="{{ $product->stock }}"
                                data-item-default_photo="{{ $product->default_photo }}"
                                id="edit-item"
                                class="text-indigo-600 hover:text-indigo-900 mr-5">Edit</a>

                                <form class="delete-product" action="{{ route('products.destroy', [$product->product_code]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="8" class="pr-4 py-2 whitespace-nowrap text-sm font-medium text-center">
                                <img class="mx-auto d-block text-center py-4" style="width: 275px" src="{{ asset('images/components/no-products.svg') }}" alt="no products">
                                    Hmmm.. There is no Products in here.
                            </td>
                        </tr>
                        @endforelse
                       

                    </x-slot>
                </x-admin.table>

              

            </div>
        </div>
    </div>



    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center" >
          {{-- pagination --}}
          <div class="pagination">
            {{ $products->render("pagination::bootstrap-4") }}
          </div>
        </div>
    </div>


    {{-- Modals --}}

    <x-admin.products.add-product-modal>
        <x-slot name="categoryOptions">
            @foreach ($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
        </x-slot>

        <x-slot name="brandOptions">
            @foreach ($brands as $brand)
                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
            @endforeach
        </x-slot>

    </x-admin.products.add-product-modal>
    
    <x-admin.products.edit-product-modal>
        <x-slot name="categoryOptions">
            @foreach ($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
        </x-slot>

        <x-slot name="brandOptions">
            @foreach ($brands as $brand)
                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
            @endforeach
        </x-slot>
    </x-admin.products.edit-product-modal>


    <x-admin.products.search-modal>
        <x-slot name="categoryOptions">
            @foreach ($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
        </x-slot>

        <x-slot name="brandOptions">
            @foreach ($brands as $brand)
                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
            @endforeach
        </x-slot>
    </x-admin.products.search-modal>

</x-app-layout>
