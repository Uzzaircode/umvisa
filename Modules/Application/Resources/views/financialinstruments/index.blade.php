@extends('backend.master') 
@section('content')
<div class='card'>
    <div class='card-header'>
        <p class='card-title'><i class="fe fe-file-text"></i> Financial Instruments </p>
        <div class="card-options">
            <a class="btn btn-secondary btn-sm">Total: {{ $fin->count() }} {{ str_plural('f', $fin->count()) }}</a>            @can('add_applications')
            {{-- <a href="{{ route('fin.create') }}" class="btn btn-primary btn-sm text-white"> --}}
    <i class=""></i> Create</a> @endcan
        </div>
    </div>
    <div class='card-body'>
        <div class="table-responsive">
            <table class="table table-vcenter text-nowrap card-table table-striped" id="datatable">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Created At</th>                   
                    {{-- <th>Actions</th> --}}
                </thead>
                <tbody>
                    @foreach($fin as $key => $f) @if($fin->count() > 0)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{str_limit($f->name,$limit = 40,$end = '...')}}</td>
                        <td>{{$f->created_at->toDayDateTimeString()}}</td>                    
                        {{-- <td>
                            @can('view_applications')
                            <a href="{{ URL::signedRoute('fin.show', ['id' => $f->id])  }}" class="btn btn-secondary btn-sm"><i class="fe fe-eye"></i> View</a>                        @endcan

                            @can('edit_applications')
                            @if(totalSubmittedApplication($f) == 0)
                            <a href="{{ URL::signedRoute('fin.edit', ['id' => $f->id])  }}" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i> Edit</a>
                            @endcan
                            @endif
                            
                            @can('delete_applications') {!! Form::open( ['method' => 'delete', 'url' => route('fin.destroy',
                            ['id' => $f->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are
                            yous sure wanted to delete it?")']) !!}
                            <button type="submit" class="btn-delete btn btn-sm btn-danger">
                                        <i class="fe fe-trash"></i> Delete
                                    </button> {!! Form::close() !!} @endcan
                        </td> --}}
                    </tr>
                    @endif 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>





@stop
    @include('asset-partials.datatables')