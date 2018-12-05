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
                    <div class="form-group">
                        <label for="" class="">Application Prefix</label>
                        <input type="text" class="form-control" name="prefix" value="{!! isset($running_no_prefix)? $running_no_prefix->value:null !!}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <label for="">
                        <strong>Messages</strong>
                    </label>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="">Late Message</label>
                        <textarea class="form-control" name="late_message" style="height:200px">
                                        {{ isset($late_message) ? $late_message->value:null }}
                                </textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection