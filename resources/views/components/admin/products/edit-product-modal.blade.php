<!-- Modal -->
<div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="edit-modalLabel">Edit Products</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <div>
                <form action="{{ route('products.update') }}" method="POST" id="edit-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4> Basic information </h4>
                <div class="mt-10 sm:mt-0">
                    <div class="mt-3 md:mt-0 md:col-span-2">
                        <div class="overflow-hidden ">
                            <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="edit_category_name" class="block text-sm font-medium text-gray-700">Category*</label>
                                    <select id="edit_category_name" name="edit_category_name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled value="">Choose...</option>
                                        {{ $categoryOptions }}
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="edit_sub_category_name" class="block text-sm font-medium text-gray-700">Sub Category*</label>
                                    <select id="edit_sub_category_name" name="edit_sub_category_name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                      
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="edit_brand" class="block text-sm font-medium text-gray-700">Brand</label>
                                    <select id="edit_brand" name="edit_brand" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled value="">Choose...</option>
                                        {{ $brandOptions }}
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="edit_product_code" class="block text-sm font-medium text-gray-700">Product code*</label>
                                    <input type="text" name="edit_product_code" id="edit_product_code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="edit_sku" class="block text-sm font-medium text-gray-700">SKU*</label>
                                    <input type="text" name="edit_sku" id="edit_sku"class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="edit_product_name" class="block text-sm font-medium text-gray-700">Product Name*</label>
                                    <input type="text" name="edit_product_name" id="edit_product_name"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-8 sm:col-span-6">
                                    <label for="edit_description" class="block text-sm font-medium text-gray-700">
                                        Description*
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="edit_description" name="edit_description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Brief description for your Product. URLs are hyperlinked.
                                    </p>
                                </div>

                                <div class="col-span-8 sm:col-span-6">
                                    <label for="edit_specs" class="block text-sm font-medium text-gray-700">
                                        Specs*
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="edit_specs" name="edit_specs" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Brief description for your Product. URLs are hyperlinked.
                                    </p>
                                </div>
                       
                
                             
                
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label for="edit_price" class="block text-sm font-medium text-gray-700">Price*</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">
                                              $
                                            </span>
                                          </div>
                                          <input type="text" name="edit_price" id="edit_price" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                         
                                        </div>
                                      </div>
                                </div>
                
                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="edit_stock" class="block text-sm font-medium text-gray-700">Stock*</label>
                                <input type="text" name="edit_stock" id="edit_stock" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                
                             
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
              
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <h4>Media Management</h4>
                    <div class="mt-3 md:mt-0 md:col-span-2">
                        <div class=" sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                        Cover photo
                                        </label>
                                        <div class="mt-1 flex justify-center border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <img id="output" src="" style="width:200px;height:200px;">
                                                <input id="default_photo" name="default_photo" type="file" accept=".jpg,.gif,.png,.jpeg" >

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
                                                <img id="output_edit_photo_1" src="" style="width:200px;height:200px;">
                                                <input type="file" id="photo_1" name="photo_1" accept=".jpg,.gif,.png,.jpeg">
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
                                                <img id="output_edit_photo_2" src="" style="width:200px;height:200px;">
                                                <input type="file" id="photo_2" name="photo_2" accept=".jpg,.gif,.png,.jpeg">
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
                                                <img id="output_edit_photo_3" src="" style="width:200px;height:200px;">
                                                <input type="file" id="photo_3" name="photo_3" accept=".jpg,.gif,.png,.jpeg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                    
                        </div>
                    </div>

                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>

            </div>

            
        </div>
       
        </div>
    </div>
</div>



@push('scripts')

    <script>

        // image preview
        $(document).on("change", "#default_photo", function() {
            document.getElementById('output').src = window.URL.createObjectURL(this.files[0])
        });
        $(document).on("change", "#photo_1", function() {
            document.getElementById('output_edit_photo_1').src = window.URL.createObjectURL(this.files[0])
        });     
        $(document).on("change", "#photo_2", function() {
            document.getElementById('output_edit_photo_2').src = window.URL.createObjectURL(this.files[0])
        });
        $(document).on("change", "#photo_3", function() {
            document.getElementById('output_edit_photo_3').src = window.URL.createObjectURL(this.files[0])
        });

        $(document).ready(function() {
            $(document).on("click", "#edit-item", function() {
                $(this).addClass("edit-item-trigger-clicked"); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
                var options = {
                    backdrop: "static"
                };
                $("#edit-modal").modal(options);
                var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
                var row = el.closest(".data-row");


                // get the data
                var sku = el.data("item-sku");
                var product_name = el.data("item-product_name");
                var product_code = el.data("item-product_code");
                var brand = el.data("item-brand");
                var category = el.data("item-category");
                var sub_category = el.data("item-sub_category");
                var description = el.data("item-description");
                var specs = el.data("item-specs");
                var price = el.data("item-price");
                var stock = el.data("item-stock");
                var default_photo = el.data("item-default_photo");


                // var description = row.children("item-email").text();
                // fill the data in the input fields
                $("#edit_sku").val(sku);
                $("#edit_product_name").val(product_name);
                $("#edit_product_code").val(product_code);
                
                // image preview
                $("img#output").attr('src' , $("img#output").attr('src') + `{{ asset('storage/media/products/main_${product_code}_${default_photo}')}}`);

                $("select#edit_brand option")
                .each(function() { this.selected = (this.text == brand); });

                $("select#edit_category_name option")
                .each(function() { this.selected = (this.text == category); });

     
                $("#edit_description").val(description);
                $("#edit_specs").val(specs);
                $("#edit_price").val(price);
                $("#edit_stock").val(stock);


          

                // fetch edit sub category
                var id = $("select#edit_category_name option").filter(":selected").val();
                // alert(id); 

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
                    
                        // actually select the sub
                        $("select#edit_sub_category_name option")
                        .each(function() { this.selected = (this.text == sub_category); });
                    }
                });

                console.log(product_code);
                // fetching photos
                $.ajax({
                    type: "GET",
                    url: `/fetchProductPhotos?product_code=${product_code}`,
                    success:function(response) {
                        // console.log(response.product_photos);

                        var photos = response.product_photos;

                        if (photos.photo_1 != null) {
                            // image preview
                            $("img#output_edit_photo_1").attr('src' , $("img#output_edit_photo_1").attr('src') + `{{ asset('storage/media/products/${product_code}_photo_1_${photos.photo_1}')}}`);
                        }
                   
                        if (photos.photo_2 != null) {
                            // image preview
                            $("img#output_edit_photo_2").attr('src' , $("img#output_edit_photo_2").attr('src') + `{{ asset('storage/media/products/${product_code}_photo_2_${photos.photo_2}')}}`);
                        }

                        if (photos.photo_3 != null) {
                            // image preview
                            $("img#output_edit_photo_3").attr('src' , $("img#output_edit_photo_3").attr('src') + `{{ asset('storage/media/products/${product_code}_photo_3_${photos.photo_3}')}}`);
                        }
                    }
                });

               
            });
            // on modal hide
            $("#edit-modal").on("hide.bs.modal", function() {
                $(".edit-item-trigger-clicked").removeClass(
                    "edit-item-trigger-clicked"
                );
                $("#edit-form").trigger("reset");


                // image preview reset
                $('#output').attr('src', '');

                $('#output_edit_photo_1').attr('src', '');
                $('#output_edit_photo_2').attr('src', '');
                $('#output_edit_photo_3').attr('src', '');

            });
        });
    </script>

@endpush
