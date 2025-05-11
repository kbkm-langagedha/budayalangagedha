<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title', 'Budaya Langagedha - Nusa Tenggara Timur')</title>
    <link rel="icon" href="{{ asset('assets/images/icon.webp') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('description', 'Budaya Langagedha - Nusa Tenggara Timur')" name="description">
    <meta content="@yield('keywords', '')" name="keywords">
    <meta content="@yield('author', '')" name="author">
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('template/css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/swiper.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/coloring.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/custom.css') }}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="{{ asset('template/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css">

    @stack('styles')

</head>

<body>
    <div id="wrapper">
        <a href="#" id="back-to-top"></a>

        <!-- preloader begin -->
        <div id="de-loader"></div>
        <!-- preloader end -->

        @include('frontend.layouts.header')

        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            @yield('content')
        </div>
        <!-- content end -->

        @include('frontend.layouts.footer')
    </div>

    @include('frontend.layouts.overlay')

    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('template/js/plugins.js') }}"></script>
    <script src="{{ asset('template/js/designesia.js') }}"></script>
    <script src="{{ asset('template/js/swiper.js') }}"></script>
    <script src="{{ asset('template/js/custom-swiper-3.js') }}"></script>
    <script src="{{ asset('template/js/custom-marquee.js') }}"></script>

    @stack('scripts')
</body>

</html>