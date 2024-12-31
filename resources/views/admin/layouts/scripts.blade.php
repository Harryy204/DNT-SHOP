<script src="/assets/admin/js/jquery.min.js"></script>
<script src="/assets/admin/js/bootstrap.min.js"></script>
<script src="/assets/admin/js/bootstrap-select.min.js"></script>
<script src="/assets/admin/js/sweetalert.min.js"></script>
<script src="/assets/admin/js/apexcharts/apexcharts.js"></script>
<script src="/assets/admin/js/main.js"></script>
<script src="/assets/admin/ckeditor/ckeditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>
    CKEDITOR.replace('content', {
        width: '100%',
    });
</script>

<!-- alert -->
<script>
    var notyf = new Notyf({
        duration: 5000, // Thông báo tồn tại trong 7 giây
        position: {
            x: 'right',
            y: 'top',
        },
        dismissible: true
    });
    @if(session('success'))
    notyf.success("{{ session('success') }}");
    @endif
    @if(session('error'))
    notyf.error("{{ session('error') }}");
    @endif
</script>