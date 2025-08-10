@extends('app.layouts.master')
@section('title')
    Account Writer
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
            Manage Accounts
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        <div class="col-lg-12">
            @component('app.account.table-list', ['userData' => $userData])
            @endcomponent
        </div>
    </div>
    {{-- end of content --}}
    {{-- @component('app.account.table-list-item')
    @endcomponent --}}
    @component('app.account.form-modal')
    @endcomponent
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        const tableData = {!! json_encode($userData->toArray(), JSON_HEX_TAG) !!};
        var perPage = 10;
        var editlist = false;
        var templateItem = document.querySelector('.item-template');

        //Table
        // id, logo, img, name (hover to switch en), status, updated at
        var options = {
            valueNames: [
              'full_name',
              'role',
              'email',
              'created_at'
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

        const crModal = new bootstrap.Modal('#formAccountModal', {
          keyboard: false
        });

        document.querySelector('#formAccountModal form').addEventListener('submit', function() {
          document.querySelector('#formAccountModal button[type=submit] .spinner-border')
            .classList.remove('d-none');
          document.querySelector('#formAccountModal button[type=submit]').disabled = true;
          // document.querySelector('#formAccountModal form').submit();
        });

        document.getElementById('formAccountModal').addEventListener('hidden.bs.modal', event => {
          document.querySelector('#formAccountModal button[type=submit] .spinner-border')
            .classList.add('d-none');
          document.querySelector('#formAccountModal button[type=submit]').disabled = false;
          document.querySelectorAll('#formAccountModal input').forEach(element => {
            if(element.name != '_token') {
              element.disabled = false;
              if(element.type != 'radio') {
                element.value = "";
              }
            }
          });
          const _form = document.querySelector('#formAccountModal form');
          _form.action = _form.dataset.actionAdd;
          document.querySelector('#formAccountModal').querySelector('.modal-title').innerHTML = 'Create New Account';
          document.querySelector('#formAccountModal .reset-info').classList.add('d-none');
        });

        function onEdit(e, data) {
          crModal.show();
          console.log(data);
          const _form = document.querySelector('#formAccountModal form');
          const _roles = _form.querySelector('.roles').querySelectorAll('input[type=radio]');

          _form.action = _form.dataset.actionUpdate.replace('/0', `/${data.id}`);

          _roles.forEach(element => {
            element.disabled = true;
            if(element.value == data.role) {
              element.checked = true;
            }else{
              element.checked = false;
            }
          });

          _form.querySelector('input[name=name]').value = data.name;
          _form.querySelector('input[name=email]').value = data.email;
          
          _form.querySelector('input[name=email]').disabled = true;
          _form.querySelector('input[name=password]').disabled = true;
          _form.querySelector('input[name=password-re]').disabled = true;
          document.querySelector('#formAccountModal').querySelector('.modal-title').innerHTML = 'Update Account';
        }

        function onChangePassword(e, data) {
          crModal.show();
          console.log(data);
          const _form = document.querySelector('#formAccountModal form');
          const _roles = _form.querySelector('.roles').querySelectorAll('input[type=radio]');

          _form.action = _form.dataset.actionReset.replace('/0', `/${data.id}`);

          _roles.forEach(element => {
            element.disabled = true;
            if(element.value == data.role) {
              element.checked = true;
            }else{
              element.checked = false;
            }
          });

          _form.querySelector('input[name=name]').value = data.name;
          _form.querySelector('input[name=email]').value = data.email;
          
          _form.querySelector('input[name=name]').disabled = true;
          _form.querySelector('input[name=email]').disabled = true;
          document.querySelector('#formAccountModal .reset-info').classList.remove('d-none');
          document.querySelector('#formAccountModal').querySelector('.modal-title').innerHTML = 'Reset Passowrd';
        }

        function onRemove(e, data) {
          Swal.fire({
                title: "Are you sure?",
                text: `Account ${data.email} will be removed`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                confirmButtonText: "Yes",
                buttonsStyling: false,
                showCloseButton: true
            }).then(function(result) {
                if (result.value) {
                  const _url = {!! json_encode(route('account.remove', 0)) !!};
                  window.open(_url.replace('/0', `/${data.id}`), '_self');
                }
            });
        }

    </script>
@endsection
