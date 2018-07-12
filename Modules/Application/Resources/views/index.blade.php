@extends('backend.master') 
@section('content')
<div class='card'>
    <div class='card-header'>
        <p class='card-title'><i class="fe fe-file-text"></i> Applications </p>
        <div class="card-options">
            <a class="btn btn-secondary btn-sm">Total: {{ $results->count() }} {{ str_plural('Application', $results->count()) }}</a>            @can('add_applications')
            <a href="{{ route('applications.create') }}" class="btn btn-primary btn-sm text-white">
    <i class=""></i> Create</a> @endcan
        </div>
    </div>
    <div class='card-body'>
        <div class="table-responsive">
            <table class="table table-vcenter text-nowrap card-table table-striped">
                <thead>
                    <th>#</th>
                    <th>Title Event</th>
                </thead>
                <tbody>
                    @foreach($results as $key => $result)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{$result->title}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@stop
    @include('asset-partials.datatables')