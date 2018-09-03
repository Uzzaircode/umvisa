<div class="mt-5">
    {{--
    <h3>Applicant Details</h3>
    <hr> --}}
</div>
<div class="col">
    <table class="table table-striped table-bordered">
        <tr>
            <td><label for="" class="form-label">Applicant Name</label></td>
            <td>{{$application->user->name}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Matric Number</label></td>
            <td>{{$application->user->profile->matric_num}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">IC Number</label></td>
            <td>{{$application->user->profile->ic_num}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Study Level</label></td>
            <td>{{$application->user->profile->study_mode}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Passport Number</label></td>
            <td>{{$application->user->profile->passport_num}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Department</label></td>
            <td>{{$application->user->profile->department}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Faculty/Academy/Institute/Centre</label></td>
            <td>{{$application->user->profile->faculty}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Mobile Number</label></td>
            <td>{{$application->user->profile->mobile_num}}</td>
        </tr>
        <tr>
            <td><label for="" class="form-label">Email Address</label></td>
            <td>{{$application->user->email}}</td>
        </tr>
    </table>
</div>