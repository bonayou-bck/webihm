@extends('app.layouts.master')
@section('title')
    Contact
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
            Contact
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        {{-- no, img, title (hover to switch en), categories, status, date --}}
        {{-- no, logo, img, name (hover to switch en), status, updated at --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Contact List</h4>
                </div>

                <div class="card-body">
                    <div class="listjs-table" id="contact-list">

                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a type="button" href="/contact/create"
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
                            <table class="table align-middle table-nowrap" id="">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>
                                        <th></th>
                                        {{-- <th>Cover</th> --}}
                                        <th class="sort" data-sort="name_id">Name (ID)</th>
                                        <th class="sort" data-sort="address_id">Address (ID)</th>
                                        <th class="sort" data-sort="email">Email</th>
                                        <th class="sort" data-sort="telephone">Telephone</th>
                                        <th class="sort" data-sort="fax">Fax</th>
                                        {{-- <th class="sort" data-sort="is_active">Status</th> --}}
                                        <th>Created By</th>
                                        <th class="sort" data-sort="created_at">Created At</th>
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

        <div class="col-lg-12">
            @component('app.contact.social-form', ['social' => $social])
            @endcomponent
        </div>
    </div>
    @component('app.contact.table-list-item')
    @endcomponent
    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        const tableData = {!! json_encode($contact->toArray(), JSON_HEX_TAG) !!};
        var perPage = 10;
        var editlist = false;
        var templateItem = document.querySelector('.item-template');
        var options = {
            valueNames: [
                'name_id',
                'address_id',
                'email',
                'telephone',
                'fax',
                'created_at_date',
                'created_at_time',
                'is_footer',
                {
                    name: 'data-id',
                    attr: 'data-id'
                },
                {
                    name: 'data-id2',
                    attr: 'data-id2'
                },
                {
                    name: 'data-id3',
                    attr: 'data-id3'
                },
                {
                    name: 'data-name',
                    attr: 'data-name'
                },
                {
                    name: 'data-footer',
                    attr: 'data-footer'
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

        console.log(tableData);

        var langTable = new List('contact-list', options).on("updated", function(list) {
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
                console.log(e);
                langTable.add({
                    name_id: e.name_id,
                    address_id: e.address_id,
                    email: e.email,
                    telephone: e.telephone,
                    fax: e.fax,
                    is_footer: e.is_footer == 1 ? elLabel('In Footer', e.is_footer) : '',
                    'data-id': e.id,
                    'data-id2': e.id,
                    'data-id3': e.id,
                    'data-name': e.name_id,
                    'data-footer': e.is_footer,
                    created_at_date: formatDate(e.created_at, 'dd, MMM YYYY'),
                    created_at_time: formatDate(e.created_at, 'hh:mm:ss')
                });
            });
        }, 100);

        function elLabel(label, state) {
            return `<span class="badge bg-${state == 1 ? 'success' : 'danger'}-subtle text-${state == 1 ? 'success' : 'danger'} text-uppercase">
                    ${label}
                </span>`;
        }

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

            window.open(`/contact/edit/${id}`, '_self');
        }

        function setFooter(e) {
            const id = e.target.dataset.id2;
            const current = e.target.dataset.footer;
            const state = current == 1 ? 0 : 1;

            window.open(`/contact/set/footer/${id}/${state}`, '_self');
        }

        function remove(e) {
            const id = e.target.dataset.id3;
            const title = e.target.dataset.name;

            Swal.fire({
                title: `Delete '${title}'?`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                buttonsStyling: false,
                showCloseButton: true
            }).then(function(result) {
                if (result.value) {
                    window.open("{{route('contact.delete')}}" + `/${id}`, '_self');
                }
            });
        }

    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
