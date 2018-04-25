@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-8">
        {{-- Start Form --}} 
    @if(isset($ticket->id))
    <form action="{{route('tickets.update',['id'=>$ticket->id])}}" class="card" method="POST" enctype="multipart/form-data">
        {{method_field('PUT')}}
    @else
    <form action="{{route('tickets.store')}}" class="card" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
            @cardHeader
    @slot('card_title')<i class="fe fe-tag"></i> {{isset($ticket) ? 'Edit Ticket':'New Ticket'}}  
    @endslot
    <div class="card-options">           
    <button class="btn btn-sm btn-primary"># {{isset($ticket) ? $ticket->ticket_number:$ticket_rn}}
    </button>       
    </div>
            @endcardHeader                
        @cardBody                                           
        <div class="form-group"  @if ($errors->has('subject')) has-error @endif>
                <label for="" class="form-label">Subject</label>
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                @if(!isset($ticket))
                <input type="hidden" name="ticket_number" value="{{isset($ticket) ? $ticket->ticket_number:$ticket_rn}}">
                @endif
                <input type="text" class="form-control" name="subject" value="{{old('subject',$ticket->subject ?? null)}}" readonly>
                @if ($errors->has('subject'))
                        <p class="text-danger">{{ $errors->first('subject') }}</p> 
                    @endif   
        </div>
            <div class="form-group"  @if ($errors->has('body')) has-error @endif>
                    <label for="" class="form-label">Issue</label>
            <textarea name="body" id="" cols="30" rows="5" class="form-control" readonly>{{old('body',$ticket->body ?? null)}}</textarea> 
            @if ($errors->has('body'))
                        <p class="text-danger">{{ $errors->first('body') }}</p> 
                    @endif                 
            </div>
            <div class="form-group"  @if ($errors->has('name')) has-error @endif>
                    <label for="" class="form-label">Attachments</label>
                <input type="file" class="" name="files[]" multiple disabled>
                    @if ($errors->has('files'))
                        <p class="text-danger">{{ $errors->first('files') }}</p> 
                    @endif            
            </div>
            @if(isset($ticket))
            @if($ticket->attachments->count() > 1)
                <div class="form-group">
                    <label for="" class="form-label">Attached Files</label>
                    <div class="row gutters-sm" id="attachment">
                        @foreach($ticket->attachments as $t)             
                            <div class="col-6 col-sm-4" >
                        <a href="{{asset($t->path)}}" data-effect="mfp-move-from-top">                  
                            <img src="{{asset($t->path)}}" class="img-fluid"> 
                        </a>                
                            </div>              
                        @endforeach
                    </div>             
                </div>
            @endif
            @endif
            <div class="form-group"  @if ($errors->has('dept_id')) has-error @endif>
                    <label for="" class="form-label">Department</label>
            <select name="dept_id" id="" class="form-control selectize" placeholder="Select department" disabled>
                    @foreach($depts as $dept)                                    
                        <option value="{{$dept->id}}" 
                                @if(isset($ticket))
                                     {{$ticket->dept_id == $dept->id ? 'selected':'' }}    
                                @endif
                        >
                            {{$dept->name}}
                        </option>
                    @endforeach            
            </select>                                               
                    @if ($errors->has('dept_id'))
                    <p class="text-danger">{{ $errors->first('dept_id') }}</p> 
                    @endif            
            </div>
            <div class="form-group"  @if ($errors->has('sap_id')) has-error @endif>
                    <label for="" class="form-label">SAP Modules</label>
            <select name="sap_id" id="" class="form-control selectize" disabled>
                @foreach($sap_users as $sap)
            <option value="{{$sap->id}}"
                @if(isset($ticket))
                    {{$ticket->sap->id == $sap->id ? 'selected':''}}
                @endif                
                >{{$sap->name}}</option>
                @endforeach                    
            </select>                    
                    @if ($errors->has('saps'))
                    <p class="text-danger">{{ $errors->first('saps') }}</p> @endif            
            </div>
            <div class="form-group">                 
                <label for="" class="form-label">Integration with another application?</label>
                <select name="sap_integration" id="" onchange="showDiv(this)" class="form-control selectize" placeholder="Please select" disabled>
                        <option value="">Please Select</option>
                <option value="1" {{isset($ticket) && $ticket->integration == 1 ? 'selected':''}}>Yes</option>
                        <option value="0" {{isset($ticket) && $ticket->integration == 0 ? 'selected':''}}>No</option>
                    </select>
              </div> 
             
            <div class="form-group"  @if ($errors->has('application_id')) has-error @endif>
                    <label for="" class="form-label">Applications</label>

                <select name="application_id" id="app_id" class="form-control selectize" placeholder="Select the application">
                    @foreach($apps as $app) 
                <option value="{{$app->id}}" {{isset($ticket) && $ticket->application_id == $app->id ? 'selected':''}}>{{$app->name}}</option> 
                    @endforeach 
                </select>
                @if ($errors->has('application_id'))
                        <p class="text-danger">{{ $errors->first('application_id') }}</p> 
                @endif                 
            </div>
            
            <div class="form-group"  @if ($errors->has('ticket_type')) has-error @endif>
                    <label for="" class="form-label">Ticket Type</label>
                <select name="ticket_type" id="" class="form-control selectize" onchange="showRecurring(this)" disabled>
                <option value="new" {{isset($ticket) && $ticket->ticket_type == 'new' ? 'selected':''}}>{{ucwords('new')}}</option>
                    <option value="open" {{isset($ticket) && $ticket->ticket_type == 'open' ? 'selected':''}}>{{ucwords('open')}}</option>
                    <option value="pending" {{isset($ticket) && $ticket->ticket_type == 'pending' ? 'selected':''}}>{{ucwords('pending')}}</option>
                    <option value="recurring" {{isset($ticket) && $ticket->ticket_type == 'recurring' ? 'selected':''}}>{{ucwords('recurring')}}</option>
                </select>
                @if ($errors->has('ticket_type'))
                        <p class="text-danger">{{ $errors->first('ticket_type') }}</p> 
                @endif 
            </div>
            <div id="old_ticket" class="form-group">
                <label for="" class="form-label">Which Ticket as recurring issue?</label>
                <select name="recurring_ticket_id" id="" class="form-control selectize">
                @foreach($user_tickets as $t)
                <option value="{{$t->id}}" {{isset($ticket) && $t->id == $ticket->recurring_ticket_id ? 'selected':''}}>{{$t->subject}}</option>
                @endforeach
                </select>
            </div>            
        @endcardBody
    </form>
    </div>
    <div class="col-md-4">
          @can('add_replies')  
            @include('ticket::reply')
          @endcan
    </div>
