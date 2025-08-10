<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <button type="button" onClick="location.replace('/blog/history')" class="btn btn-primary btn-sm btn-label waves-effect waves-light">
                <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back
            </button>
            <table>
                {{-- <tr>
                    <td>Title (ID)</td>
                    <td>:</td>
                    <td>
                        <b>KLHK Giatkan Sosialisasi Upaya Turunkan Emisi Gas Rumah Kaca</b>
                    </td>
                </tr>
                <tr>
                    <td>Title (EN)</td>
                    <td>:</td>
                    <td>
                        <b>KLHK Promotes Socialization of Efforts to Reduce Greenhouse Gas Emissions</b>
                    </td>
                </tr> --}}
                <tr class="small">
                    <td>Last update</td>
                    <td>:</td>
                    <td>
                        Sun, 13 Oct 2023 12:13:10
                    </td>
                </tr>
            </table>
        </div>

        <div class="card-body">

            <div class="listjs-table" id="certificate-list">

                <div class="row g-4 mb-3">
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end">
                            <div class="search-box ms-2">
                                <input type="text" class="form-control search" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 50px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th>
                                <th class="sort" data-sort="created_at">Date</th>
                                <th class="sort" data-sort="is_showcase">Notes</th>
                                <th class="sort" data-sort="is_showcase">Title (ID)</th>
                                <th class="sort" data-sort="is_showcase">Title (EN)</th>
                                <th class="sort" data-sort="created_by">Status</th>
                                <th class="sort" data-sort="created_by">By</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                            value="option1">
                                    </div>
                                </th>
                                <td class="id" style="display:none;">
                                    <a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>
                                </td>
                                <td class="created_at text-end">
                                    <p class="m-0">20, Oct 2023 </p>
                                    <small>12:22 PM</small>
                                </td>
                                <td class="status text-wrap">
                                    Some words in the article need to be edited, using words that make more sense for
                                    this
                                </td>
                                <td class="is_showcase" style="">
                                    <p class="m-0 text-wrap">
                                        KLHK Giatkan Sosialisasi Upaya Turunkan Emisi Gas Rumah Kaca
                                    </p>
                                </td>
                                <td class="is_showcase" style="">
                                    <p class="m-0 text-wrap">
                                        KLHK Promotes Socialization of Efforts to Reduce Greenhouse Gas Emissions
                                    </p>
                                </td>
                                <td class="status">
                                    <span class="badge bg-danger-subtle text-danger text-uppercase">
                                        Reject
                                    </span>
                                </td>
                                <td class="created_by text-end">
                                    <p class="m-0">admin</p>
                                    <small>as Superadmin</small>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="noresult" style="display: none">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                            </lord-icon>
                            <h5 class="mt-2">Sorry! No Result Found</h5>
                            <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                orders for you search.</p>
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
</div>
