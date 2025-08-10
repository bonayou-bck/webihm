@extends('app.layouts.master')
@section('title')
    Manage video
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://vjs.zencdn.net/8.5.2/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('build/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('build/libs/filepond-plugin-media-preview/filepond-plugin-media-preview.min.css') }}">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('title')
            Manage video
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        <div class="col-lg-12">
            @if (session('status-home-slide'))
                <div class="alert {{ session('status-home-slide')['code'] == 200 ? 'alert-success' : 'alert-danger' }} alert-dismissible alert-label-icon rounded-label fade show"
                    role="alert">
                    <i
                        class="{{ session('status-home-slide')['code'] == 200 ? 'ri-checkbox-circle-line' : 'ri-error-warning-line' }} label-icon"></i><strong>{{ session('status-home-slide')['code'] == 200 ? 'Success' : 'Failed' }}</strong>
                    -
                    @if (session('status-home-slide')['type'] == 'add')
                        {{ session('status-home-slide')['all'] ? 'Image uploaded' : 'But some image failed to upload' }}
                    @endif

                    @if (session('status-home-slide')['type'] == 'delete')
                        Image deleted
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @component('app.image-video.video.livein', ['slideData' => $slideData])
            @endcomponent

            @component('app.image-video.video.career', ['slideData' => $slideData])
            @endcomponent

        </div>

    </div>
    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://vjs.zencdn.net/8.5.2/video.min.js"></script>
    
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="{{ URL::asset('build/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('build/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('build/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ URL::asset('build/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/filepond-plugin-media-preview/filepond-plugin-media-preview.min.js') }}"></script>

    @component('app.layouts.init-filepond')
    @endcomponent

    <script>
        var filepondInput = document.querySelectorAll('input.filepond');
        if (filepondInput) {

            // loop over input elements
            Array.from(filepondInput).forEach(function(inputElement) {
                // create a FilePond instance at the input element location
                FilePond.create(inputElement);
            })

            FilePond.create(
                document.querySelector('.filepond-input-circle'), {
                    labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
                    imagePreviewHeight: 170,
                    imageCropAspectRatio: '1:1',
                    imageResizeTargetWidth: 200,
                    imageResizeTargetHeight: 200,
                    stylePanelLayout: 'compact circle',
                    styleLoadIndicatorPosition: 'center bottom',
                    styleProgressIndicatorPosition: 'right bottom',
                    styleButtonRemoveItemPosition: 'left bottom',
                    styleButtonProcessItemPosition: 'right bottom',
                }
            );
        }

        function clearFilepond() {
            if(filepondInput) {
                Array.from(filepondInput).forEach(function(inputElement) {
                    // create a FilePond instance at the input element location
                    var f = FilePond.find(inputElement).removeFiles();
                })
            }
        }
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @stack('livein-script')
    @stack('career-script')
@endsection
