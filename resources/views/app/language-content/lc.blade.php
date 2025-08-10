@extends('app.layouts.master')
@section('title')
    Language content
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
            Language content
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        <div class="col-lg-12">
            @component('app.language-content.table-list')
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            @component('app.language-content.table-category')
            @endcomponent
        </div>
    </div>
    {{-- end of content --}}
    @component('app.language-content.table-list-item')
    @endcomponent
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        const tableData = {!! json_encode($lang->toArray(), JSON_HEX_TAG) !!};

        var perPage = 10;
        var editlist = false;
        var templateItem = document.querySelector('.item-template');

        //Table
        // id, logo, img, name (hover to switch en), status, updated at
        var options = {
            valueNames: [
                'lang_id',
                'content_id',
                'content_en',
                'group_name',
                // 'is_active',
                { name: 'identifier', attr: 'data-id' },
                { name: 'langid', attr: 'data-lang-id' }
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
        var langTable = new List('lang-list', options).on("updated", function(list) {
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
                    lang_id: e.lang_id,
                    content_id: e.content_id,
                    content_en: e.content_en,
                    group_name: _elementGroup(e.group_name),
                    // is_active: _elementStatus(e.is_active),
                    identifier: e.id,
                    langid: `${e.id};${e.lang_id}`
                });
            });
        }, 100);

        function _elementStatus(value) {
            return `<span class="badge ${value == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger'} text-uppercase">${value == 1 ? 'Active' : 'Inactive'}</span>`;
        }

        function _elementGroup(value) {
            return `<span class="badge border border-primary text-primary">${value}</span>`;
        }

        function remove(e) {
            const attr = e;
            const langid = attr.attributes['data-lang-id'].nodeValue.split(';');
            const id = langid[0];
            const lang = langid[1];

            Swal.fire({
                title: `Delete '${lang}'?`,
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
                    window.open("{{route('lc.delete')}}" + `/${id}`, '_self');
                }
            });
        }

        function onEdit(e) {
            const id = e.target.dataset.id;

            window.open(`/language-content/edit/${id}`, '_self');
        }
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
