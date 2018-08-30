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
            <form action="{{route('applications.store')}}" role="form" class="" method="POST" enctype="multipart/form-data" data-toggle="validator">
                @endif @csrf
                <div class="card">
                    <div class="card-header sticky-top" style="background:white">
                        <h3 class="card-title"><i class="fe fe-file-text"></i> {{isset($application) ? 'Edit Application':'New Application'}}</h3>
                        <div class="card-options" id="smartwizard-controls">
    @include('application::components._form-action-buttons')
                        </div>
                    </div>
                    <div class="card-body m-5">
                        <div class="row">
    @include('application::components._application-type')
                        </div>
                        <div class="row">
    @include('application::components._travel-information')
                        </div>
                        <div class="row participants">
    @include('application::components._participants')
                        </div>
    @include('application::components._financial-aid')
    @include('application::components._attachment')

                    </div>
                </div>
    </div>
</div>
</div>

{{--
<div class="row">
    <div class="col col-lg-12 col-md-12">
        <div class='card'>
            <div class='card-header'>
                <p class='card-title'>Recommendations</p>
            </div>
            <div class='card-body'>
    @include('application::components._remarks')
            </div>
        </div>

    </div>
</div> --}}

</form>
@endsection
 
@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @include('asset-partials.dropzone.css.file')
    <style>
    .participants{
        display: none;
    }
    </style>
@endsection
 
@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    @include('application::asset-partials.app-form')
    @include('asset-partials.dropzone.js.file')
    @include('asset-partials.selectize')
    <script>
        
    </script>
@endsection