@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-9">
        {{-- Start Form --}} 
    @if(isset($department->id))
    <form action="{{route('departments.update',['id'=>$department->id])}}" class="card" method="POST">
        {{method_field('PUT')}}
    @else
    <form action="{{route('departments.store')}}" class="card" method="POST">
    @endif
        @csrf
            @cardHeader
                @slot('card_title') Departments @endslot
            @endcardHeader                
        @cardBody                                               
            @formGroup(['form_label'=>'Department Name'])
                <input type="text" class="form-control" name="name" value="{{old('name',$department->name ?? null)}}">   
            @endformGroup
            @formGroup(['form_label'=>'Department Email'])
                <input type="text" class="form-control" name="code" value="{{old('name',$department->code ?? null)}}">   
            @endformGroup
            @formGroup(['form_label'=>''])
                
                <button type="submit" class="btn btn-md btn-success">
                    @if(isset($department->id))
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