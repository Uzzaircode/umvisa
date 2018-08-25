{{-- Travel Date picker --}}
<script type="text/javascript">
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
{{-- Financial Aid Dynamic Form --}}
<script type="text/javascript">
    $(document).ready(function(){
        var f= 1;

  $('#add-financial').click(function(){  
       f++;  
       $('#dynamic_field').append('<tr id="row-financial'+f+'" class="dynamic-added"><td>'+f+'</td><td><select name="" id="" class="form-control selectize">@foreach($ins as $n)<option value="{{$n->name}}">{{$n->name}}</option>@endforeach</select></td><td><input type="text" class="form-control" name="remarks[]"></td><td><a type="button" name="remove" id="'+f+'" class="btn btn-danger remove-financial text-white"><i class="fe fe-trash"></i> Delete</a></td></tr>');  
  });  

  $(document).on('click', '.remove-financial', function(){  
       var financial_button_id = $(this).attr("id");   
       $('#row-financial'+financial_button_id+'').remove();  
  });  

    });

</script>
{{-- Participant Dynamic Form --}}
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
{{-- Attachment Pop Up --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>   
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
{{-- Participants Panel Hide & Show Function --}}
<script type="text/javascript">
    $(function(){                        
              
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