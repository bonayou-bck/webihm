@extends('app.layouts.master')
@section('title')
    Blog categories
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('title')
            Blog categories
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="listjs-table" id="blog-list">

                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" onclick="onAdd(event)" {{-- data-bs-toggle="modal" data-bs-target="#addEditModal" --}}
                                        class="btn btn-success btn-label waves-effect waves-light">
                                        <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add
                                    </button>
                                    {{-- <button class="btn btn-soft-danger" onClick="openModal()">
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
                            {{-- {{ json_encode($tableData) }} --}}
                            <table class="table align-middle table-nowrap table-hover table-bordered" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>
                                        <th style="width: 1%;"></th>
                                        <th class="sort" data-sort="name_id">Name (ID)</th>
																				<th class="sort" data-sort="name_en">Name (EN)</th>
																				<th class="sort" data-sort="slug_id">Slug (ID)</th>
																				<th class="sort" data-sort="slug_en">Slug (EN)</th>
                                        <th class="sort" data-sort="posts">Posts</th>
                                        <th class="sort" data-sort="created_at">Created At</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($tableData as $item)
                                        <tr class="item-template">
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                        value="option1">
                                                </div>
                                            </th>
                                            <td class="id" style="display:none;">
                                                <a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>
                                            </td>
                                            <td class="text-center">
                                                <div class="">
                                                    <button class="btn btn-outline-primary btn-sm btn-icon" type="button"
                                                        data-bs-toggle="dropdown"
                                                        data-bs-popper-config='{"strategy":"fixed"}' aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="ri-apps-2-line"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" onclick="onEdit(event)"
																													data-raw="{{json_encode($item)}}"
																													data-id="{{$item['id']}}">
                                                            Edit
                                                        </button>
                                                        <button class="dropdown-item text-danger"
                                                            onclick="onDelete(event)"
																														data-id="{{$item['id']}}"
																														data-title="{{$item['name_id']}}">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-wrap name_id">
                                                {{ $item['name_id'] }}
                                            </td>
																						<td class="text-wrap name_en">
																							{{ $item['name_en'] }}
																						</td>
																						<td class="text-wrap slug_id">
																							{{ $item['slug_id'] }}
																						</td>
																						<td class="text-wrap slug_en">
																							{{ $item['slug_en'] }}
																						</td>
                                            <td class="posts">
                                                {{ $item['posts'] }}
                                            </td>
                                            <td class="text-end created_at">
                                                <p class="m-0 created_at_date">
                                                    {{ date('d, M Y', strtotime($item['created_at'])) }}
                                                </p>
                                                <small class="created_at_time">
                                                    {{ date('h:m:s', strtotime($item['created_at'])) }}
                                                </small>
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
        </div>
    </div>

    {{-- add/edit modals --}}
    <div id="addEditModal" class="modal zoomIn" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add new category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('blog.category.create') }}" data-create="{{ route('blog.category.create') }}"
                        data-update="{{ route('blog.category.update', 0) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="basiInput" class="form-label fs-12">Name (ID)</label>
                            <input type="text" maxlength="200" required class="form-control" name="name_id"
                                placeholder="Masukkan dalam bahasa">
                        </div>
                        <div class="mb-2">
                            <label for="basiInput" class="form-label fs-12">Name (EN)</label>
                            <input type="text" maxlength="200" required class="form-control" name="name_en"
                                placeholder="Enter in english">
                        </div>
                    </form>

										<p class="small text-danger alert p-0 m-0 d-none">
											Your updated value will not effect the slug name
										</p>
                </div>
                <div class="modal-footer">
										<button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
										<button type="button" id="addEditModalSubmit" class="btn btn-primary btn-sm">
												<i class="ri-send-plane-2-line align-bottom me-1"></i> Submit
										</button>
                </div>

            </div>
        </div>
    </div>
    {{-- end of add/edit modals --}}

    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
		<script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        var perPage = 10;
        var editlist = false;

        var options = {
            valueNames: [
                'name_id',
								'name_en',
								'slug_id',
								'slug_en',
                'posts',
                'created_at'
            ],
            page: perPage,
            pagination: true,
            plugins: [
                ListPagination({
                    left: 2,
                    right: 2
                })
            ]
        };
        var langTable = new List('blog-list', options).on("updated", function(list) {
            list.matchingItems.length == 0 ?
                (document.getElementsByClassName("noresult")[0].style.display = "block") :
                (document.getElementsByClassName("noresult")[0].style.display = "none");
            var isFirst = list.i == 1;
            var isLast = list.i > list.matchingItems.length - list.page;
            // make the Prev and Nex buttons disabled on first and last pages accordingly
            (document.querySelector(".pagination-prev.disabled")) ? document.querySelector(
                ".pagination-prev.disabled").classList.remove("disabled"): '';
            (document.querySelector(".pagination-next.disabled")) ? document.querySelector(
                ".pagination-next.disabled").classList.remove("disabled"): '';
            if (isFirst) {
                document.querySelector(".pagination-prev").classList.add("disabled");
            }
            if (isLast) {
                document.querySelector(".pagination-next").classList.add("disabled");
            }
            if (list.matchingItems.length <= perPage) {
                document.querySelector(".pagination-wrap").style.display = "none";
            } else {
                document.querySelector(".pagination-wrap").style.display = "flex";
            }

            if (list.matchingItems.length == perPage) {
                document.querySelector(".pagination.listjs-pagination").firstElementChild.children[0].click()
            }

            if (list.matchingItems.length > 0) {
                document.getElementsByClassName("noresult")[0].style.display = "none";
            } else {
                document.getElementsByClassName("noresult")[0].style.display = "block";
            }
        });

        const modal = new bootstrap.Modal('#addEditModal');
        const form = document.querySelector('#addEditModal form');

        document.querySelector('#addEditModalSubmit').addEventListener('click', function(e) {
            document.querySelector('#addEditModal form').submit();
        });

        document.querySelector('#addEditModal').addEventListener('hidden.bs.modal', event => {
            form.querySelector('input[type=text]').value = '';
            form.action = form.dataset.create;
						document.querySelector('#addEditModal .alert').classList.add('d-none');
        });

				function onAdd() {
					modal.show();
				}

        function onEdit(e) {
            let dataUriUpdate = form.dataset.update;
						const data = JSON.parse(e.target.dataset.raw);
						dataUriUpdate = dataUriUpdate.replace('/0', `/${e.target.dataset.id}`);
						document.querySelector('#addEditModal .alert').classList.remove('d-none');

            form.action = dataUriUpdate;
						form.querySelector('input[name=name_id]').value = data.name_id;
						form.querySelector('input[name=name_en]').value = data.name_en;

            modal.show();
        }

				function onDelete(e) {
            const id = e.target.dataset.id;
            const title = e.target.dataset.title;

            Swal.fire({
                title: 'Are you sure?',
                text: `Remove this category '${title}'`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                buttonsStyling: false,
                showCloseButton: true
            }).then(function(result) {
                if (result.value) {
                    window.open(`/blog/categories/delete/${id}`, '_self');
                }
            });
        }
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
