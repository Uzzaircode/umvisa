<div class="form-group" @if ($errors->has('subject')) has-error @endif>
        <div class="row">
            <div class="col-3">
                <label for="" class="form-label">Salutation</label>
                <select name="salutation" id="" class="form-control" readonly>
                    <option value="Mr">Mr</option>                                
                    <option value="Ms">Ms</option>
                    <option value="Dr">Dr</option>
                </select>
@include('shared._errors',['entity'=>'salutation'])
            </div>
            <div class="col-9">
                <label for="" class="form-label">Applicant Name</label>
                <input type="text" class="form-control" name="name" value="" readonly>
@include('shared._errors',['entity'=>'name'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-5">
                <label for="" class="form-label">Matric Number</label>
                <input type="text" class="form-control" name="matric_num" value="" readonly>
@include('shared._errors',['entity'=>'matric_num'])
            </div>
            <div class="col-5">
                <div class="form-group">
                    <div class="form-label">Study Mode</div>
                    <div class="custom-controls-stacked">
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="example-inline-radios" value="option1" checked="">
                        <span class="custom-control-label">Undergraduate</span>
                      </label>
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="example-inline-radios" value="option2">
                        <span class="custom-control-label">Master</span>
                      </label>
                        <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="example-inline-radios" value="option3">
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
                <input type="text" class="form-control" name="ic_num" value="" readonly>
@include('shared._errors',['entity'=>'ic_num'])
            </div>
            <div class="col-4">
                <label for="" class="form-label">Passport Number</label>
                <input type="text" class="form-control" name="passport_num" value="" placeholder="Fill in if you're non-Malaysian">
@include('shared._errors',['entity'=>'passport_num'])
            </div>
            <div class="col-4">
                <label for="" class="form-label">Citizenship</label>
                <input type="text" class="form-control" name="citizenship" value="">
@include('shared._errors',['entity'=>'citizenship'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <label for="" class="form-label">Department</label>
                <input type="text" class="form-control" name="department" value="">
@include('shared._errors',['entity'=>'department'])
            </div>
            <div class="col-6">
                <label for="" class="form-label">Faculty/Academy/Institute/Centre</label>
                <input type="text" class="form-control" name="faculty" value="">
@include('shared._errors',['entity'=>'faculty'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-4">
                    <label for="" class="form-label">Office Telephone Number</label>
                    <input type="text" class="form-control" name="office_num" value="">
@include('shared._errors',['entity'=>'office_num'])
            </div>
            <div class="col-4">
                    <label for="" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_num" value="">
@include('shared._errors',['entity'=>'mobile_num'])
            </div>
            <div class="col-4">
                    <label for="" class="form-label">Email Address</label>
                    <input type="text" class="form-control" name="email" value="">
@include('shared._errors',['entity'=>'email'])
            </div>
        </div>
    </div>