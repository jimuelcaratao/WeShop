

<!-- Modal -->
<div class="modal fade" id="add-sub-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="add-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="add-modalLabel">Sub Category</h5>
            <button type="button" class="btn-close closeSubModalClick"aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{ route('sub_cat.store') }}" method="POST" id="add-sub-form">
                    @csrf
                    <h4> Sub Category information </h4>
                    <div class="mt-10 sm:mt-0">
                        <div class="mt-3 md:mt-0 md:col-span-2">
                            <div class="overflow-hidden ">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class=" col-span-6 sm:col-span-4">
                                            <input type="text" name="category_id" id="category_category_id"  required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="category_category_name" class="block text-sm font-medium text-gray-700">Category Name*</label>
                                            <input type="text" name="category_name" id="category_category_name" readonly required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="category_sub_category_name" class="block text-sm font-medium text-gray-700">Sub Category name*</label>
                                            <input type="text" name="sub_category_name" id="category_sub_category_name" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
               
                    <div div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeSubModalClick">Cancel</button>
                        <button disabled id="submit_sub_category" type="submit" class="btn btn-primary">Create</button>
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
        $(".closeSubModalClick").click(function(){
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
                        $('#add-sub-modal').modal('hide');
                        $("#add-sub-form").trigger("reset");

                        $('#submit_sub_category').attr('disabled', 'disabled');
                    } else {
                        return false;
                    }
            });
        });
    });

    $(document).ready(function() {
        $(document).on("click", "#add-item-sub", function() {
            $(this).addClass("add-item-trigger-clicked"); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            var options = {
                backdrop: "static"
            };
            $("#add-sub-modal").modal(options);
            var el = $(".add-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var category_name = el.data("item-category_name");
            var category_id = el.data("item-category_id");


            $("#category_category_name").val(category_name);
            $("#category_category_id").val(category_id);

            // alert(category_name);
            
        });
        // on modal hide
        $("#add-sub-modal").on("hide.bs.modal", function() {
            $(".add-item-trigger-clicked").removeClass(
                "add-item-trigger-clicked"
            );
            $("#add-sub-form").trigger("reset");

        });
    });
</script>
@endpush
