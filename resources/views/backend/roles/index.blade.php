@extends('backend.master')

@section('title', 'Roles & Permissions')

@section('content')

    <!-- class -->
    <div class="" id="roleclass" tabindex="-1" role="dialog" aria-labelledby="roleclassLabel">
        <div class="class-dialog" role="document">
            {!! Form::open(['method' => 'post']) !!}

            <div class="">
                <div class="class-header">
                    <button type="button" class="close" data-dismiss="class" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="class-title" id="roleclassLabel">Role</h4>
                </div>
                <div class="">
                    <!-- name Form Input -->
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>
                <div class="">
                    <button type="button" class="btn btn-default" data-dismiss="">Close</button>

                    <!-- Submit Form Button -->
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <h3>Roles</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_roles')
                <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="class" data-target="#roleclass"> <i class="glyphicon glyphicon-plus"></i> New</a>
            @endcan
        </div>
    </div>


    @forelse ($roles as $role)
        {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}

        @if($role->name === 'Admin')
            @include('shared._permissions', [
                          'title' => $role->name .' Permissions',
                          'options' => ['disabled'] ])
        @else
            @include('shared._permissions', [
                          'title' => $role->name .' Permissions',
                          'model' => $role ])
            @can('edit_roles')
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            @endcan
        @endif

        {!! Form::close() !!}

    @empty
        <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
    @endforelse
@endsection