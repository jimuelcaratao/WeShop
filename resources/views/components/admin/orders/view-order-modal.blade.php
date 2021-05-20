
<!-- Modal -->
<div class="modal fade" id="view-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="view-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="view-modalLabel">View</h5>
            <button type="button" class="btn-close close-modal-view"aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="" method="POST" id="view-form">
                    @csrf
                    <div class=" sm:mt-0">
                        <div class=" md:mt-0 md:col-span-2">
                            <div class="overflow-hidden ">
                                <div class="px-4 pt-3 pb-5 bg-white sm:p-6">

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="view_order_no" class="block text-sm font-medium text-gray-700">Order No.</label>
                                            <input type="text" name="order_no" id="view_order_no" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="view_order_status" class="block text-sm font-medium text-gray-700">Order Status.</label>
                                            <input type="text" name="view_order_status" id="view_order_status" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <hr class="mt-5 text-gray-500">
                                    <h4 class="py-3">Customer Details</h4>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class=" col-span-8 sm:col-span-6">
                                            <label for="view_name" class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" name="order_no" id="view_name" readonly required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class=" col-span-8 sm:col-span-6">
                                            <label for="view_email" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="text" name="view_email" id="view_email" readonly required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class=" col-span-8 sm:col-span-6">
                                            <label for="view_mobile_no" class="block text-sm font-medium text-gray-700">Mobile No.</label>
                                            <input type="text" name="view_mobile_no" id="view_mobile_no" readonly required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-8 sm:col-span-6">
                                            <label for="view_address" class="block text-sm font-medium text-gray-700">
                                                Address
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="view_address" name="view_address" rows="3" readonly class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mt-5 text-gray-500">
                                    <h4 class="py-3">Ordered Items</h4>

                                    <div class="grid grid-cols-6 gap-6">
                                        <div class=" col-span-8 sm:col-span-6">

                                            <div class="flex flex-col">
                                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                            {{-- table start --}}
                                                            <table id="order-items" class="min-w-full divide-y divide-gray-200">
                                                            </table>{{-- table end --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
               
                    <div div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal-view">Close</button>
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
        $(".close-modal-view").click(function(){
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
                        $('#view-modal').modal('hide');
                        $("#view-form").trigger("reset");

                        $('#submit_view').attr('disabled', 'disabled');
                    } else {
                        return false;
                    }
            });
        });
    });


    $(document).ready(function() {
        $(document).on("click", "#view-order", function() {
            $(this).addClass("edit-item-trigger-clicked"); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            var options = {
                backdrop: "static"
            };
            $("#view-modal").modal(options);
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var order_no = el.data("item-order_no");
            var name = el.data("item-name");
            var email = el.data("item-email");
            var status = el.data("item-status");
            var mobile_no = el.data("item-mobile_no");

            var house = el.data("item-house");
            var city = el.data("item-city");
            var province = el.data("item-province");
            var barangay = el.data("item-barangay");

            if (house != '' && city != '' && province != '' && barangay != '') {
                $("#view_address").val(`${house}, Barangay ${barangay} ${province}, ${city}`);
            }

            $("#view_order_no").val(order_no);
            $("#view_name").val(name);
            $("#view_email").val(email);
            $("#view_order_status").val(status);
            $("#view_mobile_no").val(mobile_no);

         
            // alert(category_name);

            $.ajax({
                type: "GET",
                url: `/OrderItems?order_no=${order_no}`,
                success: function(response) {
                    console.log(response.data);
                    let htmls = "";
                    x = null;

                    $("#order-items").prepend(
                        `<thead class="bg-gray-50">` +
                                `<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">` +
                                    `Product Code`+
                                `</th>`+
                                `<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">` +
                                    `Product Name`+
                                `</th>`+
                                `<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">` +
                                    `Quantity`+
                                `</th>`+
                                `<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">` +
                                    `Price`+
                                `</th>`+
                            `</thead>`
                    );

                    response.data.map(x => {
                        var product_code = x.product_code;
                        var product_name = x.product.product_name;
                        $("#order-items").append(

                            `<tr>` +
                                `<td class="px-6 py-2 whitespace-nowrap">` +
                                    `<div class="text-sm text-gray-900">${product_code}</div>`+
                                `</td>`+
                                `<td class="px-6 py-2 whitespace-nowrap">` +
                                    `<div class="text-sm text-gray-900">${product_name}</div>`+
                                `</td>`+
                                `<td class="px-6 py-2 whitespace-nowrap">` +
                                    `<div class="text-sm text-gray-900">${x.quantity}</div>`+
                                `</td>`+
                                `<td class="px-6 py-2 whitespace-nowrap">` +
                                    `<div class="text-sm text-gray-900">PHP ${x.price}</div>`+
                                `</td>`+
                            `</tr>`
                        );
                    });
                }
            });
            
        });
        // on modal hide
        $("#view-modal").on("hide.bs.modal", function() {
            $(".edit-item-trigger-clicked").removeClass(
                "edit-item-trigger-clicked"
            );
            $("#view-form").trigger("reset");

            $("#order-items").html(null);
         

        });
    });
</script>
@endpush
