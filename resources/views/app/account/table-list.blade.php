<div class="card">

    <div class="card-body">
        <div class="listjs-table" id="lang-list">

            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#formAccountModal"
                            class="btn btn-success btn-label waves-effect waves-light">
                            <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add
                        </button>
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

            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-top table-nowrap table-hover table-bordered align-middle" id="">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 50px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                </div>
                            </th>
                            <th></th>
                            <th class="sort" data-sort="full_name">Full Name</th>
                            <th class="sort" data-sort="role">Role</th>
                            <th class="sort" data-sort="email">Email</th>
                            <th class="sort" data-sort="email">Join Since</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        @foreach ($userData as $udata)
                            <tr class="item-template {{ $udata['can_delete'] == 0 ? 'bg-primary-subtle' : '' }}">
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                            value="option1">
                                    </div>
                                </th>
                                <td class="id" style="display:none;">
                                    <a href="javascript:void(0);" class="fw-medium link-primary"></a>
                                </td>
                                <td class="text-center" style="width: 1%">
                                    <div class="">
                                        <button class="btn btn-outline-primary btn-sm btn-icon" type="button"
                                            data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}'
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-apps-2-line"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item"
                                                onclick="onEdit(event, {{ json_encode($udata) }})">
                                                Edit
                                            </button>
                                            <button class="dropdown-item text-warning"
                                                onclick="onChangePassword(event, {{ json_encode($udata) }})">
                                                Change Password
                                            </button>
                                            @if ($udata['can_delete'] == 1)
                                                <button class="dropdown-item text-danger langid" data-lang-id="" 
                                                    onclick="onRemove(event, {{ json_encode($udata) }})">
                                                    Remove
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="full_name text-wrap">
                                    {{ $udata['name'] }}
                                    @if ($udata['can_delete'] == 0)
                                        <br> <small class="text-primary">This account cannot be deleted</small>
                                    @endif
                                </td>
                                <td class="role text-wrap">
                                    {{ $udata['role'] }}
                                </td>
                                <td class="email text-wrap">
                                    {{ $udata['email'] }}
                                </td>
                                <td class="created_at text-wrap">
                                    {{ $udata['created_at'] != null ? timeago($udata['created_at']) : 'Untracked' }}
                                </td>
                            </tr>
                        @endforeach
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
