@dynamicCard(['title'=>'Applicant Details','class'=>''])
@slot('body')
<div class="form-group" @if ($errors->has('subject')) has-error @endif>    
    <div class="row">
        <div class="col-12">
            <label for="" class="form-label">Applicant Name</label>
            <input type="text" class="form-control" value="{{Auth::user()->studentProfile->MBUT_NAMA}}" readonly>
            @include('shared._errors',['entity'=>'name'])
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Matric Number</label>
            <input type="text" class="form-control" value="{{Auth::user()->studentProfile->PBP_NODAFTAR}}" readonly>
            @include('shared._errors',['entity'=>'matric_num'])
        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="form-label">Study Level</div>
                <input type="text" class="form-control" value="{{Auth::user()->studentProfile->PBP_KOD_IJAZAH}}"
                    readonly>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">IC Number/Passport Number</label>
            <input type="text" class="form-control" value="{{Auth::user()->studentProfile->MBUT_NOMKPB}}" readonly>
            @include('shared._errors',['entity'=>'ic_num'])
        </div>
        <div class="col-6">
            <label for="" class="form-label">Nationality</label>
            <input type="text" class="form-control" value="{{Auth::user()->studentProfile->MBUT_ASAL}}" readonly>
            @include('shared._errors',['entity'=>'citizenship'])
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Department</label>
            <input type="text" class="form-control" value="{{
            Auth::user()->studentProfile->JAB_HRIS}}"
                readonly>
            @include('shared._errors',['entity'=>'department'])
        </div>
        <div class="col-6">
            <label for="" class="form-label">Faculty/Academy/Institute/Centre</label>
            <input type="text" class="form-control" value="{{Auth::user()->studentProfile->FKLTI_KTRGN}}" readonly>
            @include('shared._errors',['entity'=>'faculty'])
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" value="{{Auth::user()->studentProfile->MBUT_TEL_BIMBIT}}" readonly>
            @include('shared._errors',['entity'=>'mobile_num'])
        </div>
        <div class="col-6">
            <label for="" class="form-label">Email Address</label>
            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" readonly>
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