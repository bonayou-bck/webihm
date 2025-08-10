@extends('app.layouts.master-noside')
@section('title')
    Add a new language content
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('li_2')
            Language content
        @endslot
        @slot('title')
            {{ $mode == 'edit' ? 'Edit language content' : 'Add a new language content' }}
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row">
        <div class="col-lg-12">
            @component('app.language-content.form', [
                'group' => $group,
                'mode' => $mode,
                'dataLang' => $mode == 'edit' ? $dataLang : null
            ])
            @endcomponent
            @stack('script-lc-form')
        </div>
    </div>
    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
