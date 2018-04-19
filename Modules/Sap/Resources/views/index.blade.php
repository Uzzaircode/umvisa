@extends('backend.master')

@section('content')
@card
@cardHeader
    @slot('card_title')<i class="fe fe-codepen"></i> Sap Modules @endslot
    @cardOptions
    <a class="btn btn-secondary btn-sm">Total: {{ $results->count() }} {{ str_plural('Sap Module', $results->count()) }}</a>

    @can('add_saps')
    <a href="{{ route('saps.create') }}" class="btn btn-primary btn-sm text-white"> <i class=""></i> Create</a> 
    @endcan 
    @endcardOptions
@endcardHeader

@cardBody
<div class="table-responsive">
    @table(['class'=>'table table-vcenter text-nowrap table-striped table-bordered', 'id'=>'datatable'])
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Code</th>            
            @can('edit_saps', 'delete_saps')
            <th class="text-center">Actions</th>
            @endcan
        </thead>
        <tbody>
           @foreach($results as $key => $result)
        <tr>

            <td>{{ ++$key }}</td>
            <td>{{ $result->name }}</td>
            <td>{{ $result->code }}</td>            
        
            @can('edit_saps')
            <td class="text-center">
                @include('shared._actions', [ 'entity' => 'saps', 'id' => $result->id ])
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