<div class="mt-5"></div>
<div class="form-group" @if ($errors->has('subject')) has-error @endif>
<input type="hidden" name="user_id" value="{{Auth::id()}}">
        <div class="row">
            <div class="col-3">
                <label for="" class="form-label">Salutation</label>
            <input type="text" class="form-control" "title" value="{{old('title',$application->user->profile->title ?? Auth::user()->profile->title)}}" readonly>
@include('shared._errors',['entity'=>'salutation'])
            </div>
            <div class="col-9">
                <label for="" class="form-label">Applicant Name</label>
            <input type="text" class="form-control" "name" value="{{old('name',$application->user->name ?? Auth::user()->name)}}" readonly>
@include('shared._errors',['entity'=>'name'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-5">
                <label for="" class="form-label">Matric Number</label>
            <input type="text" class="form-control" "matric_num" value="{{old('matric_num',$application->user->profile->matric_num ?? Auth::user()->profile->matric_num)}}" readonly>
@include('shared._errors',['entity'=>'matric_num'])
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="form-label">Study Mode</div>
                    <div class="custom-controls-stacked">
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" value="Undergraduate"
                        {{
                            isset($application) && $application->user->profile->study_mode == "Undergraduate" ? 'checked':''
                        }}
                         disabled>
                        <span class="custom-control-label">Undergraduate</span>
                      </label>
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" value="{{old('Master')}}" 
                        {{
                            isset($application) && $application->user->profile->study_mode == "Master" ? 'checked':''
                        }}
                         disabled>
                        <span class="custom-control-label">Master</span>
                      </label>
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" value="{{old('PhD')}}"
                        {{
                            isset($application) && $application->user->profile->study_mode == "PhD" ? 'checked':''
                        }}
                         disabled>
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
            <input type="text" class="form-control" "ic_num" value="{{old('ic_num',$application->user->profile->num_ic ?? Auth::user()->profile->ic_num )}}" readonly>
@include('shared._errors',['entity'=>'ic_num'])
            </div>
            <div class="col-4">
                <label for="" class="form-label">Passport Number</label>
                <input type="text" class="form-control" "passport_num" value="{{old('passport_num',$application->user->profile->passport_num ?? Auth::user()->profile->passport_num) }}" placeholder="Fill in if you're non-Malaysian" readonly>
@include('shared._errors',['entity'=>'passport_num'])
            </div>
            <div class="col-4">
                <label for="" class="form-label">Citizenship</label>
                <input type="text" class="form-control" "citizenship" value="{{old('citizenship',$application->user->profile->citizenship ?? Auth::user()->profile->citizenship )}}" readonly>
@include('shared._errors',['entity'=>'citizenship'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <label for="" class="form-label">Department</label>
                <input type="text" class="form-control" "department" value="{{old('department',$application->user->profile->department ?? Auth::user()->profile->department )}}" readonly>
@include('shared._errors',['entity'=>'department'])
            </div>
            <div class="col-6">
                <label for="" class="form-label">Faculty/Academy/Institute/Centre</label>
                <input type="text" class="form-control" "faculty" value="{{old('faculty',$application->user->profile->faculty ?? Auth::user()->profile->faculty )}}" readonly>
@include('shared._errors',['entity'=>'faculty'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-4">
                    <label for="" class="form-label">Office Telephone Number</label>
                    <input type="text" class="form-control" "office_num" value="{{old('office_num',$application->user->profile->office_num ?? Auth::user()->profile->office_num )}}" readonly>
@include('shared._errors',['entity'=>'office_num'])
            </div>
            <div class="col-4">
                    <label for="" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" "mobile_num" value="{{old('mobile_num',$application->user->profile->mobile_num ?? Auth::user()->profile->mobile_num )}}" readonly>
@include('shared._errors',['entity'=>'mobile_num'])
            </div>
            <div class="col-4">
                    <label for="" class="form-label">Email Address</label>
            <input type="text" class="form-control" "email" value="{{old('email',$application->user->email ?? Auth::user()->email)}}" readonly>
@include('shared._errors',['entity'=>'email'])
            </div>
        </div>
    </div>