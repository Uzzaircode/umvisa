@extends('backend.master')

@section('content')
@card
@cardHeader
    @slot('card_title')<i class="fe fe-tag"></i> Tickets @endslot
    @cardOptions
    <a class="btn btn-secondary btn-sm">Total: {{ $results->count() }} {{ str_plural('Ticket', $results->count()) }}</a>

    @can('add_tickets')
    <a href="{{ route('tickets.create') }}" class="btn btn-primary btn-sm text-white"> <i class=""></i> Create</a> 
    @endcan 
    @endcardOptions
@endcardHeader

@cardBody
<div class="table-responsive">
    @table(['class'=>'table table-vcenter text-nowrap card-table table-striped', 'id'=>'datatable'])
        <thead>
            <th>#</th>
            <th>Ticket Number</th>
            <th>Subject</th>
            <th>Created By</th>
            <th>Status</th>
            <th>Created At</th>            
            @can('edit_tickets', 'delete_tickets')
            <th class="text-center">Actions</th>
            @endcan
        </thead>
        <tbody>
           @foreach($results as $key => $result)
        <tr>

            <td>{{ ++$key }}</td>
            <td>{{$result->ticket_number}}</td>
            <td>{{ $result->subject }}</td>
            <td>{{ $result->user->name }}</td>
        <td>    
            @include('ticket::components.status-index')
        </td>
            <td>{{$result->created_at->toDayDateTimeString()}}</td>            
        
            @can('edit_tickets')
            <td class="text-center">
                @can('view_tickets')
<a href="{{ route('tickets.show',['id'=>$result->id])  }}" class="btn btn-secondary btn-sm"><i class="fe fe-eye"></i> View</a>
@endcan
@can('edit_tickets')
            <a href="{{ route('tickets.edit',['id'=>$result->id])  }}" class="btn btn-secondary btn-sm" style="{{$result->status == 2 ? "display:none":""}}"><i class="fe fe-edit"></i> Edit</a>
@endcan
@can('delete_tickets')
    {!! Form::open( ['method' => 'delete', 'url' => route('tickets.destroy', ['id'=>$result->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete this ticket?")']) !!}
<button type="submit" class="btn-delete btn btn-sm btn-danger" >
            <i class="fe fe-trash"></i> Delete
        </button>
    {!! Form::close() !!}
@endcan                 
            </td>
            @endcan
            
        </tr>
        @endforeach             
        </tbody>
    @endtable
</div>
<div class="container">
        
</div>
@endcardBody
@endcard    
@stop
@include('asset-partials.datatables')
