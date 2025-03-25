<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('template/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title') - Clothing Brand Store</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('template/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Datatables -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendor/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('template/assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('template/assets/js/config.js') }}"></script>
</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Sidebar -->
            @include('layouts.sidebar')
            <!-- End Sidebar -->

            <div class="layout-page">
                @include('layouts.navbar')

                @yield('content')

                
            </div>

        </div>
    </div>


    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('template/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('template/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('template/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('template/assets/js/dashboards-analytics.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('template/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Sweet Alert -->
    <!-- <script src="{{ asset('template/assets/vendor/sweetalert/sweetalert.min.js') }}"></script> -->

    @yield('js')
</body>

</html>