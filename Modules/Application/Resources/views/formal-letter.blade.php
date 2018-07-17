@extends('backend.master') 
@section('content') @isset($application)
<div class="row">
    @include('application::components._progress')
</div>
@endisset
<div class="row">
    <div class="col-7">
        <div class='card align-middle' width="">
            <div class="card-header">
                <p class="card-title">Permission To Travel (Overseas) Form</p>
                <div class="card-options">
                    <button class="btn btn-sm btn-{{getApplicationStatusState($application)}}" style="float:right">{{$application->status()->reason}} on {{$application->created_at->toDayDateTimeString()}}</button>
                </div>
            </div>
            <div class='card-body'>
    @include('application::letters._header')
                <table class="table">
                    <tr>
                        <td>
                            <form action="">
    @include('application::letters._applicant-details')
                                <hr>
    @include('application::letters._travel-information')
                                <hr>
    @include('application::letters._attachments')
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-5">
        <div class='card'>
            <div class='card-header'>
                <p class='card-title'>Remarks</p>
            </div>
            <div class='card-body'>
                <form action="{{route('create.remarks',['id'=>$application->id])}}" method="POST">
                    @csrf
    @include('application::letters._remarks')
                </form>
            </div>
        </div>
    </div>    
</div>
@endsection