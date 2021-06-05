
<!-- Modal -->
<div class="modal fade" id="confirm-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="confirm-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirm-modalLabel">Confirm Password</h5>
            <button type="button" class="btn-close close-modal-confirm"aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{ route('user.ban') }}" method="POST" id="confirm-form">
                    @csrf
                    <div class=" sm:mt-0">
                        <div class=" md:mt-0 md:col-span-2">
                            <div class="overflow-hidden ">
                                <div class="px-4 py-5 bg-white sm:p-6">

                                    <div class="grid grid-cols-6 gap-6">

                                        <div class=" col-span-6 sm:col-span-4">
                                            <input type="text" name="id" id="id" required class="hidden mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="password" class="block text-sm font-medium text-gray-700">Password <span class="text-red-600">*</span></label>
                                            <input type="password" name="password" id="password" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
               
                    <div div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal-confirm">Cancel</button>
                        <button id="submit_confirm" type="submit" class="btn btn-primary">Save Changes</button>
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
        $(".close-modal-confirm").click(function(){
            swal({
                title: "Are you sure to close?",
                text: "Have a nice day.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // OnClose
                        $('#confirm-modal').modal('hide');
                    } else {
                        return false;
                    }
            });
        });
    });

    $(document).ready(function() {
        $(document).on("click", ".confirm-password", function() {
            $(this).addClass("edit-item-trigger-clicked"); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            var options = {
                backdrop: "static"
            };
            $("#confirm-modal").modal(options);
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var id = el.data("item-id");
  
            $("#id").val(id);
            
        });
        // on modal hide
        $("#confirm-modal").on("hide.bs.modal", function() {
            $(".edit-item-trigger-clicked").removeClass(
                "edit-item-trigger-clicked"
            );
            $("#confirm-form").trigger("reset");

        
        });
    });
</script>
@endpush
