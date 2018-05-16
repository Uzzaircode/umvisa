@extends('backend.master') 
@section('content')
@card
    @cardHeader
        @slot('card_title')<i class="fe fe-bell"></i> Your Notifications @endslot
        @cardOptions
        <a class="btn btn-secondary btn-sm">Total: {{ $results->count() }} {{ str_plural('Notification', $results->count()) }}</a>
        @endcardOptions
    @endcardHeader
    
    @cardBody
    <div class="table-responsive">
        @table(['class'=>'table card-table table-vcenter text-nowrap', 'id'=>'datatable'])
            <thead>
                <th>#</th>                
                <th>Sent By</th>
                <th></th>                
                <th>Received At</th>
                <th>Message</th>
                <th>Actions</th>               
            </thead>
            <tbody>
               @foreach($results as $key => $result)              
            <tr>
                <td>{{ ++$key }}</td>
                <td class="text-center"><div class="avatar d-block" style="background-image: url({{asset($result->user->profile->avatar)}})">                  
                    <span class="avatar-status {{$result->user->isOnline() ? 'bg-green':'bg-red'}}"></span> 
                  </div></td>
                <td>{{ $result->user->name }}</td>
                <td>{{ $result->created_at->toDayDateTimeString() }}</td>
                <td>
                    <span>{{ $result->user->name }}
                            @if($result->action_id == 1)
                            has submitted a new ticket
                            @elseif($result->action_id == 2)
                            has approved the ticket
                            @elseif($result->action_id == 3)
                            has rejected the ticket
                            @endif {!! '#'.$result->ticket->ticket_number !!}
                    </span>

                </td>
                <td><a href="{{route('tickets.show',['id'=>$result->ticket_id])}}" class="btn btn-secondary btn-sm"><i class="fe fe-eye"></i> View</a></td>              
            </tr>
            @endforeach             
            </tbody>
        @endtable
    </div>
    @endcardBody
@endcard
@include('asset-partials.datatables')
@endsection
