@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-9">
        {{-- Start Form --}} 
    @if(isset($ticket->id))
    <form action="{{route('tickets.update',['id'=>$ticket->id])}}" class="card" method="POST" enctype="multipart/form-data">
        {{method_field('PUT')}}
    @else
    <form action="{{route('tickets.store')}}" class="card" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
            @cardHeader
                @slot('card_title')<i class="fe fe-tag"></i> Ticket @endslot
            @endcardHeader                
        @cardBody                                               
        <div class="form-group"  @if ($errors->has('subject')) has-error @endif>
                <label for="" class="form-label">Subject</label>
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <input type="text" class="form-control" name="subject" value="{{old('subject',$ticket->subject ?? null)}}">
                @if ($errors->has('subject'))
                        <p class="text-danger">{{ $errors->first('subject') }}</p> 
                    @endif   
        </div>
            <div class="form-group"  @if ($errors->has('body')) has-error @endif>
                    <label for="" class="form-label">Issue</label>
            <textarea name="body" id="" cols="30" rows="5" class="form-control">{{old('body',$ticket->body ?? null)}}</textarea> 
            @if ($errors->has('body'))
                        <p class="text-danger">{{ $errors->first('body') }}</p> 
                    @endif                 
            </div>
            <div class="form-group"  @if ($errors->has('name')) has-error @endif>
                    <label for="" class="form-label"></label>
                <input type="file" class="" name="files[]" multiple>
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
            <select name="dept_id" id="" class="form-control selectize">
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
            <select name="sap_id" id="" class="form-control selectize">
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
                <label class="custom-switch"> 
                <input name="custom-switch-checkbox" class="custom-switch-input" name="integration" type="checkbox" id="app_check" value="1" {{isset($ticket) && $ticket->integration == 1 ? 'checked="checked"':''}}> 
                  <span class="custom-switch-indicator"></span> 
                  <span class="custom-switch-description">Integration with third-party application?</span> 
                </label> 
              </div> 
             
            <div class="form-group"  @if ($errors->has('application_id')) has-error @endif>
                    <label for="" class="form-label">Applications</label>
                <select name="application_id" id="app_id" class="form-control selectize"> 
                    @foreach($apps as $app) 
                        <option value="{{$app->id}}">{{$app->name}}</option> 
                    @endforeach 
                </select>
                @if ($errors->has('application_id'))
                        <p class="text-danger">{{ $errors->first('application_id') }}</p> 
                    @endif                 
            </div>
            
            <div class="form-group"  @if ($errors->has('ticket_type')) has-error @endif>
                    <label for="" class="form-label"></label>
                <select name="ticket_type" id="" class="form-control selectize">
                    <option value="new">{{ucwords('new')}}</option>
                    <option value="open">{{ucwords('open')}}</option>
                    <option value="pending">{{ucwords('pending')}}</option>
                    <option value="recurring">{{ucwords('recurring')}}</option>
                </select>
                @if ($errors->has('ticket_type'))
                        <p class="text-danger">{{ $errors->first('ticket_type') }}</p> 
                    @endif 
            </div>
            <div class="form-group"  @if ($errors->has('name')) has-error @endif>
                <button type="submit" class="btn btn-md btn-primary">
                    @if(isset($ticket->id))
                        Update
                    @else
                        Create 
                    @endif
                </button>
            <a href="{{URL::previous()}}" class="btn btn-md btn-secondary">Back</a>  
            </div>
        @endcardBody
    </form>
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
<script type="text/javascript"> 

$(document).ready(function(){
    $('#app_id')[0].selectize.disable();
});

    $(document).on('change', '#app_check', function(){ 
      if($(this).prop('checked')){ 
          $('#app_id')[0].selectize.enable(); 
           
      } else { 
          $('#app_id')[0].selectize.disable();  
      } 
  }); 
  </script>    
@endsection