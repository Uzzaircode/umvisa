@extends('backend.master') 
@section('content')
{!! Form::open(['route' => ['users.store'], 'files'=>true ]) !!}
<div class="row">
        <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header" style="background-image: url({{asset('img/photos/bg-profile.jpg')}});"></div>
                  <div class="card-body text-center">
                    <img class="card-profile-img" src="{{asset('img/photos/16.jpg')}}">
                    <h3 class="mb-3">Peter Richards</h3>                    
                    {{-- <div class="input-file-container text-center">  
                            <input class="input-file" id="my-file" type="file" name="avatar">
                            <label tabindex="0" for="my-file" class="input-file-trigger">Change profile picture</label>
                    </div>
                          <p class="file-return"></p> --}}
                          <div class="form-group">
                                {!! Form::label('Product Image') !!}
                                {!! Form::file('avatar', null) !!}
                            </div>
                  </div>
                </div>
            </div>
    <div class="col-md-8">
        @card
            @cardHeader
                @slot('card_title') Create Users @endslot
            @endcardHeader
            @cardBody
                
                    @include('backend.users._form')
                    <div class="form-group">
                            <button type="submit" class="btn btn-md btn-success">
                                @if(isset($user->id)) Update @else Create @endif
                            </button>
                            <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a> 
                            </div>
            @endcardBody
        @endcard
    </div>
    </div>
    {!! Form::close() !!}
@endsection
{{-- @include('asset-partials.input-file') --}}