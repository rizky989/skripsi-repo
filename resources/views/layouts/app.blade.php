<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Web Repo</title>
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="{{ asset('core-ui') }}/css/style.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@icon/coreui-icons-free@1.0.1-alpha.1/coreui-icons-free.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

    <!-- Google Fonts | Open Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('image/logo.jpeg')}}" >
    <style>
        .scroll-container {
            scroll-behavior: smooth!important;
        }
    </style>
    @stack('styles')
</head>


<body class="app">
    <div class="wrapper fixed-components" style="z-index: 1">
        <header class="header header-light header-fixed header-with-subheader border-0 shadow-sm">
            @include('layouts.nav')
        </header>

        <div class="body scroll-container">
            <main class="main">
                @yield('content')
            </main>
            <footer class="footer border-0 py-5 mx-auto">
                <div>COPYRIGHT © 2021 - DESIGNED & DEVELOPED BY CHYNTIA SIMATUPANG</div>
            </footer>
        </div>
    </div>

</body>

<!-- Jquery plugins-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- CoreUI and necessary plugins-->
<script src="{{ asset('core-ui') }}/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<!--[if IE]><!-->
<script src="{{ asset('core-ui') }}/vendors/@coreui/icons/js/svgxuse.min.js"></script>
<!--<![endif]-->
@stack('scripts')

</html>
