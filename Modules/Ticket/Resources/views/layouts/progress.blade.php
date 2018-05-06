<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fe fe-activity"></i> Ticket Progress</h3>
            <div class="card-options"></div>
        </div>
        <div class="card-body">
            <div class='container-fluid'>
                <div class='htimeline row'>
                    @foreach($date_arr as $d) 
                        @if($d['timestamp'] != NULL)
                <div data-date="{!! $d['timestamp'] !!}" class="step col-2 {!! $d['color']!!}">
                            <div>{!! $d['status'] !!} @if($d['code'] == $ticket->status) <i class="fe fe-check">@endif</i></div>
                        </div>
                        @endif 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>