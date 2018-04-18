@extends('backend.master')

@section('content')
@card
@cardHeader
    @slot('card_title')Sap Modules @endslot
    @cardOptions
    <a class="btn btn-secondary btn-md">Total: {{ $saps->count() }} {{ str_plural('Sap Module', $saps->count()) }}</a>

    @can('add_users')
    <a href="{{ route('saps.create') }}" class="btn btn-primary btn-md text-white"> <i class=""></i> Create</a> 
    @endcan 
    @endcardOptions
@endcardHeader

@cardBody
<div class="table-responsive">
    @table(['class'=>'table card-table table-vcenter text-nowrap', 'id'=>'datatable'])
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Code</th>            
            @can('edit_users', 'delete_users')
            <th class="text-center">Actions</th>
            @endcan
        </thead>
        <tbody>
           @foreach($saps as $key => $sap)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $sap->name }}</td>
            <td>{{ $sap->code }}</td>            
        
            @can('edit_users')
            <td class="text-right">
                @include('shared._actions', [ 'entity' => 'saps', 'id' => $sap->id ])
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