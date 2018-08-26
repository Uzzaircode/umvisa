@extends('backend.master') 
@section('content')
<div class="row">
    @isset($application)
    @include('application::components._progress') @endisset
    <div class="col-lg-7 col-md-7">
        @if(isset($application->id))
        <form action="{{route('applications.update',['id'=>$application->id])}}" class="" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}} @else
            <form action="{{route('applications.store')}}" class="" method="POST" enctype="multipart/form-data">
                @endif
                <div class="card">
                    <div class="card-header sticky-top" style="background:white">
                        <h3 class="card-title"><i class="fe fe-file-text"></i> Edit Application</h3>
                        <div class="card-options">
    @include('application::components._form-action-buttons')
                        </div>
                    </div>
                    <div class="card-body">
    @include('application::components._applicant-details') @csrf
    @include('application::components._travel-information')
    @include('application::components._financial-aid')
    @include('application::components._attachment')

                    </div>
                </div>
    </div>
    </form>
    <div class="col col-lg-5 col-md-5">
        <div class='card'>
            <div class='card-header'>
                <p class='card-title'>Recommendations</p>
            </div>
            <div class='card-body'>
    @include('application::components._remarks')

            </div>
        </div>
    @include('application::components._participants')
    </div>
</div>
@endsection
 
@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @include('asset-partials.dropzone.css.file')
@endsection
 
@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    @include('application::asset-partials.app-form')
    @include('asset-partials.dropzone.js.file')
    @include('asset-partials.selectize')
@endsection