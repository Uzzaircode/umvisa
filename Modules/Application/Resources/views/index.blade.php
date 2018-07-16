@extends('backend.master') 
@section('content')
<div class='card'>
    <div class='card-header'>
        <p class='card-title'><i class="fe fe-file-text"></i> Your Applications </p>
        <div class="card-options">
            <a class="btn btn-secondary btn-sm">Total: {{ $applications->count() }} {{ str_plural('Application', $applications->count()) }}</a>            @can('add_applications')
            <a href="{{ route('applications.create') }}" class="btn btn-primary btn-sm text-white">
    <i class=""></i> Create</a> @endcan
        </div>
    </div>
    <div class='card-body'>
        <div class="table-responsive">
            <table class="table table-vcenter text-nowrap card-table table-striped" id="datatable">
                <thead>
                    <th>#</th>
                    <th>Title Event</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($applications as $key => $application) @if($applications->count() > 0)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{str_limit($application->title,$limit = 40,$end = '...')}}</td>
                        <td>{{$application->created_at->toDayDateTimeString()}}</td>
                    <td><span class="badge badge-{{getApplicationStatusState($application)}}">{{$application->status()->reason}}</span></td>
                        <td>
                            @can('view_applications')
                            <a href="{{ URL::signedRoute('applications.show', ['id' => $application->id])  }}" class="btn btn-secondary btn-sm"><i class="fe fe-eye"></i> View</a>                            @endcan @can('edit_applications')
                            @if(totalSubmittedApplication($application) < 0)
                            <a href="{{ URL::signedRoute('applications.edit', ['id' => $application->id])  }}" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i> Edit</a>
                            @endif                           
                            @endcan 
                            @can('delete_applications') {!! Form::open( ['method' => 'delete', 'url' => route('applications.destroy',
                            ['id' => $application->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are
                            yous sure wanted to delete it?")']) !!}
                            <button type="submit" class="btn-delete btn btn-sm btn-danger">
                                        <i class="fe fe-trash"></i> Delete
                                    </button> {!! Form::close() !!} @endcan
                        </td>
                    </tr>
                    @endif @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>





@stop
    @include('asset-partials.datatables')