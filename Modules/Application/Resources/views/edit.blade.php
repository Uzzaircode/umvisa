@extends('backend.master')
@section('content')
<div class="row">
    @isset($application)
    @include('application::components._progress') @endisset
    <div class="col-lg-7 col-md-7">
        @if(isset($application->id))
        <form action="{{route('applications.update',['id'=>$application->id])}}" class="" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}} @else
            <form action="{{route('applications.store')}}" class="" method="POST" enctype="multipart/form-data">
                @endif
                <div class="card">
                    <div class="card-header sticky-top" style="background:white">
                        <h3 class="card-title"><i class="fe fe-file-text"></i> Edit Application</h3>
                        <div class="card-options">
                            @include('application::components._form-action-buttons')

                        </div>
                    </div>
                    <div class="card-body">
                        @include('application::components._participant-list')
                        @csrf
                        @include('application::components._supervisor')
                        @include('application::components._travel-information')
                        @include('application::components._financial-aid')
                        @include('application::components._attachment')

                    </div>
                </div>
    </div>
    </form>
    <div class="col col-lg-5 col-md-5">
        <div class='card'>
            <div class='card-header'>
                <p class='card-title'>Recommendations</p>
            </div>
            <div class='card-body'>
                @include('application::components._remarks')

            </div>
        </div>
    </div>
    <div class="overlay"></div>

</div>


@endsection

@section('page-css')
<link rel="stylesheet" href="{{asset('vendors/flag-icon-css-3/css/flag-icon.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@include('asset-partials.dropzone.css.file')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/select2.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<style>
    /* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

#sidebar {
    width: 100%;
    position: fixed;
    top: 0;
    left: -100%;
    height: 100vh;
    z-index: 1200;
    background: #fff;
    color: #fff;
    transition: all 0.3s;
    overflow-y: scroll;
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
}

#sidebar.active {
    left: 0;
}

#dismiss {
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    background: red;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

#dismiss:hover {
    background: #fff;
    color: #7386D5;
}

.overlay {
    display: none;
    position: fixed;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.7);
    z-index: 998;
    opacity: 0;
    transition: all 0.5s ease-in-out;
}
.overlay.active {
    display: block;
    opacity: 1;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #f8f9fa;
    color: #000000;
}

    </style>
@endsection

@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
@include('application::asset-partials.app-form')
@include('asset-partials.dropzone.js.file')
@include('asset-partials.selectize')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('.supervisor').select2({
        placeholder: 'Please choose',
        theme: 'bootstrap4',
        ajax: {
            url: '/applications/users/search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.email,
                            id: item.email,

                        }
                    })
                };
            },
            cache: true,
            allowClear: true
        }
    });
    $('.college-fellow').select2({
        placeholder: 'Please choose',
        theme: 'bootstrap4',
        ajax: {
            url: '/applications/users/search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.email,
                            id: item.email,

                        }
                    })
                };
            },
            cache: true,
            allowClear: true
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
@endsection