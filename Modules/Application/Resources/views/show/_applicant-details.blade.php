<div class="mt-5">
</div>
<div class="col">
    <table class="table table-striped table-bordered">
        <tr>
            <td><label for="" class="form-label">Application Ref. No.</label></td>
            <td>ETRAVEL/2018/01/0001</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Applicant Name</label></td>
            <td>{{  $application->user->studentProfile->MBUT_NAMA}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Matric Number</label></td>
            <td>{{$application->user->studentProfile->PBP_NODAFTAR}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">IC Number/Passport Number</label></td>
            <td>{{ $application->user->studentProfile->MBUT_NOMKPB }}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Study Level</label></td>
            <td>{{ Auth::user()->studentProfile->PBP_JENIS_PENGAJIAN }}</td>
        </tr>        
        <tr>
            <td><label for="" class="form-label">Department</label></td>
            <td>{{$application->user->studentProfile->JAB_HRIS}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Faculty/Academy/Institute/Centre</label></td>
            <td>{{$application->user->studentProfile->FKLTI_KTRGN }}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Mobile Number</label></td>
            <td>{{$application->user->profile->mobile_num}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Email Address</label></td>
            <td>{{$application->user->studentProfile->SIS_EMEL}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Alternate Email Address</label></td>
            <td>{{$application->alternate_email}}</td>
        </tr>
    </table>
</div>