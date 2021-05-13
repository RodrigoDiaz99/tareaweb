<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Prolife Army') }}</title>
   
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl.carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl.carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/aos/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jquery-flipster/css/jquery.flipster.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/army.png') }}" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

   
    @yield('content')
    @include('layouts.footer')
    <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/owl.carousel/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('vendors/aos/js/aos.js') }}"></script>
    <script src="{{ asset('vendors/jquery-flipster/js/jquery.flipster.min.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
</body>

</html>
