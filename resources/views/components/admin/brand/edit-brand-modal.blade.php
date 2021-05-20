

<!-- Modal -->
<div class="modal fade" id="edit-modal-brand" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="add-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="add-modalLabel">Edit Brand</h5>
            <button type="button" class="btn-close"aria-label="Close"  data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{ route('brands.update') }}" method="POST" id="edit-cat-form">
                    @method('PUT')
                    @csrf
                    <h4> brand information </h4>
                    <div class="mt-10 sm:mt-0">
                        <div class="mt-3 md:mt-0 md:col-span-2">
                            <div class="overflow-hidden ">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="edit_brand_id" class="block text-sm font-medium text-gray-700">brand ID <span class="text-red-600">*</span></label>
                                            <input type="text" name="brand_id" id="edit_brand_id" readonly required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="edit_brand_name" class="block text-sm font-medium text-gray-700">brand name <span class="text-red-600">*</span></label>
                                            <input type="text" name="brand_name" id="edit_brand_name" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="edit_status" class="block text-sm font-medium text-gray-700">Brand Status <span class="text-red-600">*</span></label>
                                            <select id="edit_status" name="status" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option selected disabled value="">Choose...</option>
                                                <option>Active</option>
                                                <option>Not Active</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
               
                    <div div class="modal-footer">
                        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancel</button>
                        <button disabled id="edit_submit_brand" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>

            </div>

            
        </div>
       
        </div>
    </div>
</div>

@push('scripts')

<script>
    // if brand not null
    $('#edit_brand_name').on('input',function(e){
        $('#edit_submit_brand').removeAttr('disabled');
    });
    $('#edit_status').on('input',function(e){
        $('#edit_submit_brand').removeAttr('disabled');
    });
     $(document).ready(function() {
        $(document).on("click", "#edit-item-brand", function() {
            $(this).addClass("edit-item-trigger-clicked"); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            var options = {
                backdrop: "static"
            };
            $("#edit-modal-brand").modal(options);
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var brand_name = el.data("item-brand_name");
            var brand_id = el.data("item-brand_id");
            var status = el.data("item-status");



            $("#edit_brand_name").val(brand_name);
            $("#edit_brand_id").val(brand_id);
            $("#edit_status").val(status);

            // alert(brand_name);
            
        });
        // on modal hide
        $("#edit-modal-brand").on("hide.bs.modal", function() {
            $(".edit-item-trigger-clicked").removeClass(
                "edit-item-trigger-clicked"
            );
            $("#edit-cat-form").trigger("reset");

            // disabled attr
            $("button#edit_submit_brand").attr("disabled", true);
        });
    });
</script>
@endpush
