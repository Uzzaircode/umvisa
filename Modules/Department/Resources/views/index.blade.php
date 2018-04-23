@extends('backend.master')

@section('content')
@card
@cardHeader
    @slot('card_title')<i class="fe fe-briefcase"></i> Departments @endslot
    @cardOptions
    <a class="btn btn-secondary btn-sm">Total: {{ $results->count() }} {{ str_plural('Department', $results->count()) }}</a>

    @can('add_saps')
    <a href="{{ route('departments.create') }}" class="btn btn-primary btn-sm text-white"> <i class=""></i> Create</a> 
    @endcan 
    @endcardOptions
@endcardHeader

@cardBody
<div class="table-responsive">
    @table(['class'=>'table table-vcenter card-table text-nowrap table-striped ', 'id'=>'datatable'])
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>            
            @can('edit_departments', 'delete_departments')
            <th class="text-center">Actions</th>
            @endcan
        </thead>
        <tbody>
           @foreach($results as $key => $result)
        <tr>

            <td>{{ ++$key }}</td>
            <td>{{ $result->name }}</td>
            <td>{{ $result->email }}</td>            
        
            @can('edit_departments')
            <td class="text-center">
                @include('shared._actions', [ 'entity' => 'departments', 'id' => $result->id ])
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