@extends('backend.master') 
@section('content')
<div class="row">
    @isset($application)
    @include('application::components._progress') @endisset
    <div class="col-lg-12 col-md-12">
        @if(isset($application->id))
        <form action="{{route('applications.update',['id'=>$application->id])}}" class="" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}} @else
            <form action="{{route('applications.store')}}" class="" method="POST" enctype="multipart/form-data">
                @endif @csrf
                <div class="card">
                    <div class="card-header sticky-top" style="background:white">
                        <h3 class="card-title"><i class="fe fe-file-text"></i> {{isset($application) ? 'Edit Application':'New Application'}}</h3>
                        <div class="card-options">
    @include('application::components._form-action-buttons')
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="rootwizard">
                            <div class="container">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#app-type" data-toggle="tab" class="nav-link">Application Type</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#personal-detail" data-toggle="tab" class="nav-link">Personal Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#travel-info" data-toggle="tab" class="nav-link">Travel Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#attachment" data-toggle="tab" class="nav-link">Attachment</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- fieldsets -->
                            <div id="app-type">
    @include('application::components._applicant-details')
                            </div>
                            <div id="personal-detail">
    @include('application::components._travel-information')
                            </div>
                            <div id="travel-info">
    @include('application::components._financial-aid')
                            </div>
                            <div id="attachment">
    @include('application::components._attachment')
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
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
    @include('application::components._participants')
    </div>
</div>

</form>
@endsection
 
@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @include('asset-partials.dropzone.css.file')
<link rel="stylesheet" href="{{asset('vendors/smartwizard/css/smart_wizard.min.css')}}">
@endsection
 
@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    @include('application::asset-partials.app-form')
    @include('asset-partials.dropzone.js.file')
    @include('asset-partials.selectize')
<script src="{{asset('vendors/smartwizard/js/jquery.smartWizard.js')}}"></script>
<script>
    ($).function() {
  	$('#rootwizard').bootstrapWizard();
});

</script>
@endsection