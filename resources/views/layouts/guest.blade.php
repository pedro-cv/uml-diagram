<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta11
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif !important;
        }
    </style>
    <link rel="icon" href="{{ asset('back/static/icon.png') }}">

    <!-- CSS files -->
    <link href="{{ asset('back/dist/css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/dist/css/demo.min.css') }}" rel="stylesheet" />
    @stack('stylesheets')
</head>

<body class="border-top-wide border-primary d-flex flex-column">

    {{ $slot }}


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            };
            toastr.success("{{ session('message') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            };
            toastr.error("{{ session('error') }}");
        @endif
    </script>
    <script src="{{ asset('back/dist/js/tabler.min.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('back/dist/js/demo-theme.min.js') }}"></script>
</body>

</html>
