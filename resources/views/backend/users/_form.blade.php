<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!} {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    @if ($errors->has('name'))
    <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email') !!} {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])
    !!} @if ($errors->has('email'))
    <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<!-- password Form Input -->
<div class="form-group @if ($errors->has('password')) has-error @endif">
    {!! Form::label('password', 'Password') !!} {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])
    !!} @if ($errors->has('password'))
    <p class="help-block">{{ $errors->first('password') }}</p> @endif
</div>
@role('Admin')
<!-- Roles Form Input -->
<div class="form-group @if ($errors->has('roles')) has-error @endif">            
    {!! Form::label('roles[]', 'Roles') !!}
    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray()
    : null, ['class' => 'form-control selectize', 'multiple']) !!} 
    @if($errors->has('roles'))
    <p class="help-block">{{ $errors->first('roles') }}</p>
    @endif
</div>

<div class="form-group @if ($errors->has('depts')) has-error @endif">
        {!! Form::label('depts[]', 'Departments') !!} {!! Form::select('depts[]', $depts, isset($user) ? $user->departments->pluck('id')->toArray()
        : null, ['class' => 'form-control selectize', 'multiple']) !!} @if ($errors->has('depts'))
        <p class="help-block">{{ $errors->first('depts') }}</p> @endif
</div>
<div class="form-group @if ($errors->has('hod')) has-error @endif">   
    {!! Form::label('hod_id', 'Head Of Department?') !!}
    {!! Form::select('hod_id', $depts, isset($user) ? $user->profile->pluck('hod_id')->toArray()
    : null, ['class' => 'form-control selectize','placeholder' => 'Pick department']) !!} 
    @if($errors->has('roles'))
    <p class="help-block">{{ $errors->first('roles') }}</p>
    @endif
</div>
<div class="form-group @if ($errors->has('saps')) has-error @endif">
        {!! Form::label('saps[]', 'SAP Modules') !!} {!! Form::select('saps[]', $saps, isset($user) ? $user->saps->pluck('id')->toArray()
        : null, ['class' => 'form-control selectize', 'multiple']) !!} @if ($errors->has('saps'))
        <p class="help-block">{{ $errors->first('saps') }}</p> @endif
</div>


<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $user ]) @endif
@endrole
@include('asset-partials.selectize')
