@extends('backend.master') 
@section('content')
<div class='card center-block' style="width:80%">
    <div class='card-body'>
        <table class="table">
            <tr>
                <h2 class="text-center">Permission To Travel (Overseas) Form</h2>
            </tr>
            <tr>
                <td width="50%" class="align-middle">
                <img src="{{asset('img/logo.png')}}" alt="" width="80%" >
                </td>
                <td width="50%">
                To:<br>
                Associate Vice-Chancellor (International)<br>
                Office of the Deputy Vice-Chancellor<br>
                (Academic & International)<br>
                Level 9, Chancellery<br>
                University of Malaya 50603 Kuala Lumpur, MALAYSIA<br>
                Tel: 03-7967 7928/7929/7930 Fax: 03-7957 2314<br>
                Email: pnca@um.edu.my                
                </td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td>
                    <form action="">
                            @include('application::letters._applicant-details')
                            {{-- @include('application::components._travel-information') --}}
                            @include('application::components._attachment')
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection