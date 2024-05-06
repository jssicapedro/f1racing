<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{asset('img/F1Racing/favicon.png')}}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    
    <!-- Splide -->
    <link rel="stylesheet" href="{{ asset('js/splide/dist/css/splide.min.css') }}">
    <script src="{{ asset('js/splide/dist/js/splide.min.js') }}"></script>

    
    @yield('links')
    @stack('links')
</head>

<body>
    <!-- ======= Header ======= -->
    @include('layout.header')

    <!-- ======= Main ======= -->
    <main>@yield('main')</main>

    <!-- ======= Footer ======= -->
    @include('layout.footer')


    <script src="https://cdn2.hubspot.net/hubfs/476360/Chart.js"></script>
    <script src="https://cdn2.hubspot.net/hubfs/476360/utils.js"></script>
    @yield('scripts')
    @stack('scripts')
</body>

</html>