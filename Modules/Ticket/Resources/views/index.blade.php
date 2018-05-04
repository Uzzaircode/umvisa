@extends('backend.master') @section('content') @card @cardHeader @slot('card_title')
<i class="fe fe-tag"></i> Tickets @endslot @cardOptions
<a class="btn btn-secondary btn-sm">Total: {{ $results->count() }} {{ str_plural('Ticket', $results->count()) }}</a>

@can('add_tickets')
<a href="{{ route('tickets.create') }}" class="btn btn-primary btn-sm text-white">
    <i class=""></i> Create</a>
@endcan @endcardOptions @endcardHeader @cardBody
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
            <td>{{$result->ticket_number or 'Not generated yet'}}</td>
            <td>{{ $result->subject }}</td>
            <td>{{ $result->user->name }}</td>
            <td>
                @include('ticket::components.status-index')
            </td>
            <td>{{$result->created_at->toDayDateTimeString()}}</td>

            @can('edit_tickets')
            <td class="text-center">
                <div class="item-action dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon">
                        <button class="btn btn-sm btn-secondary">Action</button>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @can('view_tickets')
                            @if(Auth::user()->hasAnyRole(['Admin','User']))                        
                                <a href="{{route('tickets.show',['id'=>$result->id])}}" class="dropdown-item"><i class="fe fe-eye"></i> View</a>
                            @endif
                            <form action="{{route('tickets.read', ['id'=>$result->id])}}" style="display:inline" method="POST">
                                @csrf
                                @role('HOD')
                                <button type="submit" class="btn btn-secondary dropdown-item" name="readby_hod"><i class="fe fe-eye"></i> View</button>
                                @endrole
                                @role('Dasar')
                                <button type="submit" class="btn btn-secondary dropdown-item" name="readby_dasar"><i class="fe fe-eye"></i> View</button>
                                @endrole
                                @role('PTM')
                                <button type="submit" class="btn btn-secondary dropdown-item" name="readby_ptm"><i class="fe fe-eye"></i> View</button>
                                @endrole
                            </form>
                        @endcan 
                        @if($result->status == 1 || $result->status == 4) @can('edit_tickets')
                        <a href="{{ route('tickets.edit',['id'=>$result->id])  }}" class="dropdown-item">
                            <i class="fe fe-edit"></i> Edit</a>
                        @endcan 
                        @endif
                        <div class="dropdown-divider"></div>
                        @can('delete_tickets') 
                        {!! Form::open( ['method' => 'delete', 'url' => route('tickets.destroy', ['id'=>$result->id]), 'style'
                        => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete this ticket?")'])
                        !!}
                        <button type="submit" class="dropdown-item">
                            <i class="fe fe-trash"></i> Delete
                        </button>
                        {!! Form::close() !!} 
                        @endcan
                    </div>
                </div>
            </td>
            @endcan

        </tr>
        @endforeach
    </tbody>
    @endtable
</div>
<div class="container">

</div>
@endcardBody @endcard @stop @include('asset-partials.datatables')