@extends('backend.master') 
@section('content')
{!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id ],'files'=>true ]) !!}

<div class="row">
        <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header" style="background-image: url({{asset('img/photos/bg-profile.jpg')}});"></div>
                  <div class="card-body text-center">
                    <img class="card-profile-img" src="{{asset($user->profile->avatar)}}">
                  <h3 class="mb-3">{{$user->name}}</h3>                    
                    <div class="input-file-container text-center">  
                            <input class="input-file" id="my-file" type="file" name="avatar">
                            <label tabindex="0" for="my-file" class="input-file-trigger btn btn-sm">Change profile picture</label>
                    </div>                                        
                  </div>
                </div>
                <div class="row row-cards">
                    <div class="col-6">
                        <div class="card">
                                <div class="card-body p-3 text-center">                                
                                <div class="h1 m-0">{{Auth::user()->tickets->count()}}</div>
                                        <div class="text-muted mb-4">Tickets Created</div>
                                      </div>
                              </div>
                            </div>
                            <div class="col-6">
                                    <div class="card">
                                            <div class="card-body p-3 text-center">                                
                                                    <div class="h1 m-0">43</div>
                                                    <div class="text-muted mb-4">Tickets Created</div>
                                                  </div>
                                          </div>
                                        </div>
                </div>
                
            </div>
<div class="col-md-8">
    @card
        @cardHeader
            @slot('card_title') Edit {{ Auth::id() == $user->id ? 'Your Profile':$user->name }} @endslot
        @endcardHeader

        @cardBody              
                @include('backend.users._form')
                <div class="form-group">
                        <button type="submit" class="btn btn-md btn-success">
                            {{ isset($user->id) ? 'Update':'Create'}}
                        </button>
                        <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a> 
                        </div>
                
        @endcardBody

    @endcard
</div>
</div>

{!! Form::close() !!}
@endsection
@include('asset-partials.input-file')