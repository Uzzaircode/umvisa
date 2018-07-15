<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fe fe-activity"></i> Application Status</h3>
            <div class="card-options">

            </div>
        </div>
        <div class="card-body">
            <div class='container-fluid'>
                <div class='htimeline row'>
                    @foreach($statuses as $s)
                    <div data-date="{{$s->created_at->toDayDateTimeString()}}" class="step col">
                        <div>                     
                        {{$s->reason}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>