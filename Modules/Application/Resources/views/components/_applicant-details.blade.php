@dynamicCard(['title'=>'Applicant Details','class'=>''])
@slot('body')
<div class="form-group" @if ($errors->has('subject')) has-error @endif>
    <input type="hidden" name="user_id" value="{{Auth::id()}}">
    <div class="row">
        <!-- <div class="col-3">
            <label for="" class="form-label">Salutation</label>
            <input type="text" class="form-control" value="{{old('title',$application->user->profile->title ?? Auth::user()->profile->title)}}"
                readonly>
            @include('shared._errors',['entity'=>'salutation'])
        </div> -->
        <div class="col-12">
            <label for="" class="form-label">Applicant Name</label>
            <input type="text" class="form-control" value="{{old('name',$application->user->name ?? Auth::user()->name)}}"
                readonly>
            @include('shared._errors',['entity'=>'name'])
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Matric Number</label>
            <input type="text" class="form-control" value="{{old('matric_num',$application->user->profile->matric_num ?? Auth::user()->studentProfile->PBP_NODAFTAR)}}"
                readonly>
            @include('shared._errors',['entity'=>'matric_num'])
        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="form-label">Study Level</div>
                <input type="text" class="form-control" value="{{old('study_mode', $application->user->profile->study_mode ?? Auth::user()->studentProfile->PBP_JENIS_PENGAJIAN)}}"
                    readonly>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">IC Number/Passport Number</label>
            <input type="text" class="form-control" value="{{old('ic_num',Auth::user()->studentProfile->PBP_NOMKPB )}}"
                readonly>
            @include('shared._errors',['entity'=>'ic_num'])
        </div>        
        <div class="col-6">
            <label for="" class="form-label">Nationality</label>
            <input type="text" class="form-control" value="{{old('citizenship',Auth::user()->studentProfile->MBUT_WARGA )}}"
                readonly>
            @include('shared._errors',['entity'=>'citizenship'])
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Department</label>
            <input type="text" class="form-control" value="{{old('department',
            Auth::user()->studentProfile->JAB_HRIS)}}"
                readonly>
            @include('shared._errors',['entity'=>'department'])
        </div>
        <div class="col-6">
            <label for="" class="form-label">Faculty/Academy/Institute/Centre</label>
            <input type="text" class="form-control" value="{{old('faculty',$application->user->profile->faculty ?? Auth::user()->studentProfile->FKLTI_KTRGN )}}"
                readonly>
            @include('shared._errors',['entity'=>'faculty'])
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" value="{{old('mobile_num',$application->user->profile->mobile_num ?? Auth::user()->profile->mobile_num)}}"
                readonly>
            @include('shared._errors',['entity'=>'mobile_num'])
        </div>
        <div class="col-6">
            <label for="" class="form-label">Email Address</label>
            <input type="text" class="form-control" name="email" value="{{old('email',$application->user->email ?? Auth::user()->email)}}"
                readonly>
            @include('shared._errors',['entity'=>'email'])
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">        
        <div class="col-6">
            <label for="" class="form-label">Your Alternative E-mail</label>
            <input type="text" class="form-control" name="alternate_email" placeholder="Your active e-mail only">
        </div>
    </div>

</div>
@endslot
@enddynamicCard