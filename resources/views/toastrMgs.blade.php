@if (Session::has('success'))
<script>
    toastr.success("{{ session('success') }}")
</script>
@endif
@if (Session::has('danger'))
<script>
    toastr.error("{{ session('danger') }}")
</script>
@endif
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "500",
        "hideDuration": "3000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
