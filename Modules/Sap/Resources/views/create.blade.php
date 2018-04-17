@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-9">
        {{-- Start Form --}} 
        @form(['class'=>'card', 'method'=>'POST', 'action'=>'{{route("saps.store")}}']) 
            @cardHeader
                @slot('card_title') Sap Modules @endslot
            @endcardHeader                
        @cardBody                                               
            @formGroup(['form_label'=>'SAP Module Name'])
                <input type="text" class="form-control" name="name">   
            @endformGroup
            @formGroup(['form_label'=>'SAP Module Codename'])
                <input type="text" class="form-control" name="code">   
            @endformGroup
            @formGroup(['form_label'=>''])
                <button type="submit" class="btn btn-md btn-success">Create</button>  
            @endformGroup
        @endcardBody
        @endform
    </div>
</div>
@endsection