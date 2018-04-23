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
                @slot('card_title') Ticket @endslot
            @endcardHeader                
        @cardBody                                               
            @formGroup(['form_label'=>'Subject'])
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <input type="text" class="form-control" name="subject" value="{{old('subject',$ticket->subject ?? null)}}">   
            @endformGroup
            @formGroup(['form_label'=>'Message'])
            <textarea name="body" id="" cols="30" rows="5" class="form-control">{{old('body',$ticket->body ?? null)}}</textarea>                  
            @endformGroup
            @formGroup(['form_label'=>'Attach Files'])                                
                <input type="file" class="" name="files[]" multiple>
                    @if ($errors->has('files'))
                        <p class="help-block">{{ $errors->first('files') }}</p> 
                    @endif            
            @endformGroup
            @if(isset($ticket))
            @if($ticket->attachments->count() > 1)
                @formGroup(['form_label'=>''])
                    <div class="row gutters-sm" id="attachment">
                        @foreach($ticket->attachments as $t)             
                            <div class="col-6 col-sm-4" >
                        <a href="{{asset($t->path)}}" data-effect="mfp-move-from-top">                  
                            <img src="{{asset($t->path)}}" class="img-fluid"> 
                        </a>                
                            </div>              
                        @endforeach
                    </div>             
                @endformGroup
            @endif
            @endif
            @formGroup(['form_label'=>'Assign To'])
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
                    @if ($errors->has('depts'))
                    <p class="help-block">{{ $errors->first('depts') }}</p> 
                    @endif            
            @endformGroup 
            @formGroup(['form_label'=>'SAP Modules'])
            <select name="sap_id" id="" class="form-control selectize">
                    @foreach($sap_users as $sap)            
                        <option value="{{$sap->id}}"
                            @if(isset($ticket))
                                {{ Auth::user()->saps->id == $sap->id ? 'selected':''}}
                            @endif
                            >{{$sap->name}}</option>
                    @endforeach
            </select>
                    {{-- {!! Form::select('sap_id', $saps, isset($ticket) ? Auth::user()->saps()->pluck('id')->toArray()
                    : null, ['class' => 'form-control selectize']) !!}  --}}
                    @if ($errors->has('saps'))
                    <p class="help-block">{{ $errors->first('saps') }}</p> @endif            
            @endformGroup 
            
            
            @formGroup(['form_label'=>'Ticket Type'])                
                <select name="ticket_type" id="" class="form-control selectize">
                    <option value="new">{{ucwords('new')}}</option>
                    <option value="open">{{ucwords('open')}}</option>
                    <option value="pending">{{ucwords('pending')}}</option>
                    <option value="recurring">{{ucwords('recurring')}}</option>
                </select> 
            @endformGroup
            @formGroup(['form_label'=>''])                
                <button type="submit" class="btn btn-md btn-primary">
                    @if(isset($ticket->id))
                        Update
                    @else
                        Create 
                    @endif
                </button>
            <a href="{{URL::previous()}}" class="btn btn-md btn-secondary">Back</a>  
            @endformGroup
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
    
@endsection()