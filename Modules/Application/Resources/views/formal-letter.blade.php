@extends('backend.master') 
@section('content')
<div class='card align-middle' width="80%">
    <div class='card-body'>
        @include('application::letters._header')
        <table class="table">
            <tr>
                <td>
                    <form action="">
                            @include('application::letters._applicant-details')
                            <hr>
                            @include('application::letters._travel-information')                            
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection