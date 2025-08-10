@extends('app.layouts.master')
@section('title')
    Certificate
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
            Certificate
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        {{-- no, img, title (hover to switch en), categories, status, date --}}
        {{-- no, logo, img, name (hover to switch en), status, updated at --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Certificate List</h4>
                </div>

                <div class="card-body">
                    <div class="listjs-table" id="certificate-list">

                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="/certificate/create" type="button"
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
                                        {{-- <th>Images</th> --}}
                                        <th class="sort" data-sort="name_id">Name (ID)</th>
                                        <th class="sort" data-sort="admin_id">Created By</th>
                                        <th class="sort" data-sort="created_at">Created At</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all"></tbody>
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

    @component('app.certificate.table-list-item')
    @endcomponent
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        const tableData = {!! json_encode($tableData->toArray(), JSON_HEX_TAG) !!};

        console.log(tableData);

        var perPage = 10;
        var editlist = false;
        var templateItem = document.querySelector('.item-template');

        //Table
        // id, logo, img, name (hover to switch en), status, updated at
        var options = {
            valueNames: [
                'name_id',
                'admin_id',
                'created_at_date',
                'created_at_time',
                {
                    name: 'data-id',
                    attr: 'data-id'
                },
                {
                    name: 'data-id2',
                    attr: 'data-id2'
                },
                {
                    name: 'data-title',
                    attr: 'data-title'
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
        var langTable = new List('certificate-list', options).on("updated", function(list) {
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

        setTimeout(() => {
            tableData.forEach((e, i) => {
                langTable.add({
                    name_id: e.name_id,
                    admin_id: e.admin_id,
                    created_at_date: formatDate(e.created_at, 'dd, MMM YYYY'),
                    created_at_time: formatDate(e.created_at, 'hh:mm:ss'),
                    'data-id': e.id,
                    'data-id2': e.id,
                    'data-title': e.name_id
                });
            });
        }, 100);

        function formatDate(date, format) {
            // dd, MMM YYYY
            // hh:mm:ss
            const datetime = new Date(date);
            const d = datetime.toDateString().split(' ');
            const t = datetime.toLocaleTimeString();
            if (format == 'dd, MMM YYYY') {
                return `${d[2]}, ${d[1]} ${d[3]}`;
            } else if (format == 'hh:mm:ss') {
                return t;
            }
        }

        function onEdit(e) {
            const id = e.target.dataset.id;

            window.open(`/certificate/edit/${id}`, '_self');
        }

        function onDelete(e) {
            const id = e.target.dataset.id2;
            const title = e.target.dataset.title;

            Swal.fire({
                title: 'Are you sure?',
                text: `Remove this certificate '${title}'`,
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
                    window.open(`/certificate/delete/${id}`, '_self');
                }
            });
        }
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
