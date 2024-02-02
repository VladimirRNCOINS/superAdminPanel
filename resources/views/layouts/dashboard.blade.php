<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8">
   <title>@yield('title')</title>
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    @include('assets.header')
    <div class="wrap_main">
        <div class="left_dashboard_panel"> 
            @if(Auth::check() && Session::get('SuperAdmin') == '7')  
                @include('assets.leftMenuAdmin')
            @endif
        </div>
        <div class="admin_container">
            @yield('content')
        </div>
    </div>
</body>
</html>