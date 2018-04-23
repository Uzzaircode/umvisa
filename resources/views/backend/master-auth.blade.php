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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />
    @yield('chart-css')    
    @yield('maps-css')  
    <style>
    body{
        
  background: #076585; /* fallback for old browsers */
  background: -webkit-linear-gradient(to top, #076585, #fff); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to top, #076585, #fff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    </style> 
</head>

<body class="">
    <div class="page">
        <div class="page-single">                        
                @yield('content')
        </div>        
    </div>
    <script src="{{asset('js/require.min.js')}}"></script>
    <script type="text/javascript">
        requirejs.config({
            baseUrl: '.'
        });
    </script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    @yield('chart-js')
    @yield('maps-js')
    @yield('input-mask-js')
</body>

</html>