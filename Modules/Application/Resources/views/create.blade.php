@extends('backend.master') 
@section('content')
<div class="row">
    @isset($ticket)
    @include('ticket::layouts.progress') @endisset
    <div class="col-lg-12 col-md-12">
        {{-- Start Form --}} @if(isset($ticket->id)) {{-- Edit Form --}}
        <form action="{{route('tickets.update',['id'=>$ticket->id])}}" class="" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}} @else {{-- Store Form --}}
            <form action="{{route('tickets.store')}}" class="" method="POST" enctype="multipart/form-data">
                @endif @csrf
                <div class="card">
                    @cardHeader {{-- Card Header --}} @slot('card_title')
                    <i class="fe fe-tag"></i> {{isset($ticket) ? 'Edit Application':'New Application'}} @endslot {{-- Card
                    Options --}}
                    <div class="card-options">

                    </div>
                    @endcardHeader @cardBody
                    <p class="lead ">Applicant Details</p>
    @include('application::components._applicant-details')
                    <hr>
                    <p class="lead ">Travel Information</p>
    @include('application::components._travel-information')
                    <hr>
                    <p class="lead ">Attachments</p>
    @include('application::components._attachment')

                    <div class="form-group">
                        <button class="btn btn-md btn-primary" name="submit_hod"><i class="fe fe-send"></i> {{isset($ticket) ? 'Submit':'Submit'}}</button>

                        <button class="btn btn-md btn-secondary" name="draft"><i class="fe fe-save"></i> {{isset($ticket) ? 'Update Draft':'Save As Draft'}}</button>

                        <a href="{{route('tickets.index')}}" class="btn btn-md btn-secondary">Back</a>
                    </div>
                    @endcardBody
                </div>
    </div>

</div>
</form>
@endsection

    @include('asset-partials.selectize') 
@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
@endsection
 
@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
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
    });
});
$(function(e){
    $('#others').click(function(e){
        $('.acc-no-input').hide('fast');  
    });
});
$(function(e){
    $('#sponsorship').click(function(e){
        $('.acc-no-input').hide('fast');  
    });
});


// $(function(e){
//     $('.university').click(function(e){
//         $('.acc-no-input').show('fast');      
//     });
// });

// $(function(e){
//     $('.grant').click(function(e){
//         $('.acc-no-input').show('fast');     
//     });
// });


</script>
@endsection