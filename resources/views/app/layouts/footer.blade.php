<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © PT ITCI Hutani Manunggal.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    <small>
                        Version {{ env('APP_VERSION') }}-{{ env('APP_REV') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</footer>
