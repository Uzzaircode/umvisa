<div class="mt-5">
    {{--
    <h3>Travel Information</h3>
    <hr> --}}
</div>
<div class="col">
    <table class="table table-striped table-bordered">
        <tr>
            <td><label for="" class="form-label">Title of Activity/Event</label></td>
            <td>{{$application->title}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Description of Activity/Event</label></td>
            <td>{{$application->description}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Venue</label></td>
            <td>{{$application->venue}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">State</label></td>
            <td>{{$application->state}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Country</label></td>
            <td>{{$application->country}} {!! $flag_icon[0]!!}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Event Period</label></td>
            <td>
                <table class="table">
                    <tr>
                        <td><label for="" class="form-label">Event Start Date</label> </td>
                        <td><label for="" class="form-label">Event End Date</label></td>
                        <td><label for="" class="form-label">Total Days</label></td>
                    </tr>
                    <tr>
                        <td>{{$application->event_start_date}}</td>
                        <td>{{$application->event_end_date}}</td>
                        <td>{{getEventTotalDays($application)}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Travelling Period</label></td>
            <td>
                <table class="table">
                    <tr>
                        <td><label for="" class="form-label">Traveling Start Date</label></td>
                        <td><label for="" class="form-label">Traveling End Date</label></td>
                        <td><label for="" class="form-label">Total Days</label></td>
                    </tr>
                    <tr>

                        <td>{{$application->travel_start_date}}</td>
                        <td>{{$application->travel_end_date}}</td>
                        <td>{{getTravelTotalDays($application)}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>


@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
@endsection