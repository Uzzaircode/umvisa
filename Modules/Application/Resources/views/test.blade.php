@extends('backend.master') 
@section('content')
<select name="" id="" class=""> 
    @foreach($country as $c)
<option data-content="{!! $c->flag['svg'] !!}"> {{$c->name->common}}</option>   
    @endforeach
</select>
{{-- @foreach($country as $c)
<i class='em em-flag-{!! strtolower($c->flag["emoji"])!!}'></i>
@endforeach --}}
@endsection
 
@section('page-css')
{{-- <link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}"> --}}
@include('asset-partials.selectize')
{{-- <link rel="stylesheet" type="text/css" href="//github.com/downloads/lafeber/world-flags-sprite/flags32.css" /> --}}
{{-- <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> --}}
@endsection