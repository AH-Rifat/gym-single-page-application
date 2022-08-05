@if (Session::has('success'))
<script type="text/javascript">
    toastr.success("{{ session('success') }}")
</script>
@endif
@if (Session::has('danger'))
<script type="text/javascript">
    toastr.error("{{ session('danger') }}")
</script>
@endif



