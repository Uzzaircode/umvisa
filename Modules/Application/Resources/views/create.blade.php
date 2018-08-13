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
<script>
    $(function() {
            $( ".from" ).datepicker({
              defaultDate: "+1w",
              dateFormat: '{{config('app.date_format_js')}}',  
              changeMonth: true,
              numberOfMonths: 1,
              minDate:0,
              onClose: function( selectedDate ) {
                $( ".to" ).datepicker( "option", "minDate", selectedDate );
              }
            });
            $( ".to" ).datepicker({
              defaultDate: "+1w",
              dateFormat: '{{config('app.date_format_js')}}',
              changeMonth: true,
              numberOfMonths: 1,
              onClose: function( selectedDate ) {
                $( ".from" ).datepicker( "option", "maxDate", selectedDate );
              }
            });
          });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        var i= 1;

  $('#add-financial').click(function(){  
       i++;  
       $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td>'+i+'</td><td><select name="" id="" class="form-control">@foreach($ins as $n)<option value="">{{$n->name}}</option>@endforeach</select></td><td><input type="text" class="form-control" name="remarks[]"></td><td><a type="button" name="remove" id="'+i+'" class="btn btn-danger remove-financial text-white"><i class="fe fe-trash"></i> Delete</a></td></tr>');  
  });  

  $(document).on('click', '.remove-financial', function(){  
       var button_id = $(this).attr("id");   
       $('#row'+button_id+'').remove();  
  });  

    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        var p= 1;

  $('#add-participant').click(function(){  
       p++;  
       $('#dynamic_field_participant').append('<tr id="row-participant'+p+'" class="dynamic-added"><td>'+p+'</td><td><input type="text" class="form-control" name="matric_nums[]"></td><td><a id="'+p+'" class="btn btn-danger remove-participant text-white"><i class="fe fe-trash"></i> Delete</a></td></tr>');  
  });  

  $(document).on('click', '.remove-participant', function(){  
       var participant_button_id = $(this).attr("id");   
       $('#row-participant'+participant_button_id+'').remove();  
  });  

    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
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

</script>
<script>
    $(function(){
        $('.participants').hide();
       
        $('.num_participants').change(function(){
            var selected_option = $('.num_participants').val();
            
            if(selected_option == 1 || selected_option == 0){
                $('.participants').hide();
            }
            if(selected_option == 2){
                $('.participants').show();
            }
        });
    });
</script>
@endsection