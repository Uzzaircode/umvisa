@extends('backend.master') 
@section('content')
<form action="{{route('profile.update',['id'=> Auth::user()->id])}}" method="POST" enctype="multipart/form-data">
@csrf
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
                        @role('User')
                    <div class="col">
                        <div class="card">
                                {{-- <div class="card-body p-3 text-center">                                
                                <div class="h1 m-0">{{Auth::user()->tickets->count()}}</div>
                                        <div class="text-muted mb-4">Tickets Created</div>
                                      </div> --}}
                              </div>
                            </div> 
                            @endrole                           
                </div>
                
            </div>
<div class="col-md-8">
    @card
        @cardHeader
            @slot('card_title') Edit {{ Auth::id() == $user->id ? 'Your Profile':$user->name }} @endslot
        @endcardHeader

        @cardBody              
        <div class="form-group @if ($errors->has('name')) has-error @endif">
                {!! Form::label('name', 'Name') !!} 
                {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                @if ($errors->has('name'))
                <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>
            
            <!-- email Form Input -->
            <div class="form-group @if ($errors->has('email')) has-error @endif">
                {!! Form::label('email', 'Email') !!} 
                {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])
                !!} @if ($errors->has('email'))
                <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>
            
            <!-- password Form Input -->
            <div class="form-group @if ($errors->has('password')) has-error @endif">
                {!! Form::label('password', 'Password') !!} 
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])
                !!} @if ($errors->has('password'))
                <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">
                            {{ isset($user->id) ? 'Update':'Create'}}
                        </button>
                        <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a> 
                        </div>
                
        @endcardBody
    @endcard
</div>
</div>

</form>
@endsection
@include('asset-partials.input-file')