<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">Language List</h4>
    </div>

    <div class="card-body">
        <div class="listjs-table" id="lang-list">

            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <div>
                        <a type="button" href="/language-content/create"
                            class="btn btn-success btn-label waves-effect waves-light">
                            <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add
                        </a>
                        {{-- <button class="btn btn-soft-danger" onClick="deleteMultiple()">
                            <i class="ri-delete-bin-2-line"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end">
                        <div class="search-box ms-2">
                            <input type="text" class="form-control search" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="text-muted">
            Language identifier
          </div> --}}

            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-top table-nowrap" id="">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 50px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                </div>
                            </th>
                            <th></th>
                            <th class="sort" data-sort="lang_id">Language identifier</th>
                            <th class="sort" data-sort="content_id">Content (ID)</th>
                            <th class="sort" data-sort="content_en">Content (EN)</th>
                            <th class="sort" data-sort="group_name">Group</th>
                            {{-- <th class="sort" data-sort="is_active">Status</th> --}}
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                    </tbody>
                </table>
                <div class="noresult" style="display: none">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                        </lord-icon>
                        <h5 class="mt-2">Sorry! No Result Found</h5>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <div class="pagination-wrap hstack gap-2">
                    <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                        Previous
                    </a>
                    <ul class="pagination listjs-pagination mb-0"></ul>
                    <a class="page-item pagination-next" href="javascript:void(0);">
                        Next
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>