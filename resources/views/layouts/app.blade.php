<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <title>Sera Gazı Emisyonu Hesaplama</title>
    @include('layouts.styles')
</head>
<body>
<div class="menu-ovelay"></div>
<div class="dash">
    <div class="dash-app">
        @yield('content')
    </div>
</div>
@include('layouts.scripts')
@yield('scripts')
</body>
</html>

