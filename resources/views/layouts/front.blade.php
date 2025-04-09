<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Familiarfaces - @yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('template_frontend/favicon.svg') }}" type="image/svg+xml">

    <!-- custom css link -->
    <link rel="stylesheet" href="{{ asset('template_frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template_frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_frontend/assets/css/owl.theme.default.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('template_frontend/assets/css/bootstrap.min.css') }}"> -->

    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
    @include('layouts.inc.frontnavbar')

    <main>
        <article>
            @yield('content')
        </article>
    </main>

    @include('layouts.inc.frontfooter')


    <!-- custom js link -->
    <script src="{{ asset('template_frontend/assets/js/script.js') }}"></script>
    <script src="{{ asset('template_frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('template_frontend/assets/js/owl.carousel.min.js') }}"></script>
    <!-- <script src="{{ asset('template_frontend/assets/js/bootstrap.bundle.min.js') }}"></script> -->

    <!-- ionicon link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    @yield('sweetalert')
    @yield('js')
</body>

</html>