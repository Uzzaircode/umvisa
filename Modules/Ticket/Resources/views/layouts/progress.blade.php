<div class="card-body">
        <div class='container-fluid'> 
            <div class='htimeline row'>
                {{-- @if($ticket->created_at != NULL)
                <div data-date='{{$ticket->created_at}}' class='step col orange'><div>Created</div></div>
                @endif
                @if($ticket->submitted_hod_date != NULL)
                <div data-date='{{$ticket->submitted_hod_date}}' class='step col green'><div>Submitted to HOD</div></div>
                @endif
                @if($ticket->readby_hod_date != NULL)
                <div data-date='{{$ticket->readby_hod_date}}' class='step col green'><div>Read by HOD</div></div>
                @endif
                @if($ticket->approved_hod_date != NULL)
                <div data-date='{{$ticket->approved_hod_date}}' class='step col green'><div>Approved by HOD</div></div>
                @endif 
                @if($ticket->rejected_hod_date != NULL)
                <div data-date='{{$ticket->rejected_hod_date}}' class='step col green'><div>Rejected by HOD</div></div>
                @endif 
                @if($ticket->submitted_dasar_date != NULL)
                <div data-date='{{$ticket->submitted_dasar_date}}' class='step col green'><div>Submitted to Dasar</div></div>
                @endif 
                @if($ticket->approved_dasar_date != NULL)
                <div data-date='{{$ticket->approved_dasar_date}}' class='step col green'><div>Approved by Dasar</div></div>
                @endif
                @if($ticket->rejected_dasar_date != NULL)
                <div data-date='{{$ticket->rejected_dasar_date}}' class='step col green'><div>Rejected by Dasar</div></div>
                @endif
                @if($ticket->submitted_ptm_date != NULL)
                <div data-date='{{$ticket->submitted_ptm_date}}' class='step col green'><div>Submitted to PTM</div></div>
                @endif
                @if($ticket->approved_ptm_date != NULL)
                <div data-date='{{$ticket->approved_ptm_date}}' class='step col green'><div>Approved by PTM</div></div>
                @endif
                @if($ticket->rejected_ptm_date != NULL)
                <div data-date='{{$ticket->rejected_ptm_date}}' class='step col green'><div>Rejected by PTM</div></div>
                @endif                  --}}
                @foreach($date_arr as $d)
                    @if($d['timestamp'] != NULL)
                        <div data-date='{!! $d['timestamp'] !!}' class='step col'>{!! $d['status'] !!}<div></div></div>
                    @endif
                @endforeach
            </div>
            </div>
    </div>