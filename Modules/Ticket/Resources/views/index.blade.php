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
            <td>{{$result->created_at}}</td>

            @can('edit_tickets')
            <td class="text-center">
                @include('ticket::layouts.index-actions')
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