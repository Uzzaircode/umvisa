@dynamicCard(['title'=>'Applicant Details','class'=>''])
@slot('body')
<div class="form-group" @if ($errors->has('subject')) has-error @endif>
    <input type="hidden" name="user_id" value="{{Auth::id()}}">
    <div class="row">
        <div class="col-3">
            <label for="" class="form-label">Salutation</label>
            <input type="text" class="form-control" value="{{old('title',$application->user->profile->title ?? Auth::user()->profile->title)}}"
                readonly>
            @include('shared._errors',['entity'=>'salutation'])
        </div>
        <div class="col-9">
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
            <input type="text" class="form-control" value="{{old('matric_num',$application->user->profile->matric_num ?? Auth::user()->profile->matric_num)}}"
                readonly>
            @include('shared._errors',['entity'=>'matric_num'])
        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="form-label">Study Level</div>
                <input type="text" class="form-control" value="{{old('study_mode', $application->user->profile->study_mode ?? Auth::user()->profile->study_mode)}}"
                    readonly>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-4">
            <label for="" class="form-label">IC Number</label>
            <input type="text" class="form-control" value="{{old('ic_num',$application->user->profile->ic_num ?? Auth::user()->profile->ic_num )}}"
                readonly>
            @include('shared._errors',['entity'=>'ic_num'])
        </div>
        <div class="col-4">
            <label for="" class="form-label">Passport Number</label>
            <input type="text" class="form-control" value="{{old('passport_num',$application->user->profile->passport_num ?? Auth::user()->profile->passport_num) }}" readonly>
            @include('shared._errors',['entity'=>'passport_num'])
        </div>
        <div class="col-4">
            <label for="" class="form-label">Nationality</label>
            <input type="text" class="form-control" value="{{old('citizenship',$application->user->profile->citizenship ?? Auth::user()->profile->citizenship )}}"
                readonly>
            @include('shared._errors',['entity'=>'citizenship'])
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Department</label>
            <input type="text" class="form-control" value="{{old('department',$application->user->profile->department ?? Auth::user()->profile->department )}}"
                readonly>
            @include('shared._errors',['entity'=>'department'])
        </div>
        <div class="col-6">
            <label for="" class="form-label">Faculty/Academy/Institute/Centre</label>
            <input type="text" class="form-control" value="{{old('faculty',$application->user->profile->faculty ?? Auth::user()->profile->faculty )}}"
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
            <input type="text" class="form-control" name="alternate_email" placeholder="Ensure the email is active">
        </div>
    </div>

</div>
@endslot
@enddynamicCard