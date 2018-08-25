<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />       
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    @yield('datatables-css')
    @yield('page-css')
</head>

<body class="">
    <div class="page">
        <div class="page-main">
            {{-- Header --}} 
            @include('backend.partials.header') {{-- Main Content --}}
            <div class="my-3 my-md-5">
                <div class="container">                    
                        @yield('content')                    
                </div>
            </div>
        </div>
        {{-- Footer --}} 
        @include('backend.partials.footer')
    </div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="{{asset('js/vendors/bootstrap.bundle.min.js')}}"></script>       
    @yield('datatables-js')
    @yield('selectize-js')
    @yield('input-file-js')
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script type="text/javascript">
		toastr.options.progressBar = true;
		toastr.options.positionClass = 'toast-top-center';
		toastr.options.closeButton = true;
		toastr.options.closeDuration = 600;
		@if(Session::has('status'))
			toastr.success("{{Session::get('status')}}");
		@endif
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}");
        @endif
        @if(Session::has('info'))
            toastr.info("{{Session::get('info')}}");
        @endif
        @if(Session::has('deleted'))
            toastr.success("{{Session::get('deleted')}}");
        @endif
		@if(Session::has('fail'))
            toastr.error("{{Session::get('fail')}}");
        @endif
		@if(Session::has('warning'))
			toastr.warning("{{Session::get('warning')}}");
		@endif
    </script>
    @yield('page-js')
</body>

</html>