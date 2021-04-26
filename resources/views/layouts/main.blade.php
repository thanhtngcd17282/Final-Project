<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>WeKam TV</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        @yield('custom-css')
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
	</head>
	<body class="is-preload">
		<!-- Header -->
        @yield('content')
        <!-- Footer -->
    <footer class="bg-dark text-center text-lg-start text-light">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">WeKam © 2021 Copyright:
        <a class="text-light" href="#">Wekam.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/browser.min.js') }}"></script>
        <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/util.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
        @yield('custom-js')
	</body>
</html>
