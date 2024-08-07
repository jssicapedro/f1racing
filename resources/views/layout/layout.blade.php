<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{asset('img/F1Racing/favicon.png')}}">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


    <!-- Splide -->
    <link rel="stylesheet" href="{{ asset('js/splide/dist/css/splide.min.css') }}">
    <script src="{{ asset('js/splide/dist/js/splide.min.js') }}"></script>

    <link rel="stylesheet" href="{{asset('css/layout.css')}}">

    @stack('links')
</head>

<body>
    <!-- ======= Header ======= -->
    @include('layout.header')

    <!-- ======= Main ======= -->
    <main>
        @yield('main')

    </main>

    <!-- ======= Footer ======= -->
    @include('layout.footer')
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- datepicker -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <!-- chart -->
    <script src="https://cdn2.hubspot.net/hubfs/476360/Chart.js"></script>
    <script src="https://cdn2.hubspot.net/hubfs/476360/utils.js"></script>
    @stack('scripts')
    <script src="{{ asset('js/modal.js') }}"></script>
</body>

</html>