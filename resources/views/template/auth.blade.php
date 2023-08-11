<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>

    <!-- CSS files -->
    <link href="{{ asset('template/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('template/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('template/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('template/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('template/dist/css/demo.min.css?1684106062') }}" rel="stylesheet" />
</head>

<body class=" d-flex flex-column">
    <element class="element-1" id="element-1"></element>
    <script src="{{ asset('template/dist/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">

            @if (session()->has('success'))
                <div class="alert alert-success" id="session-alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger" id="session-alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </div>
    </div>

    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('template/dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('template/dist/js/demo.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('template/jquery/jquery.js') }}"></script>
    <script>
        $(document).ready(function() {
            let alertSuccess = $('#session-alert-success');
            let alertError = $('#session-alert-error');

            setTimeout(function() {
                alertSuccess.fadeOut();
            }, 2000);
            
            setTimeout(function() {
                alertError.fadeOut();
            }, 2000);
        });
    </script>

    @yield('script')

</body>

</html>
