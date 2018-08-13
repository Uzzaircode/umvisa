@extends('backend.master') 
@section('content')
<div class="row">
        @isset($application)
        @include('application::components._progress') 
        @endisset
    <div class="col-lg-7 col-md-7">
        @if(isset($application->id))
        <form action="{{route('applciations.update',['id'=>$ticket->id])}}" class="" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}} @else
            <form action="{{route('applications.store')}}" class="" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card">
                    <div class="card-header sticky-top" style="background:white">
                        <h3 class="card-title"><i class="fe fe-file-text"></i> {{isset($application) ? 'Edit Application':'New Application'}}</h3>
                        <div class="card-options">
    @include('application::components._form-action-buttons')
                        </div>
                    </div>
                    <div class="card-body">
    @include('application::components._applicant-details')
    @include('application::components._travel-information')
    @include('application::components._attachment')
                    </div>
                </div>
    </div>
    <div class="col col-lg-5 col-md-5">
            <div class='card'>
                    <div class='card-header'>
                        <p class='card-title'>Recommendations</p>
                    </div>
                    <div class='card-body'>
            @include('application::components._remarks')
                    </div>
                </div>
                @include('application::components._participants')
    </div>
</div>
</form>
@endsection