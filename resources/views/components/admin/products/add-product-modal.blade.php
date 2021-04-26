

<!-- Modal -->
<div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="add-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="add-modalLabel">Add Products</h5>
            <button type="button" class="btn-close closeModalClick"aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <div>
                <form action="{{ route('products.store') }}" method="POST" id="add-form" enctype="multipart/form-data">
                @csrf
                <h4> Basic information </h4>
                <div class="mt-10 sm:mt-0">
                    <div class="mt-3 md:mt-0 md:col-span-2">
                        <div class="overflow-hidden ">
                            <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="category_name" class="block text-sm font-medium text-gray-700">Category*</label>
                                    <select id="category_name" name="category_name" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled value="">Choose...</option>
                                        {{ $categoryOptions }}
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="sub_category_name" id="sub_category_name_label" class="block text-sm font-medium text-gray-700">Sub Category*</label>
                                    <select id="sub_category_name" name="sub_category_name" required disabled class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        {{-- <option selected disabled value="">Choose...</option> --}}
                                        {{-- {{ $subCategoryOptions }} --}}
                                    </select>
                                </div>

                                <div class="form-basic col-span-6 sm:col-span-4">
                                    <label for="brand_id" class="block text-sm font-medium text-gray-700">Brand*</label>
                                    <select id="brand_id" name="brand_id" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled value="">Choose...</option>
                                        {{ $brandOptions }}
                                    </select>
                                </div>

                                {{-- <div class="col-span-6 sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Product code*</label>
                                <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                
                                <div class="col-span-6 sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">SKU</label>
                                <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div> --}}
                                <div class="form-basic col-span-6 sm:col-span-4">
                                    <label for="product_code" class="block text-sm font-medium text-gray-700">Product code*</label>
                                    <input type="text" name="product_code" id="product_code" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="form-basic col-span-6 sm:col-span-4">
                                    <label for="sku" class="block text-sm font-medium text-gray-700">SKU*</label>
                                    <input type="text" name="sku" id="sku" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                {{-- <div class="col-span-6">
                                    <label for="street_address" class="block text-sm font-medium text-gray-700">Product Name</label>
                                    <input type="text" name="street_address" id="street_address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div> --}}

                                <div class="form-basic col-span-6 sm:col-span-4">
                                    <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name*</label>
                                    <input type="text" name="product_name" id="product_name" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="form-basic col-span-8 sm:col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">
                                        Description*
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Brief description for your Product. URLs are hyperlinked.
                                    </p>
                                </div>

                                <div class="form-basic col-span-8 sm:col-span-6">
                                    <label for="specs" class="block text-sm font-medium text-gray-700">
                                        Specs*
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="specs" name="specs" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Brief description for your Product. URLs are hyperlinked.
                                    </p>
                                </div>
                       
                
                             
                
                                <div class="form-basic col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label for="price" class="block text-sm font-medium text-gray-700">Price*</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">
                                              $
                                            </span>
                                          </div>
                                          <input type="text" name="price" id="price" required class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                         
                                        </div>
                                      </div>
                                </div>
                
                                <div class="form-basic col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock*</label>
                                    <input type="text" name="stock" id="stock" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                
                             
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
              
                <div class="form-basic hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <h4 class="form-basic">Media Management</h4>
                    <div class="form-basic mt-3 md:mt-0 md:col-span-2">
                        <div class=" sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                        Cover photo*
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <input type="file" id="default_photo" name="default_photo" accept=".jpg,.gif,.png,.jpeg" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                        photo 1 (optional)
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                        photo 2
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                        photo 3
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                        photo 4
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 py-4 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class=" text-center">
                                                Upload a Photo
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                    
                        </div>
                    </div>

                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModalClick">Cancel</button>
                        <button disabled id="submit_product" type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>

            </div>

            
        </div>
       
        </div>
    </div>
</div>

@push('scripts')


    <script>
         $(document).ready(function() {
            $(".closeModalClick").click(function(){
                swal({
                        title: "Are you sure?",
                        text: "Once you Discard, theres no turning back!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                // OnClose
                                $('#add-modal').modal('hide');
                                $("#add-form").trigger("reset");

                                $('#sub_category_name').prop('selectedIndex',0);
                                $('#sub_category_name').attr('disabled', 'disabled');

                                // sub category display
                                $('#sub_category_name_label').hide();
                                $('#sub_category_name').hide();

                                // form category display 
                                $('.form-basic').hide();

                                $('#submit_product').attr('disabled', 'disabled');
                            } else {
                                return false;
                            }
                    });
            });

            // $('#add-modal').on("hide.bs.modal", function (e) {
                  
            //     if(confirm("Are you sure, you want to Discard this?")){ 
            //         $("#add-form").trigger("reset");

            //         $('#sub_category_name').prop('selectedIndex',0);
            //         $('#sub_category_name').attr('disabled', 'disabled');

            //         // sub category display
            //         $('#sub_category_name_label').hide();
            //         $('#sub_category_name').hide();

            //         // form category display 
            //         $('.form-basic').hide();

            //         $('#submit_product').attr('disabled', 'disabled');
            //         return true;
            //     }
            //     else{ 
            //         return false;
            //     }
            // });
            
            // // on modal hide
            // $("#add-modal").on("hide.bs.modal", function() {
                
            //     $("#add-form").trigger("reset");


            //     $('#sub_category_name').prop('selectedIndex',0);
            //     $('#sub_category_name').attr('disabled', 'disabled');

            //     // sub category display
            //     $('#sub_category_name_label').hide();
            //     $('#sub_category_name').hide();

            //     // form category display 
            //     $('.form-basic').hide();

            //     $('#submit_product').attr('disabled', 'disabled');
            // });

          
        });
    </script>

@endpush
