@extends('backend.master')
@section('content')
<div class="row">
    @isset($application)
    @include('application::components._progress') @endisset
    <div class="col-lg-12 col-md-12">
        @if(isset($application->id))
        <form action="{{route('applications.update',['id'=>$application->id])}}" class="" method="POST" enctype="multipart/form-data"
            data-toggle="validator" role="form">
            {{method_field('PUT')}} @else
            <form action="{{route('applications.store')}}" role="form" class="" method="POST" enctype="multipart/form-data"
                data-toggle="validator">
                @endif @csrf
                <div class="card">
                    <div class="card-header" style="background:white">
                        <h3 class="card-title"><i class="fe fe-file-text"></i> {{isset($application) ? 'Edit
                            Application':'New Application'}}</h3>
                        <div class="card-options" id="">
                            @include('application::components._form-action-buttons')
                        </div>
                    </div>
                    <div class="card-body m-5">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                                    data-target="#profile">
                                    <i class="fe fe-user"></i> View My Profile
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <p class="help-block">Please fill in the form below accordingly. Field with asterisk (<span
                                        class="text-danger">*</span>) sign is compulsory.</p>
                            </div>
                        </div>
                        @include('application::components._application-type')
                        @include('application::components._participants')
                        @include('application::components._supervisor')
                        @include('application::components._college-fellow')
                        @include('application::components._travel-information')
                        @include('application::components._financial-aid')

                    </div>
                </div>
    </div>
</div>

</form>
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profile" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">My Profile</h5>
                <i class="fe fe-close" aria-hidden="true" data-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                @include('application::components._applicant-details')
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@include('asset-partials.dropzone.css.file')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/select2.bootstrap4.min.css')}}">

<style>
    .participants {
        display: none;
    }
</style>
@endsection

@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
@include('application::asset-partials.app-form')
@include('asset-partials.dropzone.js.file')
@include('asset-partials.selectize')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('.supervisor').select2({
        placeholder: 'Please Select',
        theme: 'bootstrap4',
        ajax: {
            url: "{{route('load.supervisor')}}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id,

                        }
                    })
                };
            },
            cache: true,
            allowClear: true
        }
    });
    $('.college_fellow').select2({
        placeholder: 'Please Select',
        theme: 'bootstrap4',
        ajax: {
            url: '/applications/college_fellow/search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.email,
                            id: item.email,

                        }
                    })
                };
            },
            cache: true,
            allowClear: true
        }
    });
</script>
<script>
    function changeplh() {
        var sel = document.getElementById("financial-aid-selector");
        var textbx = document.getElementById("financial-aid-placeholder");
        var indexe = sel.selectedIndex;

        if (indexe == 1) {
            $("#financial-aid-placeholder").attr("placeholder", "Account Number");

        }
        if (indexe == 2) {
            $("#financial-aid-placeholder").attr("placeholder", "Account Number");
        }
        if (indexe == 3) {
            $("#financial-aid-placeholder").attr("placeholder", "Account Number");
        }
        if (indexe == 4) {
            $("#financial-aid-placeholder").attr("placeholder", "Name of Sponsor");
        }
        if (indexe == 5) {
            $("#financial-aid-placeholder").attr("placeholder", "Please specify");
        }
    }
</script>
@endsection