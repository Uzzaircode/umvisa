@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-9">
        {{-- Start Form --}} 
    @if(isset($sap->id))
    <form action="{{route('saps.update',['id'=>$sap->id])}}" class="card" method="POST">
        {{method_field('PUT')}}
    @else
    <form action="{{route('saps.store')}}" class="card" method="POST">
    @endif
        @csrf
            @cardHeader
                @slot('card_title') Sap Modules @endslot
            @endcardHeader                
        @cardBody                                               
            @formGroup(['form_label'=>'SAP Module Name'])
                <input type="text" class="form-control" name="name" value="{{old('name',$sap->name ?? null)}}">   
            @endformGroup
            @formGroup(['form_label'=>'SAP Module Codename'])
                <input type="text" class="form-control" name="code" value="{{old('name',$sap->code ?? null)}}">   
            @endformGroup
            @formGroup(['form_label'=>''])
                
                <button type="submit" class="btn btn-md btn-success">
                    @if(isset($sap->id))
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