@extends('app.layouts.master-noside')
@section('title')
    Add new blog post
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('li_2')
            Blog
        @endslot
        @slot('title')
            {{ $mode == 'edit' ? 'Edit blog post' : 'Add new blog post' }}
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        <div class="col-lg-12">
            @php
                $params = ['dataCategory' => $dataCategory, 'mode' => $mode, 'dataStatus' => $dataStatus];

                if($mode == 'edit') {
                    $params['dataBlog'] = $dataBlog;
                }
            @endphp

            @component('app.blog.form', $params)
            @endcomponent
            @stack('script-blog-form')
        </div>
    </div>
    {{-- end of content --}}

@endsection
@section('script')
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

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
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
