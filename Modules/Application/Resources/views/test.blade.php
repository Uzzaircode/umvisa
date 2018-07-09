@extends('backend.master') 
@section('content')
@foreach($countries as $c) 
{!! $c !!}@endforeach
<select name="" id="">
        @foreach($countries as $c) 
    <option value="">{!! $c !!} </option>
    
@endforeach
</select>
@endsection
 
@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
@endsection