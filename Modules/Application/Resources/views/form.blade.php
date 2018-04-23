@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-9">
        {{-- Start Form --}} 
    @if(isset($application->id))
    <form action="{{route('applications.update',['id'=>$application->id])}}" class="card" method="POST">
        {{method_field('PUT')}}
    @else
    <form action="{{route('applications.store')}}" class="card" method="POST">
    @endif
        @csrf
            @cardHeader
                @slot('card_title') Applications @endslot
            @endcardHeader                
        @cardBody                                               
            @formGroup(['form_label'=>'Application Name'])
                <input type="text" class="form-control" name="name" value="{{old('name',$application->name ?? null)}}">   
            @endformGroup           
            @formGroup(['form_label'=>''])
                
                <button type="submit" class="btn btn-md btn-success">
                    @if(isset($application->id))
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