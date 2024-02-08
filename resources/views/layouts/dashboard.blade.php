<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8">
   <title>@yield('title')</title>
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">
   <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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