<div class="mt-5">
    <h3>Travel Information</h3>
    <hr>
</div>
<div class="form-group">
    <label for="" class="form-label">Title of Activity/Event</label>
    <p>{{$application->title}}</p>

</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Venue</label>
            <p>{{$application->venue}}</p>

        </div>
        <div class="col">
                <label for="" class="form-label">State</label>
                <p>{{$application->state}}</p>
    
            </div>
        <div class="col">
            <label for="" class="form-label">Country</label>
            <p>{{$application->country}} {!! $flag_icon[0]!!}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="" class="form-label">
                Event Period
        </label>
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Event Start Date</label>
            <p class="form-static">{{$application->event_start_date}}</p>
        </div>
        <div class="col">
            <label for="" class="form-label">Event End Date</label>
            <p class="form-static">{{$application->event_end_date}}</p>
        </div>
        <div class="col">
            <label for="" class="form-label">Total Days</label>
            <p class="form-static">{{getEventTotalDays($application)}}</p>
        </div>
    </div>
</div>
<div class="form-group">
        <label for="" class="form-label">
                    Travelling Period
            </label>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Travel Start Date</label>
                <p class="form-static">{{$application->travel_start_date}}</p>
            </div>
            <div class="col">
                <label for="" class="form-label">Travel End Date</label>
                <p class="form-static">{{$application->travel_end_date}}</p>
            </div>
            <div class="col">
                    <label for="" class="form-label">Total Days</label>
                    <p class="form-static">{{getTravelTotalDays($application)}}</p>
                </div>
        </div>
    </div>

@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
@endsection