<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8">
   <title>@yield('title')</title>
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    @include('assets.header')

    <div class="container">
        @yield('content')
    </div>
</body>
</html>