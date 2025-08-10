@extends('app.layouts.master')
@section('title')
    Blog history
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('title')
            Blog history
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        @if (!isset($detail))
            <div class="col-lg-12">
                <div class="card">

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
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th></th>
                                            <th>Cover</th>
                                            <th class="sort" data-sort="is_showcase">Title (ID)</th>
                                            <th class="sort" data-sort="is_showcase">Category (ID)&nbsp;&nbsp;&nbsp;&nbsp;
                                            </th>
                                            <th class="sort" data-sort="created_by">Created By&nbsp;&nbsp;&nbsp;&nbsp;
                                            </th>
                                            <th class="sort" data-sort="created_at">Created At</th>
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
                                            <td class="text-center">
                                                <div class="">
                                                    <a href="/blog/history/12" class="btn btn-outline-primary btn-sm btn-icon">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="img">
                                                <img style="width: 40px; height: 40px; object-fit: cover"
                                                    src="https://itcihutanimanunggal.co.id/wp-content/uploads/2021/03/IFC-1.png"
                                                    alt="">
                                            </td>
                                            <td class="is_showcase" style="">
                                                <p class="m-0 text-wrap">
                                                    KLHK Giatkan Sosialisasi Upaya Turunkan Emisi Gas Rumah Kaca
                                                </p>
                                            </td>
                                            <td class="status">
                                                Informasi
                                            </td>
                                            <td class="created_by text-end">
                                                <p class="m-0">Nia</p>
                                                <small>as Writer</small>
                                            </td>
                                            <td class="created_at text-end">
                                                <p class="m-0">20, Oct 2023 </p>
                                                <small>12:22 PM</small>
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
        @endif

        <div class="col-lg-12">
            @if (isset($detail))
                @component('app.blog.history.detail')
                @endcomponent
            @endif
        </div>
    </div>
    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/app/app.certificate.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
