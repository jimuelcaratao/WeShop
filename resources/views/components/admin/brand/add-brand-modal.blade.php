

<!-- Modal -->
<div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="add-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="add-modalLabel">Add Brand</h5>
            <button type="button" class="btn-close closeModalClick"aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="{{ route('categories.store') }}" method="POST" id="add-form">
                    @csrf
                    <h4> Brand information </h4>
                    <div class="mt-10 sm:mt-0">
                        <div class="mt-3 md:mt-0 md:col-span-2">
                            <div class="overflow-hidden ">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class=" col-span-6 sm:col-span-4">
                                            <label for="brand_name" class="block text-sm font-medium text-gray-700">Brand name*</label>
                                            <input type="text" name="brand_name" id="brand_name" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="brand_id" class="block text-sm font-medium text-gray-700">Brand Status*</label>
                                            <select id="brand_id" name="brand_id" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                        <button type="button" class="btn btn-secondary closeModalClick">Cancel</button>
                        <button disabled id="submit_category" type="submit" class="btn btn-primary">Create</button>
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

                        $('#submit_category').attr('disabled', 'disabled');
                    } else {
                        return false;
                    }
            });
        });
    });
</script>
@endpush
