<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @stack('meta')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{asset('assets\images\favicon.ico')}}">
    <link href="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css">
    @stack('style')
{{--    <link rel="stylesheet" href="{{asset('css/htt.css')}}">--}}
</head>
<body class="antialiased">
<div id="wrapper">
@include('admin.includes.header')
@include('admin.includes.left-menu')
    <div class="content-page">
        <div class="content">
            @yield('content')
        </div>
    </div>

@include('admin.includes.footer')
</div>
<div class="rightbar-overlay"></div>
<script src="{{asset('assets\js\vendor.min.js')}}"></script>

<script src="{{asset('assets\js\app.min.js')}}"></script>
@stack('script')
</body>
</html>
