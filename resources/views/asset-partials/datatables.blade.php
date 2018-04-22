@section('datatables-css')
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endsection 
@section('datatables-js')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
@endsection