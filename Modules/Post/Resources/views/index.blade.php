@extends('backend.master') @section('content')
<ol>
    @foreach($posts as $post) 
        <li>{{$post->title}}</li>
    @endforeach
</ol>
@stop