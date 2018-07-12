<div class="mt-5"></div>
<div class="form-group" @if ($errors->has('subject')) has-error @endif>
<input type="hidden" name="user_id" value="{{Auth::id()}}">
        <div class="row">
            <div class="col-3">
                <label for="" class="form-label">Salutation</label>
            <input type="text" class="form-control" "title" value="{{Auth::user()->profile->title}}" readonly>
@include('shared._errors',['entity'=>'salutation'])
            </div>
            <div class="col-9">
                <label for="" class="form-label">Applicant Name</label>
            <input type="text" class="form-control" "name" value="{{$user->name}}" readonly>
@include('shared._errors',['entity'=>'name'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-5">
                <label for="" class="form-label">Matric Number</label>
            <input type="text" class="form-control" "matric_num" value="{{Auth::user()->profile->matric_num}}" readonly>
@include('shared._errors',['entity'=>'matric_num'])
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="form-label">Study Mode</div>
                    <div class="custom-controls-stacked">
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" "example-inline-radios" value="option1" checked="">
                        <span class="custom-control-label">Undergraduate</span>
                      </label>
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" "example-inline-radios" value="option2">
                        <span class="custom-control-label">Master</span>
                      </label>
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" "example-inline-radios" value="option3">
                        <span class="custom-control-label">PhD</span>
                      </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-4">
                <label for="" class="form-label">IC Number</label>
            <input type="text" class="form-control" "ic_num" value="{{Auth::user()->profile->ic_num}}" readonly>
@include('shared._errors',['entity'=>'ic_num'])
            </div>
            <div class="col-4">
                <label for="" class="form-label">Passport Number</label>
                <input type="text" class="form-control" "passport_num" value="{{Auth::user()->profile->passport_num}}" placeholder="Fill in if you're non-Malaysian" readonly>
@include('shared._errors',['entity'=>'passport_num'])
            </div>
            <div class="col-4">
                <label for="" class="form-label">Citizenship</label>
                <input type="text" class="form-control" "citizenship" value="{{Auth::user()->profile->citizenship}}" readonly>
@include('shared._errors',['entity'=>'citizenship'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <label for="" class="form-label">Department</label>
                <input type="text" class="form-control" "department" value="{{Auth::user()->profile->department}}" readonly>
@include('shared._errors',['entity'=>'department'])
            </div>
            <div class="col-6">
                <label for="" class="form-label">Faculty/Academy/Institute/Centre</label>
                <input type="text" class="form-control" "faculty" value="{{Auth::user()->profile->faculty}}" readonly>
@include('shared._errors',['entity'=>'faculty'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-4">
                    <label for="" class="form-label">Office Telephone Number</label>
                    <input type="text" class="form-control" "office_num" value="{{Auth::user()->profile->office_num}}" readonly>
@include('shared._errors',['entity'=>'office_num'])
            </div>
            <div class="col-4">
                    <label for="" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" "mobile_num" value="{{Auth::user()->profile->mobile_num}}" readonly>
@include('shared._errors',['entity'=>'mobile_num'])
            </div>
            <div class="col-4">
                    <label for="" class="form-label">Email Address</label>
            <input type="text" class="form-control" "email" value="{{$user->email}}" readonly>
@include('shared._errors',['entity'=>'email'])
            </div>
        </div>
    </div>