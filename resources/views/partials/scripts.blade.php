<!-- Core JS -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}" data-no-sourcemap></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}" data-no-sourcemap></script>

<!-- Plugins -->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<!-- WYSIWYG: Summernote (lite) -->
<script src="{{ asset('assets/js/plugin/summernote/summernote-lite.min.js') }}"></script>

<!-- Kaiadmin -->
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>


@stack('scripts')
