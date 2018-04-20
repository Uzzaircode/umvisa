@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-9">
        {{-- Start Form --}} 
    @if(isset($ticket->id))
    <form action="{{route('tickets.update',['id'=>$ticket->id])}}" class="card" method="POST">
        {{method_field('PUT')}}
    @else
    <form action="{{route('tickets.store')}}" class="card" method="POST">
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
            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{old('body',$ticket->body ?? null)}}</textarea>                  
            @endformGroup
            @formGroup(['form_label'=>'SAP Modules'])            
                    {!! Form::select('sap_id', $saps, isset($ticket) ? $ticket->sap->pluck('id')->toArray()
                    : null, ['class' => 'form-control selectize']) !!} @if ($errors->has('saps'))
                    <p class="help-block">{{ $errors->first('saps') }}</p> @endif            
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