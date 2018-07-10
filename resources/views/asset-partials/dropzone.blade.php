@section('page-css')

{{-- <link rel="stylesheet" href="{{asset('vendors/dropzone/dist/min/dropzone.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/dropzone/dist/min/basic.min.css')}}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
<style>
    .dropzone{
        border: 3px dashed #2f66b3;
    }
</style>
@endsection

@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.js"></script>
@endsection