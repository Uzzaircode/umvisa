@extends('backend.master') 
@section('content')
<div class="row">
    @isset($application)
    @include('application::components._progress') 
    @endisset
    <div class="col-lg-7 col-md-7">
        @if(isset($application->id))
        <form action="{{route('applications.update',['id'=>$application->id])}}" class="" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}} 
            @else
            <form action="{{route('applications.store')}}" class="" method="POST" enctype="multipart/form-data">
                @endif
                <div class="card">
                    <div class="card-header sticky-top" style="background:white">
                        <h3 class="card-title"><i class="fe fe-file-text"></i> {{isset($application) ? 'Edit Application':'New Application'}}</h3>
                        <div class="card-options">
                            @include('application::components._form-action-buttons')
                        </div>
                    </div>
                    <div class="card-body">
    @include('application::components._applicant-details')
     
                
                @csrf
                
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
                <p class='card-title'>Remarks</p>
            </div>
            <div class='card-body'>
    @include('application::components._remarks')
            </div>
        </div>
    </div>
</div>

@endsection
 
@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
    @include('asset-partials.datetimepicker.css.file')
    @include('asset-partials.dropzone.css.file')
@endsection
 
@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    @include('asset-partials.datetimepicker.js.file')
    @include('asset-partials.dropzone.js.file')
<script type="text/javascript">
    // Image popups
$('#attachment').magnificPopup({
  delegate: 'a',
  type: 'image',
  removalDelay: 500, //delay removal by X to allow out-animation
  callbacks: {
    beforeOpen: function() {
      // just a hack that adds mfp-anim class to markup 
       this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
       this.st.mainClass = this.st.el.attr('data-effect');
    }
  }
});

$(function(e){
    $('.university').click(function(e){
        $('.acc-no-input').toggle('fast');        
    });
});
$(function(e){
    $('.faculty').click(function(e){
        $('.faculty-acc-no-input').toggle('fast');        
    });
});
$(function(e){
    $('.grant').click(function(e){
        $('.grant-acc-no-input').toggle('fast');        
    });
});
$(function(e){
    $('.others').click(function(e){
        $('.others-input').toggle('fast');        
    });
});
$(function(e){
    $('.sponsorship').click(function(e){
        $('.sponsorship-input').toggle('fast');        
    });
});

        $('#datetimepicker1').datetimepicker({
            @if(isset($application))
                defaultDate: {{$application->start_date->format('m/d/Y')}},
            @endif
            format: 'L'
        });
        $('#datetimepicker2').datetimepicker({
            @if(isset($application))
                defaultDate: {{$application->end_date->format('m/d/Y')}},
            @endif
            useCurrent: false,
            format:'L'
        });
        $("#datetimepicker1").on("change.datetimepicker", function (e) {
            $('#datetimepicker2').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker2").on("change.datetimepicker", function (e) {
            $('#datetimepicker1').datetimepicker('maxDate', e.date);
        });

</script>
@endsection