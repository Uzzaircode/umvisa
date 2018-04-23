@extends('backend.master')

@section('content')
@card
@cardHeader
    @slot('card_title')<i class="fe fe-layout"></i> Applications @endslot
    @cardOptions
    <a class="btn btn-secondary btn-sm">Total: {{ $results->count() }} {{ str_plural('Application', $results->count()) }}</a>

    @can('add_applications')
    <a href="{{ route('applications.create') }}" class="btn btn-primary btn-sm text-white"> <i class=""></i> Create</a> 
    @endcan 
    @endcardOptions
@endcardHeader

@cardBody
<div class="table-responsive">
    @table(['class'=>'table table-vcenter card-table text-nowrap table-striped ', 'id'=>'datatable'])
        <thead>
            <th>#</th>
            <th>Name</th>                      
            @can('edit_applications', 'delete_applications')
            <th class="text-center">Actions</th>
            @endcan
        </thead>
        <tbody>
           @foreach($results as $key => $result)
        <tr>

            <td>{{ ++$key }}</td>
            <td>{{ $result->name }}</td>                             
            @can('edit_applications')
            <td class="text-center">
                @include('shared._actions', [ 'entity' => 'applications', 'id' => $result->id ])
            </td>
            @endcan
            
        </tr>
        @endforeach             
        </tbody>
    @endtable
</div>
@endcardBody
@endcard    
@stop
@include('asset-partials.datatables')