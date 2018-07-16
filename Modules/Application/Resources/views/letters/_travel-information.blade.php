<div class="mt-5">
    <h3>Travel Information</h3>
    <hr>
</div>
<div class="form-group">
    <label for="" class="form-label">Title of Activity/Event</label>
    <input type="text" class="form-control-plaintext" name="title" value="{{ old('title',$application->title ?? null)}}" readonly>

</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Venue</label>
            <input type="text" class="form-control-plaintext" name="venue" value="{{ old('venue',$application->venue ?? null) }}" readonly>

        </div>
        <div class="col-6">
            <label for="" class="form-label">Country</label>
            <input type="text" class="form-control-plaintext" name="venue" value="{{ old('venue',$application->country ?? null) }}" readonly>

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
            <input type="text" class="form-control-plaintext" value="{{old('start_date',$application->start_date->format('D, d/m/Y') ?? null)}}"
                readonly>
        </div>
        <div class="col">
            <label for="" class="form-label">End Date</label>
            <input type="text" class="form-control-plaintext" value="{{old('end_date',$application->end_date->format('D, d/m/Y') ?? null)}}"
                readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="" class="form-label">
                Sources of financial assistance for the visit
        </label>
    <input type="text" class="form-control-plaintext" value="{{old('financial_aid',ucwords($application->financial_aid) ?? null)}}"
        readonly>
</div>
<div class="form-group">
    <div class="row">
        @if($application->financial_aid == 'faculty')
        <div class="col">
            <div class="form-group acc-no-input" id="acc_no_input">
                <label for="" class="form-label">Account Number</label>
                <input type="text" class="form-control-plaintext" name="account_no_ref" id="account_no_ref" placeholder="" readonly value="{{$application->account_no_ref}}">
            </div>
        </div>
        @endif @if($application->financial_aid == 'sponsorship')
        <div class="col">
            <div class="form-group sponsorship-input" id="sponsorship_input">
                <label for="" class="form-label">Sponsor Name</label>
            <input type="text" class="form-control-plaintext" name="sponsor_name" id="sponsor_name" value="{{$application->sponsor_name}}" readonly>
            </div>
        </div>
        @endif 
        @if($application->financial_aid == 'others_remarks')
        <div class="col">
            <div class="form-group others-input" id="others_input">
                <label for="" class="form-label">Others Remarks</label>
                <input type="text" class="form-control-plaintext" name="others_remarks" id="others_remarks" value="{{$application->others_remarks}}" readonly>
            </div>
        </div>
        @endif
    </div>
</div>