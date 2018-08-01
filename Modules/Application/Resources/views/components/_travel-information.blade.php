<div class="mt-5"></div>
<div class="form-group">
        <label for="" class="form-label">Title of Activity/Event</label>
        <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid':''}}" name="title" value="{{ old('title',$application->title ?? null) }}">
        @include('shared._errors',['entity'=>'title'])
</div>
<div class="form-group">
        <div class="row">
                <div class="col-6">
                        <label for="" class="form-label">Venue</label>
                        <input type="text" class="form-control {{$errors->has('venue') ? 'is-invalid':''}}" name="venue" value="@isset($application){{$application ? $application->venue : ''}}
                        @endisset">
        @include('shared._errors',['entity'=>'venue'])
                </div>
                <div class="col-6">
                        <label for="" class="form-label">Country</label>
                        <select name="country" id="" class="form-control {{$errors->has('country') ? 'is-invalid':''}}">
                                <option value="">Please select a country</option>
                        @foreach($countries as $c) 
                        <option value="{{ $c }}" @if(isset($application) && $application->country == $c) selected @endif>{!! $c !!} </option>
                            
                        @endforeach
                        </select>
        @include('shared._errors',['entity'=>'country'])
                </div>
        </div>
</div>
<div class="form-group">
        <label for="" class="form-label">
                Travelling Period
        </label>
        {{-- <div class="row">
                <div class="col">
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <div class="input-group-prepend" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input {{$errors->has('start_date') ? 'is-invalid':''}}" data-target="#datetimepicker1"
                                        name="start_date" placeholder="Start date" value="@isset($application) ?
                                        {{$application->start_date->format('m/d/Y')}}: '' @endisset}}" />
                        </div>
        @include('shared._errors',['entity'=>'start_date'])
                </div>
                <div class="col">
                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <div class="input-group-prepend" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input {{$errors->has('end_date') ? 'is-invalid':''}}" data-target="#datetimepicker2"
                                        name="end_date" placeholder="End date" value="@isset($application) ?
                                        {{$application->end_date->format('m/d/Y')}}: '' @endisset}}"/>

                        </div>
        @include('shared._errors',['entity'=>'end_date'])
                </div>
        </div> --}}
</div>
<div class="form-group">
        <label for="" class="form-label">
                Sources of financial assistance for the visit
        </label>

        <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input university" name="financial_aid" value="university" @if(isset($application) && $application->account_no_ref != NULL ) checked @endif>
                        <span class="custom-control-label">University</span>
                      </label>
        <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input faculty" name="financial_aid" value="faculty" @if(isset($application) && $application->faculty_acc_no != NULL ) checked @endif>
                        <span class="custom-control-label">Faculty</span>
                      </label>
        <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input grant" name="financial_aid" value="grant" @if(isset($application) && $application->grant_acc_no != NULL ) checked @endif>
                        <span class="custom-control-label">Grant</span>
                      </label>
        <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input sponsorship" name="financial_aid" value="sponsorship" @if(isset($application) && $application->sponsor_name != NULL ) checked @endif>
                        <span class="custom-control-label">Sponsorship</span>
                      </label>
        <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input others" name="financial_aid" value="others" @if(isset($application) && $application->others_remarks != NULL ) checked @endif>
                        <span class="custom-control-label">Others</span>
                      </label>
        @include('shared._errors',['entity'=>'financial_aid'])
</div>

<div class="form-group acc-no-input" style="display:{{(isset($application) && $application->account_no_ref != null) ||$errors->has('account_no_ref') ? 'block':'none'}}" id="acc_no_input">
        <label for="" class="form-label">Please specify the account number</label>
        <input type="text" class="form-control {{$errors->has('account_no_ref') ? 'is-invalid':''}}" name="account_no_ref" id="account_no_ref"
placeholder="" value="@isset($application)
{{$application ? $application->account_no_ref : ''}}
@endisset">

        <p class="help-block">If comes from University</p>
        @include('shared._errors',['entity'=>'account_no_ref'])
</div>
<div class="form-group faculty-acc-no-input" style="display:{{(isset($application) && $application->faculty_acc_no != null) || $errors->has('faculty_acc_no') ? 'block':'none'}}" id="acc_no_input">
        <label for="" class="form-label">Please specify the account number</label>
        <input type="text" class="form-control {{$errors->has('faculty_acc_no') ? 'is-invalid':''}}" name="faculty_acc_no" id="faculty_acc_no"
                placeholder="">
        <p class="help-block">If comes from Faculty</p>
        @include('shared._errors',['entity'=>'faculty_acc_no'])
</div>
<div class="form-group grant-acc-no-input" style="display:{{(isset($application) && $application->grant_acc_no != null) ||$errors->has('grant_acc_no') ? 'block':'none'}}" id="acc_no_input">
        <label for="" class="form-label">Please specify the account number</label>
        <input type="text" class="form-control {{$errors->has('grant_acc_no') ? 'is-invalid':''}}" name="grant_acc_no" id="grant_acc_no"
                placeholder="">
        <p class="help-block">If comes from Grant</p>
        @include('shared._errors',['entity'=>'grant_acc_no'])
</div>
<div class="form-group sponsorship-input" style="display:{{(isset($application) && $application->sponsor_name != null) ||$errors->has('sponsor_name') ? 'block':'none'}}" id="sponsorship_input">
        <label for="" class="form-label">Sponsorship? Please specify the name of sponsor</label>
        <input type="text" class="form-control {{$errors->has('sponsor_name') ? 'is-invalid':''}}" name="sponsor_name" id="sponsor_name"
                placeholder="">
        @include('shared._errors',['entity'=>'sponsor_name'])
</div>
<div class="form-group others-input" style="display:{{(isset($application) && $application->others_remarks != null) ||$errors->has('others_remarks') ? 'block':'none'}}" id="others_input">
        <label for="" class="form-label">Others? Please specify</label>
        <input type="text" class="form-control {{$errors->has('others_remarks') ? 'is-invalid':''}}" name="others_remarks" id="others_remarks"
placeholder="" value="@isset($application) ?
        {{$application->others_remarks}}: '' @endisset">
        @include('shared._errors',['entity'=>'others_remarks'])
</div>