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
    <link rel="stylesheet" href="{{asset('css/error.css')}}">

    @stack('links')
</head>

<body>
    <!-- ======= Header ======= -->
    @include('layout.header')

    <!-- ======= Main ======= -->
    <main>
        @yield('main')

        <div id="Container">
            <div id="nose-top"></div>
            <div id="nose-bottom"></div>
            <div id="nose"></div>
            <div id="front-wing"></div>
            <div id="top-front-wing-trim"></div>
            <div id="bottom-front-wing-trim"></div>
            <div id="top-front-wing-trim-2"></div>
            <div id="bottom-front-wing-trim-2"></div>
            <div id="top-front-wing"></div>
            <div id="top-front-wing-tail"></div>
            <div id="bottom-front-wing"></div>
            <div id="bottom-front-wing-tail"></div>
            <div id="bottom-front-wheel" class="wheel"></div>
            <div id="bottom-back-wheel"></div>
            <div id="top-front-wheel" class="wheel"></div>
            <div id="top-back-wheel"></div>
            <div id="rear-body"></div>
            <div id="rear-wing-bg"></div>
            <div id="rear-wing"></div>
            <div id="top-body-curve"></div>
            <div id="top-body-curve-cut"></div>
            <div id="top-body-curve-straight"></div>
            <div id="top-body-curve-straight-2"></div>
            <div id="bottom-body-curve"></div>
            <div id="bottom-body-curve-cut"></div>
            <div id="bottom-body-curve-straight"></div>
            <div id="bottom-body-curve-straight-2"></div>
            <div id="back-body-curve"></div>
            <div id="body-hood"></div>
            <div id="back-body"></div>
            <div id="back-body-top"></div>
            <div id="back-body-bottom"></div>
            <div id="back-body-2"></div>
            <div id="top-spoke-1"></div>
            <div id="top-spoke-2"></div>
            <div id="top-spoke-3"></div>
            <div id="top-spoke-4"></div>
            <div id="bottom-spoke-1"></div>
            <div id="bottom-spoke-2"></div>
            <div id="bottom-spoke-3"></div>
            <div id="bottom-spoke-4"></div>

            <div id="back-spoke"></div>

            <div id="mirror-top"></div>
            <div id="mirror-bottom"></div>
            <div id="driver-bg"></div>
            <div id="driver-wheel"></div>
            <div id="driver-helmet"></div>
            <div id="bottom-body-spine"></div>
            <div id="top-body-spine"></div>
            <div id="end-body-spine"></div>
            <div id="top-body-spine-2"></div>
            <div id="bottom-body-spine-2"></div>
        </div>

        @if(Auth::check() && Auth::user()->isAdmin)
        @include('components.message-modal')
        @endif
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