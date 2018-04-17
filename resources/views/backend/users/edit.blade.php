@extends('backend.master') 
@section('content')
<div class="row">
<div class="col-md-9">
    @card
        @cardHeader
            @slot('card_title') Edit {{$user->name}} @endslot
        @endcardHeader

        @cardBody
            {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id ] ]) !!}
                @include('backend.users._form')
            <!-- Submit Form Button -->
            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}

        @endcardBody

    @endcard
</div>
</div>

@endsection