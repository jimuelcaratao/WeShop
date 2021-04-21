<!-- Modal -->
<div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="add-modalLabel">Add Products</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <div>
                <form action="#" method="POST">

                <h4> Basic information </h4>
                <div class="mt-10 sm:mt-0">
                    <div class="mt-3 md:mt-0 md:col-span-2">
                        <div class="overflow-hidden ">
                            <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="input_category" class="block text-sm font-medium text-gray-700">Category</label>
                                    <select id="input_category" name="input_category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="input_sub_category" class="block text-sm font-medium text-gray-700">Sub Category</label>
                                    <select id="input_sub_category" name="input_sub_category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="input_brand" class="block text-sm font-medium text-gray-700">Brand</label>
                                    <select id="input_brand" name="input_brand" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
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
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="input_product_code" class="block text-sm font-medium text-gray-700">Product code*</label>
                                    <input type="text" name="input_product_code" id="input_product_code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="input_sku" class="block text-sm font-medium text-gray-700">SKU</label>
                                    <input type="text" name="input_sku" id="input_sku"class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                {{-- <div class="col-span-6">
                                    <label for="street_address" class="block text-sm font-medium text-gray-700">Product Name</label>
                                    <input type="text" name="street_address" id="street_address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div> --}}

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="input_product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                    <input type="text" name="input_product_name" id="input_product_name"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-8 sm:col-span-6">
                                    <label for="input_description" class="block text-sm font-medium text-gray-700">
                                        Description
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="input_description" name="input_description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Brief description for your Product. URLs are hyperlinked.
                                    </p>
                                </div>

                                <div class="col-span-8 sm:col-span-6">
                                    <label for="input_specs" class="block text-sm font-medium text-gray-700">
                                        Specs
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="input_specs" name="input_specs" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Brief description for your Product. URLs are hyperlinked.
                                    </p>
                                </div>
                       
                
                             
                
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label for="input_price" class="block text-sm font-medium text-gray-700">Price</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">
                                              $
                                            </span>
                                          </div>
                                          <input type="text" name="input_price" id="input_price" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                         
                                        </div>
                                      </div>
                                </div>
                
                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="input_stock" class="block text-sm font-medium text-gray-700">Stock</label>
                                <input type="text" name="input_stock" id="input_stock" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                        photo 1
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Create</button>
                    </div>
                </form>

            </div>

            
        </div>
       
        </div>
    </div>
</div>

