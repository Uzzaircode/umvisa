@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-9">
        @card
            @cardHeader
                @slot('card_title') Create Users @endslot
            @endcardHeader
            @cardBody
                {!! Form::open(['route' => ['users.store'] ]) !!}
                    @include('backend.users._form')
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
    <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a> 
                {!! Form::close() !!}
            @endcardBody
        @endcard
    </div>
    </div>
@endsection