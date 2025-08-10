<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    data-layout="horizontal" data-sidebar-visibility="show" 
    data-topbar="light" data-sidebar="light" data-sidebar-size="lg" 
    data-sidebar-image="none" data-preloader="disable" 
    data-layout-position="scrollable" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | IHM Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="dev@IHM" name="author" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.png')}}">
    @include('app.layouts.head-css')
</head>

@section('body')
    @include('app.layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('app.layouts.topbar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('app.layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    {{-- @include('layouts.customizer') --}}

    <!-- JAVASCRIPT -->
    @include('app.layouts.vendor-scripts')
</body>

</html>
