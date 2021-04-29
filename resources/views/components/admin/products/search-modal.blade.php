<!-- Search Modal -->
<div class="modal fade" id="search-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="search-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="search-modalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="search-form" class="form-horizontal" method="GET">
                <div class="card text-black bg-light mb-0">
                  <div class="card-body">
                    <!-- Search bar --> 
                    <div class="form-group input-group-sm">
                      <input class="form-control" type="search" name="advanceSearch" placeholder="Search" aria-label="Search">
                    </div>
                    <!-- / Search bar -->
                    <!-- Category --> 
                    <div class="form-group input-group-sm">
                        <label for="searchCategory">Category</label>
                        <select name="searchCategory" id="searchCategory" class="form-control">
                            <option selected disabled value="">Choose...</option>
                            {{ $categoryOptions }}
                        </select>
                    </div>
                    <!-- /Category --> 
                    <!-- Sub Category --> 
                    <div class="form-group input-group-sm">
                        <label for="searchSubCategory" id="searchSubCategoryLabel">Sub Category</label>
                        <select name="searchSubCategory" id="searchSubCategory" class="form-control">
                        </select>
                    </div>
                    <!-- /Sub Category --> 
                    <!-- Brand --> 
                    <div class="form-group input-group-sm">
                      <label for="searchBrand">Brand</label>
                      <select name="searchBrand" id="searchBrand" class="form-control">
                          <option selected disabled value="">Choose...</option>
                          {{ $brandOptions }}
                      </select>
                    </div>
                    <!-- /Brand --> 
                  </div>
                </div>
                  <div class="form-group modal-footer">
                    <button type="submit" id="advanceSearch" class="btn btn-primary ">Search</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
              </form>
        </div>

    </div>
    </div>
</div>
<!-- /search Modal -->