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
    <link href="{{asset('assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    <style>
    
    </style>
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
<script src="{{asset('assets\libs\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets\libs\datatables\dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets\libs\datatables\dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets\libs\datatables\responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets\libs\datatables\dataTables.buttons.min.js')}}"></script>

 <!-- Datatables init -->
 <script src="{{asset('assets\js\pages\datatables.init.js')}}"></script>
 <script src="{{asset('js/app.js')}}"></script>
 @include('vendor.sweetalert.alert')
@stack('script')
</body>
</html>
