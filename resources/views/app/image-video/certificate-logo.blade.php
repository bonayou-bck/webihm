@extends('app.layouts.master')
@section('title')
    Manage certification logo
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
            Manage certification logo
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        <div class="col-lg-12">
            @if (session('status-certification-logo'))
                <div class="alert {{ session('status-certification-logo')['code'] == 200 ? 'alert-success' : 'alert-danger' }} alert-dismissible alert-label-icon rounded-label fade show"
                    role="alert">
                    <i
                        class="{{ session('status-certification-logo')['code'] == 200 ? 'ri-checkbox-circle-line' : 'ri-error-warning-line' }} label-icon"></i><strong>{{ session('status-certification-logo')['code'] == 200 ? 'Success' : 'Failed' }}</strong>
                    -
                    @if (session('status-certification-logo')['type'] == 'add')
                        {{ session('status-certification-logo')['all'] ? 'Image uploaded' : 'But some image failed to upload' }}
                    @endif

                    @if (session('status-certification-logo')['type'] == 'delete')
                        Image deleted
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Certification Logo</h6>
                        <small class="text-muted"></small>
                    </div>

                    <button type="button" id="form-certlogo-btn-add"
                        class="btn btn-primary btn-sm btn-label waves-effect waves-light"><i
                            class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add</button>
                    <input id="file-certlogo-picker" type="file" hidden>
                </div>
                <div class="card-body pb-0">
                    <form id="form-certlogo" action="{{ route('certlogo.upload') }}/1" method="POST">
                        @csrf
                        <div class="row" id="form-certlogo-item-wrapper">

                            @if ($slideData)
                                @foreach ($slideData as $key => $data)
                                    <div class="col-sm-3 position-relative form-certlogo-item">
                                        <div class="card p-2" style="background: #eee">
                                            <div data-image='{{ url($data['src']) }}'
                                                data-remove='{{ route('certlogo.remove') }}/{{ $data['id'] }}'
                                                class="close-item position-absolute text-danger d-flex justify-content-center align-items-center"
                                                style="width: 25px; height: 25px; border-radius: 50%; background: #fff; top: 16px; right: 16px;">
                                                <i class="ri-close-circle-line label-icon align-middle fs-20"></i>
                                            </div>
                                            <img class="w-100 rounded" style="height: 150px; object-fit: contain;"
                                                src="{{ url($data['src']) }}" alt="">
                                            <textarea name="logo[{{ $key }}]" hidden></textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" form="form-certlogo"
                        class="btn btn-success btn-sm btn-label waves-effect waves-light"><i
                            class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save changes</button>
                </div>
            </div>

            {{-- template --}}
            <div class="d-none">
                <div class="certlogo-item-template col-sm-3 position-relative form-certlogo-item">
                    <div class="card p-2 bg-danger">
                        <div class="close-item position-absolute text-danger d-flex justify-content-center align-items-center"
                            style="width: 25px; height: 25px; border-radius: 50%; background: #fff; top: 16px; right: 16px;">
                            <i class="ri-close-circle-line label-icon align-middle fs-20"></i>
                        </div>
                        <img class="w-100 rounded" style="height: 150px; object-fit: cover;" src="" alt="">
                        <textarea name="logo[0]" hidden></textarea>
                    </div>
                </div>
            </div>

        </div>

    </div>
    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        const certLogoItemWrapper = document.getElementById('form-certlogo-item-wrapper');
        let certLogoItems = certLogoItemWrapper.querySelectorAll('.form-certlogo-item');
        const certLogoItemTemplate = document.querySelector('.certlogo-item-template');
        const certLogoHomeAddBtn = document.getElementById('form-certlogo-btn-add');
        const certLogoHomeAddInput = document.getElementById('file-certlogo-picker');

        certLogoHomeAddBtn.addEventListener('click', function() {
            certLogoHomeAddInput.click();
        });

        certLogoHomeAddInput.addEventListener('change', function(e) {
            const _template = certLogoItemTemplate.cloneNode(true);
            _template.classList.remove("certlogo-item-template");

            var reader = new FileReader();
            reader.onload = function() {
                _template.getElementsByTagName('img')[0].src = reader.result;
                _template.getElementsByTagName('textarea')[0].value = reader.result;
                _template.getElementsByTagName('textarea')[0].name = `logo[${certLogoItems.length}]`;

                certLogoItemWrapper.appendChild(_template);
                certLogoItems = certLogoItemWrapper.querySelectorAll('.form-certlogo-item');
                removeEvents();
                initEvents();
                certLogoHomeAddInput.value = null;
            };
            reader.readAsDataURL(e.target.files[0]);
        });

        console.log('template ', certLogoItemTemplate);

        function initEvents() {
            certLogoItems.forEach((e, i) => {
                const _closeItem = e.querySelector('.close-item');
                _closeItem.addEventListener('click', closeItem, false);
                _closeItem.params = [e];
                _closeItem.closeEl = _closeItem;
            });
        }

        function removeEvents() {
            certLogoItems.forEach((e, i) => {
                const _closeItem = e.querySelector('.close-item');
                _closeItem.removeEventListener('click', closeItem);
            });
        }

        function closeItem(e) {
            const el = e.currentTarget.closeEl;
            const url = el.dataset.remove;
            const img = el.dataset.image;

            console.log(el.dataset.remove);

            Swal.fire({
                title: 'Delete this image?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                imageUrl: img,
                imageHeight: 60,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                buttonsStyling: false,
                showCloseButton: true
            }).then(function(result) {
                if (result.value) {
                    window.open(url, '_self');
                }
            });
        }

        initEvents();
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
