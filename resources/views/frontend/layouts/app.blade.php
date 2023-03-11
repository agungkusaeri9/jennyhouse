<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Title -->
    <title>{{ $title ?? 'Jenni House' }}</title>

    <!--
  CSS
  ============================================= -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">
    @vite('resources/js/app.js')
</head>

<body>

    <!-- Start Header Area -->
    <x-Frontend.navbar />
    <!-- End Header Area -->

    @yield('content')

    <!-- start footer Area -->
    <x-Frontend.Footer />
    <!-- End footer Area -->


    <script src="{{ asset('assets/frontend/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    {{-- <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script> --}}
    <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}')
        </script>
    @elseif(session('error'))
        <script>
             toastr.error('{{ session('error') }}');
        </script>
    @endif

</body>

</html>
