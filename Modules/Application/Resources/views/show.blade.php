@extends('backend.master') 
@section('content')
<div class="row">
    @isset($ticket)
    @include('ticket::layouts.progress') 
    @endisset
    <div class="col-lg-7 col-md-7">
        @if(isset($ticket->id))
        <form action="{{route('tickets.update',['id'=>$ticket->id])}}" class="" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}} @else
            <form action="{{route('applications.store')}}" class="" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card">
                    <div class="card-header sticky-top" style="background:white">
                        <h3 class="card-title"><i class="fe fe-file-text"></i> {{isset($ticket) ? 'Edit Application':'New Application'}}</h3>
                        <div class="card-options">
    @include('application::components._form-action-buttons')
                        </div>
                    </div>
                    <div class="card-body">
    @include('application::components._applicant-details')
    @include('application::components._travel-information')
    @include('application::components._attachment')
                    </div>
                </div>
    </div>
    <div class="col col-lg-5 col-md-5">
            <div class='card'>
                    <div class='card-header'>
                        <p class='card-title'>Remarks</p>
                    </div>
                    <div class='card-body'>
            @include('application::components._comments')
                    </div>
                </div>
    </div>
</div>
</form>
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
    $('.faculty, .university, .grant').click(function(e){
        $('.acc-no-input').show('fast');
        $('.others-input').hide('fast');
        $('.sponsorship-input').hide('fast'); 
    });
});
$(function(e){
    $('.others').click(function(e){
        $('.others-input').show('fast');
        $('.acc-no-input').hide('fast');        
        $('.sponsorship-input').hide('fast');
    });
});
$(function(e){
    $('.sponsorship').click(function(e){
        $('.sponsorship-input').show('fast');
        $('.acc-no-input').hide('fast');
        $('.others-input').hide('fast');  
    });
});

        $('#datetimepicker1').datetimepicker({
            format: 'L'
        });
        $('#datetimepicker2').datetimepicker({
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