

<!-- Modal -->
<div class="modal fade" id="edit-sub-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="edit-modalLabel">Sub Category</h5>
            <button type="button" class="btn-close"aria-label="Close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{ route('categories_sub.update') }}" method="POST" id="edit-sub-cat-form">
                    @method('PUT')
                    @csrf
                    <h4> Sub Category information </h4>
                    <div class="mt-10 sm:mt-0">
                        <div class="mt-3 md:mt-0 md:col-span-2">
                            <div class="overflow-hidden ">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class=" col-span-6 sm:col-span-4">
                                            <input type="text" name="sub_category_id" id="edit_sub_sub_category_id"  required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="edit_sub_category_category_name" class="block text-sm font-medium text-gray-700">Category Name*</label>
                                            <input type="text" name="category_name" id="edit_sub_category_category_name" readonly required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="edit_sub_category_sub_category_name" class="block text-sm font-medium text-gray-700">Sub Category name*</label>
                                            <input type="text" name="sub_category_name" id="edit_sub_category_sub_category_name" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
               
                    <div div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
                        <button disabled id="submit-sub-edit" type="submit" class="btn btn-primary">Save Changesss</button>
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
    $('#edit_sub_category_sub_category_name').on('input',function(e){
        $('#submit-sub-edit').removeAttr('disabled');
    });
    // submitting form
    $(document).on("click", "#submit-sub-edit", function() {
        $("#edit-sub-cat-form").submit();
    });
    $(document).ready(function() {
        $(document).on("click", "#edit-item-sub", function() {
            $(this).addClass("edit-item-trigger-clicked"); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            var options = {
                backdrop: "static"
            };
            $("#edit-sub-modal").modal(options);
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var sub_category_id = el.data("item-sub_category_id");
            var sub_category_name = el.data("item-sub_category_name");
            var category_name = el.data("item-category_name");


            $("#edit_sub_sub_category_id").val(sub_category_id);
            $("#edit_sub_category_category_name").val(category_name);
            $("#edit_sub_category_sub_category_name").val(sub_category_name);

            //  alert(category_name);
            
        });
        // on modal hide
        $("#edit-sub-modal").on("hide.bs.modal", function() {
            $(".edit-item-trigger-clicked").removeClass(
                "edit-item-trigger-clicked"
            );
            $("#edit-sub-cat-form").trigger("reset");

            // disabled attr
            $("button#submit-sub-edit").attr("disabled", true);
        });
    });
</script>
@endpush
