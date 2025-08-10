@extends('app.layouts.master-noside')
@section('title')
    Add a new certificate
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('build/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <style>
        /* .filepond--item {
            width: calc(50% - 0.5em);
        } */
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('li_2')
            Certificate
        @endslot
        @slot('title')
            Add a new certificate
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        {{-- no, img, title (hover to switch en), categories, status, date --}}
        {{-- no, logo, img, name (hover to switch en), status, updated at --}}
        <div class="col-lg-12">
            @component('app.certificate.certificate-form', [
                'dataCertificate' => $mode == 'edit' ? $dataCertificate : [],
                'mode' => $mode
            ])
            @endcomponent
            @stack('script-certificate-form')
        </div>
    </div>
    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
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
    {{-- upload init --}}

    <script>
        // FilePond
        FilePond.registerPlugin(
            // encodes the file as base64 data
            FilePondPluginFileEncode,
            // validates the size of the file
            FilePondPluginFileValidateSize,
            // corrects mobile image orientation
            FilePondPluginImageExifOrientation,
            // previews dropped images
            FilePondPluginImagePreview
        );

        var inputMultipleElements = document.querySelectorAll('input.filepond-input-multiple');
        if (inputMultipleElements) {

            // loop over input elements
            Array.from(inputMultipleElements).forEach(function(inputElement) {
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
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
