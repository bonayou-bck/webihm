@php
    $user = Auth::user();
    $role = $user->role;
@endphp

@extends('app.layouts.master')
@section('title')
    Blog post approval
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
            Blog post approval
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="listjs-table" id="blog-list">

                        <div class="row g-4 mb-3 d-flex justify-content-end">
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
																						<input class="form-check-input" type="checkbox" id="checkAll"
																								value="option">
																				</div>
																			</th>
																			<th></th>
																			<th class="sort" data-sort="title_id">Title (ID)</th>
																			<th class="sort" data-sort="category_name_id">Category (ID)</th>
																			<th class="sort" data-sort="status">Status</th>
																			<th class="sort" data-sort="created_by">Created By</th>
																			<th class="sort" data-sort="created_at">Created At</th>
																			<th class="sort" data-sort="updated_at">Last update</th>
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
                                                        <button class="dropdown-item slug data-status"
                                                            data-slug="{{ $item['slug_id'] }}"
                                                            data-status="{{ $item['status'] }}" onclick="onEdit(event)">
                                                            Edit
                                                        </button>
                                                        <button class="dropdown-item data-id data-status2"
                                                            data-id="{{ $item['id'] }}"
                                                            data-status2="{{ $item['status'] }}"
                                                            onclick="onSendDraft(event)">
                                                            Send to draft
                                                        </button>
                                                        <a href=""
                                                            class="dropdown-item {{ count($item['history']) == 0 ? 'disabled' : '' }}">
                                                            History
                                                            <span class="badge bg-primary rounded-pill fs-10 ms-2">
                                                                {{ count($item['history']) }}
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td class="img">
																						<img style="width: 40px; height: 40px; object-fit: cover"
																								src="https://itcihutanimanunggal.co.id/wp-content/uploads/2021/03/IFC-1.png"
																								alt="">
																				</td> --}}
                                            <td class="title_id text-wrap">
                                                {{ $item['title_id'] }}
                                            </td>
                                            <td class="category_name_id">
                                                <span class="badge border border-dark text-dark">
                                                    {{ $item['categories'][0]['name_id'] }}
                                                </span>
                                            </td>
                                            <td class="status">
                                                <span
                                                    class="badge border border-{{ $dataStatus[$item['status']][1] }} text-{{ $dataStatus[$item['status']][1] == 'light' ? 'dark' : $dataStatus[$item['status']][1] }}">
                                                    {{ $item['status'] }}
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <p class="m-0 created_by_name">
                                                    {{ $item['created_by_detail'][0]['name'] }}
                                                </p>
                                                <small>as
                                                    <span class="created_by_as">
                                                        {{ $item['created_by_detail'][0]['role'] }}
                                                    </span>
                                                </small>
                                            </td>
                                            <td class="text-end">
                                                <p class="m-0 created_at_date">
                                                    {{-- 20, Oct 2023  --}}
                                                    {{ date('d, M Y', strtotime($item['created_at'])) }}
                                                </p>
                                                <small class="created_at_time">
                                                    {{-- 12:22 PM --}}
                                                    {{ date('h:m:s', strtotime($item['created_at'])) }}
                                                </small>
                                            </td>
                                            <td class="text-end">
                                                <p class="m-0 created_at_date">
                                                    {{-- 20, Oct 2023  --}}
                                                    {{ date('d, M Y', strtotime($item['updated_at'])) }}
                                                </p>
                                                <small class="created_at_time">
                                                    {{-- 12:22 PM --}}
                                                    {{ date('h:m:s', strtotime($item['updated_at'])) }}
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
    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        var perPage = 10;
        var editlist = false;
        var templateItem = document.querySelector('.item-template');

        var options = {
            valueNames: [
                'title_id',
                'category_name_id',
                'status',
                'created_by',
                'created_by_name',
                'created_by_as',
                'created_at',
                'created_at_date',
                'created_at_time',
                'updated_at',
                'updated_at_date',
                'updated_at_time',
                {
                    name: 'slug',
                    attr: 'data-slug',
                },
                {
                    name: 'data-id',
                    attr: 'data-id',
                },
                {
                    name: 'data-status',
                    attr: 'data-status'
                },
                {
                    name: 'data-status2',
                    attr: 'data-status2'
                }
            ],
            item: templateItem.cloneNode(true).outerHTML,
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

        function onSendDraft(e) {
            const id = e.target.dataset.id;
            const status = e.target.dataset.status2;

            if (status == 'review') {
                Swal.fire({
                    title: "Action Stopped",
                    text: "You can't set In Review article to Draft, please give it review or reject it first.",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                    // cancelButtonClass: 'btn btn-danger w-xs mt-2',
                    confirmButtonText: "Ok",
                    buttonsStyling: false,
                    showCloseButton: true
                });
            } else {
                Swal.fire({
                    title: "Send this post to draft?",
                    text: "This post will not appear in public",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                    cancelButtonClass: 'btn btn-danger w-xs mt-2',
                    confirmButtonText: "Yes",
                    buttonsStyling: false,
                    showCloseButton: true
                }).then(function(result) {
                    if (result.value) {
                        window.open(`/blog/to-draft/${id}`, '_self');
                    }
                });
            }

        }

        function onEdit(e) {
            const slug = e.target.dataset.slug;
            const status = e.target.dataset.status;
            const _a = "{{ $role !== USER_ROLE_SUPER }}";

            if (status === '{{ BLOG_STATUS_REVIEW }}' && _a == "1") {
                _showInReviewAlert();
                return;
            }

            window.open(`/blog/edit/${slug}`, '_self');
        }

        function _showInReviewAlert() {
            Swal.fire({
                title: "In Review",
                text: "This post is in review...",
                icon: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                confirmButtonText: "Ok",
                buttonsStyling: false,
                showCloseButton: false
            });
        }
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
