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
        <div class="col-6">
            <label for="" class="form-label">Venue</label>
            <p>{{$application->venue}}</p>

        </div>
        <div class="col-6">
            <label for="" class="form-label">Country</label>
            <p>{{$application->country}}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="" class="form-label">
                Travelling Period
        </label>
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Start Date</label>
            <p class="form-static">{{$application->start_date}}</p>
        </div>
        <div class="col">
            <label for="" class="form-label">End Date</label>
            <p class="form-static">{{$application->end_date}}</p>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="" class="form-label">
                Sources of financial assistance for the visit
    </label>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Financial Aid</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($financialaids as $key => $f)
            <tr>
            <td>{{++$key}}</td>
            <td>{{$f->financialinstrument->name}}</td>
            <td>{{$f->remarks}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>   
</div>