</div>
@endsection
@include('asset-partials.selectize')
@section('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
<style>
.mfp-move-from-top {
  /* start state */
  /* animate in */
  /* animate out */
}
.mfp-move-from-top .mfp-content {
  vertical-align: top;
}
.mfp-move-from-top .mfp-with-anim {
  opacity: 0;
  transition: all 0.2s;
  transform: translateY(-100px);
}
.mfp-move-from-top.mfp-bg {
  opacity: 0;
  transition: all 0.2s;
}
.mfp-move-from-top.mfp-ready .mfp-with-anim {
  opacity: 1;
  transform: translateY(0);
}
.mfp-move-from-top.mfp-ready.mfp-bg {
  opacity: 0.8;
}
.mfp-move-from-top.mfp-removing .mfp-with-anim {
  transform: translateY(-50px);
  opacity: 0;
}
.mfp-move-from-top.mfp-removing.mfp-bg {
  opacity: 0;
}

</style>
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
</script> 
{{-- <script type="text/javascript"> 

$(document).ready(function(){
    @if(isset($ticket) && $ticket->integration == 1)
    $('#app_id')[0].selectize.enable();
    @else
    $('#app_id')[0].selectize.disable();
    @endif
});

    $(document).on('change', '#app_check', function(){ 
      if($(this).prop('checked')){ 
          $(this).attr('value', 1);
          $('#app_id')[0].selectize.enable(); 
           
      } else { 
        $(this).attr('value', 0);
        $('#app_id')[0].selectize.disable();  
      } 
  }); 
  </script>     --}}
  <script type="text/javascript">
  $(document).ready(function(){
    $('#app_id')[0].selectize.disable();
    @if(isset($ticket) && !empty($ticket->recurring_ticket_id))
        $('#old_ticket').show();
    @else
        $('#old_ticket').hide();
    @endif    
  });
  </script>
  <script type="text/javascript">
    function showDiv(elem){
   if(elem.value == 1){
    $('#app_id')[0].selectize.enable();
    }else{
  $('#app_id')[0].selectize.disable();
}
}
function showRecurring(elem){
    if(elem.value == 'recurring'){
        $('#old_ticket').show();
    }else{
        $('#old_ticket').hide();
    }
}
</script>
@endsection