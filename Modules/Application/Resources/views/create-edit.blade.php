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
                        <div class="card-options" id="smartwizard-controls">
    @include('application::components._form-action-buttons')
                        </div>
                    </div>
                    <div class="card-body">  
                            <div id="smartwizard">
                                    <ul>
                                        <li><a href="#step-1">Application Type<br /><small></small></a></li>
                                        <li><a href="#step-2">Personal Detail<br /><small></small></a></li>
                                        <li><a href="#step-3">Travel Information<br /><small></small></a></li>
                                        <li><a href="#step-4">Financial Aid<br /><small></small></a></li>
                                    </ul>
            
                                    <div>
                                        <div id="step-1" class="">
                                                @include('application::components._application-type')
                                        </div>
                                        <div id="step-2" class="">
                                                @include('application::components._travel-information')
                                        </div>
                                        <div id="step-3" class="">
                                                @include('application::components._financial-aid')
                                        </div>
                                        <div id="step-4" class="">
                                                @include('application::components._attachment')
                                        </div>
                                    </div>
                                </div>                      
                        <!-- fieldsets -->
   
    
   
    


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
    <link rel="stylesheet" href="{{asset('vendors/smartwizard/css/smart_wizard.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/smartwizard/css/smart_wizard_theme_arrows.min.css')}}">
    <style>
    .nav-tabs{
        margin:0 !important;
    }
    .nav-item{
        padding:0 !important;
    }
    .sw-theme-arrows>ul.step-anchor>li.active>a {
    border-color: #2f66b3!important;
    color: #fff!important;
    background: #2f66b3 !important;
}
.sw-theme-arrows>ul.step-anchor>li.active>a:after {
    border-left: 30px solid #2f66b3!important;
}
.sw-theme-arrows>ul.step-anchor>li.done>a {
    border-color: #3c8af7!important;
    color: #fff!important;
    background:#3c8af7!important;
}
.sw-theme-arrows>ul.step-anchor>li.done>a:after {
    border-left: 30px solid #3c8af7;
}
    </style>
@endsection
 
@section('page-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    @include('application::asset-partials.app-form')
    @include('asset-partials.dropzone.js.file')
    @include('asset-partials.selectize')
    <script src="{{asset('vendors/smartwizard/js/jquery.smartWizard.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        // Step show event
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
           //alert("You are on step "+stepNumber+" now");
           if(stepPosition === 'first'){
               $("#prev-btn").addClass('disabled');
           }else if(stepPosition === 'final'){
               $("#next-btn").addClass('disabled');
           }else{
               $("#prev-btn").removeClass('disabled');
               $("#next-btn").removeClass('disabled');
           }
        });


        // Smart Wizard
        $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                transitionEffect:'fade',
                showStepURLhash: true,  
                toolbarSettings:{
                    showNextButton: false,
                    showPreviousButton:false,
                },
                autoAdjustHeight:false,

        });       

        $("#prev-btn").on("click", function() {
            // Navigate previous
            $('#smartwizard').smartWizard("prev");
            return true;          
        });

        $("#next-btn").on("click", function() {
            // Navigate next
            $('#smartwizard').smartWizard("next");  
            return true;         
        });       
    });

    </script>
@endsection