@extends('backend.master')
@section('content')
<div class='card'>
    <div class='card-header'>
        <p class='card-title'><i class="fe fe-kitchen-cooker"></i> Application Configurations </p>
        <div class="card-options">
        </div>
    </div>
    <div class='card-body'>
        <form action="{{ route('applicationconfig.update') }}" class="container" method="POST">
            @csrf
            {{ method_field('UPDATE') }}
            <div class="row">
                <div class="col">
                    <label for="">
                        <strong>Application Running Number</strong>
                    </label>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="form-group">
                            <label for="" class="">Application Prefix</label>
                            <input type="text" class="form-control" name="prefix" value="{{ isset($config->running_no_prefix)?:null }}">
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection