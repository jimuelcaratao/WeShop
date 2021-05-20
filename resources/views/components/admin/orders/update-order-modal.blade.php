
<!-- Modal -->
<div class="modal fade" id="update-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="update-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="update-modalLabel">Update Order Status</h5>
            <button type="button" class="btn-close close-modal-update"aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{ route('order_status') }}" method="POST" id="update-form">
                    @csrf
                    <div class=" sm:mt-0">
                        <div class=" md:mt-0 md:col-span-2">
                            <div class="overflow-hidden ">
                                <div class="px-4 py-5 bg-white sm:p-6">

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="update_order_no" class="block text-sm font-medium text-gray-700">Order No. <span class="text-red-600">*</span></label>
                                            <input type="text" name="order_no" id="update_order_no" readonly required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                    <hr class="mt-5 text-gray-500">

                                    <h4 class="py-3">Status</h4>
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class=" col-span-6 sm:col-span-4">
                                            <div class="form-check form-switch">
                                                <input class="switches form-check-input" type="checkbox" name="packaged_switch"  id="packaged_switch">
                                                <label class="form-check-label" for="packaged_switch">Packaged</label>
                                            </div>
                                        </div>
                                        <div class=" col-span-6 sm:col-span-4">
                                            <div class="form-check form-switch">
                                                <input class="switches form-check-input" type="checkbox" name="shipped_switch"  id="shipped_switch">
                                                <label class="form-check-label" for="shipped_switch">Shipped</label>
                                            </div>
                                        </div>
                                        <div class=" col-span-6 sm:col-span-4">
                                            <div class="form-check form-switch">
                                                <input class="switches form-check-input" type="checkbox" name="delivered_switch" id="delivered_switch">
                                                <label class="form-check-label" for="delivered_switch">Delivered</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
               
                    <div div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal-update">Cancel</button>
                        <button id="submit_update" type="submit" class="btn btn-primary">Save Changes</button>
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
        $(".close-modal-update").click(function(){
            swal({
                title: "Are you sure?",
                text: "Your updates will not saved.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // OnClose
                        $('#update-modal').modal('hide');
                        $("#update-form").trigger("reset");

                        // $('#submit_update').attr('disabled', 'disabled');
                    } else {
                        return false;
                    }
            });
        });
    });

    //  switches
    $(document).ready(function() {
        $('#packaged_switch').change(function() {
            if(this.checked) {
                var returnVal = confirm("Are you sure?");
                $(this).prop("checked",returnVal);
            }
            else{
                $('input:checkbox').prop('checked',false);
            }
        });

        $('#shipped_switch').change(function() {
            if($('#shipped_switch').is(':checked')) {
                if($('#packaged_switch').prop('checked') == false) {
                    alert("Need to check (Packaged switch)?");
                    $(this).prop("checked",false);
                }
                if($('#packaged_switch').prop('checked') == true){
                    var returnVal = confirm("Are you sure?");
                    $(this).prop("checked",returnVal);
                }
            }
            else{
                $('#delivered_switch').prop('checked',false);
            }
        });

        $('#delivered_switch').change(function() {
            if($('#delivered_switch').is(':checked')) {
                if($('#packaged_switch').prop('checked') == false || $('#shipped_switch').prop('checked') == false) {
                    alert("Need to check (Packaged and Shipping switches)?");
                    $(this).prop("checked",false);
                }
                if($('#packaged_switch').prop('checked') == true && $('#shipped_switch').prop('checked') == true){
                    var returnVal = confirm("Are you sure?");
                    $(this).prop("checked",returnVal);
                }
            }
        });
        
    });
    
    $(document).ready(function() {
        $(document).on("click", "#update-order", function() {
            $(this).addClass("edit-item-trigger-clicked"); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            var options = {
                backdrop: "static"
            };
            $("#update-modal").modal(options);
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var order_no = el.data("item-update_order_no");
            var packaged_at = el.data("item-update_packaged_at");
            var shipped_at = el.data("item-update_shipped_at");
            var delivered_at = el.data("item-update_delivered_at");
            var created_at = el.data("item-update_created_at");

            $("#update_order_no").val(order_no);

            if (packaged_at != '') {
                $('#packaged_switch').attr('checked', 'checked');
            }

            if (shipped_at != '') {
                $('#shipped_switch').attr('checked', 'checked');
            }

            if (delivered_at != '') {
                $('#delivered_switch').attr('checked', 'checked');
            }

         
            // alert(category_name);
            
        });
        // on modal hide
        $("#update-modal").on("hide.bs.modal", function() {
            $(".edit-item-trigger-clicked").removeClass(
                "edit-item-trigger-clicked"
            );
            $("#update-form").trigger("reset");

            $('#packaged_switch').attr('checked', false);
            $('#shipped_switch').attr('checked', false);
            $('#delivered_switch').attr('checked', false);

        });
    });
</script>
@endpush
