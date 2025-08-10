@extends('app.layouts.master')
@section('title')
    Manage slides
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
            Manage slides
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

            @component('app.image-video.slide.home', ['slideData' => $slideData])
            @endcomponent
            @stack('home-script')

            @component('app.image-video.slide.sustainability-1', ['slideData' => $slideData])
            @endcomponent
            @stack('sustainability-1-script')
            @component('app.image-video.slide.sustainability-2', ['slideData' => $slideData])
            @endcomponent
            @stack('sustainability-2-script')
            {{-- @component('app.image-video.slide.sustainability-3', ['slideData' => $slideData])
            @endcomponent
            @stack('sustainability-3-script') --}}
            @component('app.image-video.slide.sustainability-4', ['slideData' => $slideData])
            @endcomponent
            @stack('sustainability-4-script')
        </div>

    </div>
    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
