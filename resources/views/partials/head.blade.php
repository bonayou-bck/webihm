<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>@yield('title', 'Dashboard Admin')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

<link rel="icon" href="{{ asset('assets/admin/img/favicon.ico') }}" type="image/x-icon" />

<!-- Fonts & Icons -->
<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
  WebFont.load({
    google: { families: ["Public Sans:300,400,500,600,700"] },
    custom: {
      families: ["Font Awesome 5 Solid","Font Awesome 5 Regular","Font Awesome 5 Brands","simple-line-icons"],
      urls: ["{{ asset('assets/admin/css/fonts.min.css') }}"],
    },
    active: function () { sessionStorage.fonts = true; },
  });
</script>

<!-- CSS Admin -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}?v={{ @filemtime(public_path('assets/admin/css/bootstrap.min.css')) }}" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/plugins.min.css') }}?v={{ @filemtime(public_path('assets/admin/css/plugins.min.css')) }}" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/kaiadmin.min.css') }}?v={{ @filemtime(public_path('assets/admin/css/kaiadmin.min.css')) }}" />
{{-- Hapus di production jika tak perlu --}}
<link rel="stylesheet" href="{{ asset('assets/admin/css/demo.css') }}?v={{ @filemtime(public_path('assets/admin/css/demo.css')) }}" />

@stack('styles')
