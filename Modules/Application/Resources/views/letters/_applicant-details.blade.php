<div class="mt-5">
    <h3>Applicant Details</h3>
    <hr>
</div>
<div class="form-group">
<input type="hidden" name="user_id" value="{{Auth::id()}}">
        <div class="row">            
            <div class="col-6">
                <label for="" class="form-label">Applicant Name</label>
            <input type="text" class="form-control-plaintext" value="{{old('title',$application->user->profile->title ?? Auth::user()->profile->title)}} {{old('name',$application->user->name ?? Auth::user()->name)}}" readonly>
            </div>
            <div class="col-6">
                    <label for="" class="form-label">Matric Number</label>
                    <input type="text" class="form-control-plaintext" "matric_num" value="{{old('matric_num',$application->user->profile->matric_num ?? Auth::user()->profile->matric_num)}}" readonly>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                    <label for="" class="form-label">IC Number</label>
                    <input type="text" class="form-control-plaintext" "ic_num" value="{{old('ic_num',$application->user->profile->ic_num ?? Auth::user()->profile->ic_num )}}" readonly>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <div class="form-label">Study Mode</div>
                    <input type="text" class="form-control-plaintext" "study_mode" value="{{old('study_mode',$application->user->profile->study_mode ?? Auth::user()->profile->study_mode )}}" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">            
            <div class="col-6">
                <label for="" class="form-label">Passport Number</label>
                <input type="text" class="form-control-plaintext" "passport_num" value="{{old('passport_num',$application->user->profile->passport_num ?? Auth::user()->profile->passport_num) }}" readonly>
            </div>
            <div class="col-6">
                <label for="" class="form-label">Citizenship</label>
                <input type="text" class="form-control-plaintext" "citizenship" value="{{old('citizenship',$application->user->profile->citizenship ?? Auth::user()->profile->citizenship )}}" readonly >
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <label for="" class="form-label">Department</label>
                <input type="text" class="form-control-plaintext" "department" value="{{old('department',$application->user->profile->department ?? Auth::user()->profile->department )}}" readonly >
            </div>
            <div class="col-6">
                <label for="" class="form-label">Faculty/Academy/Institute/Centre</label>
                <input type="text" class="form-control-plaintext" "faculty" value="{{old('faculty',$application->user->profile->faculty ?? Auth::user()->profile->faculty )}}" readonly >
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                    <label for="" class="form-label">Office Telephone Number</label>
                    <input type="text" class="form-control-plaintext" "office_num" value="{{old('office_num',$application->user->profile->office_num ?? Auth::user()->profile->office_num )}}" readonly >
            </div>
            <div class="col-6">
                    <label for="" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control-plaintext" "mobile_num" value="{{old('mobile_num',$application->user->profile->mobile_num ?? Auth::user()->profile->mobile_num )}}" readonly >
            </div>
                    
        </div>
    </div>
    <div class="form-group">
            <div class="row">
                    <div class="col-4">
                            <label for="" class="form-label">Email Address</label>
                    <input type="text" class="form-control-plaintext" "email" value="{{old('email',$application->user->email ?? Auth::user()->email)}}" readonly >
    
                    </div> 
            </div>
        </div>