

<!-- Modal -->
<div class="modal fade" id="edit-modal-category" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="add-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="add-modalLabel">Edit Category</h5>
            <button type="button" class="btn-close"aria-label="Close"  data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{ route('categories.update') }}" method="POST" id="edit-cat-form">
                    @method('PUT')
                    @csrf
                    <h4> Category information </h4>
                    <div class="mt-10 sm:mt-0">
                        <div class="mt-3 md:mt-0 md:col-span-2">
                            <div class="overflow-hidden ">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="edit_category_id" class="block text-sm font-medium text-gray-700">Category ID <span class="text-red-600">*</span></label>
                                            <input type="text" name="category_id" id="edit_category_id" readonly required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="edit_category_name" class="block text-sm font-medium text-gray-700">Category name <span class="text-red-600">*</span></label>
                                            <input type="text" name="category_name" id="edit_category_name" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
               
                    <div div class="modal-footer">
                        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancel</button>
                        <button disabled id="edit_submit_category" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>

            </div>

            
        </div>
       
        </div>
    </div>
</div>

@push('scripts')

<script>
    // if category not null
    $('#edit_category_name').on('input',function(e){
        $('#edit_submit_category').removeAttr('disabled');
    });
     $(document).ready(function() {
        $(document).on("click", "#edit-item-category", function() {
            $(this).addClass("edit-item-trigger-clicked"); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            var options = {
                backdrop: "static"
            };
            $("#edit-modal-category").modal(options);
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var category_name = el.data("item-category_name");
            var category_id = el.data("item-category_id");


            $("#edit_category_name").val(category_name);
            $("#edit_category_id").val(category_id);

            // alert(category_name);
            
        });
        // on modal hide
        $("#edit-modal-category").on("hide.bs.modal", function() {
            $(".edit-item-trigger-clicked").removeClass(
                "edit-item-trigger-clicked"
            );
            $("#edit-cat-form").trigger("reset");

            // disabled attr
            $("button#edit_submit_category").attr("disabled", true);
        });
    });
</script>
@endpush
