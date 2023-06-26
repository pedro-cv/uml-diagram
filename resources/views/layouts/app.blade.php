<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta11
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/rappid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-picker.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.dark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.modern.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    <!-- CSS files -->
    {{-- <link href="{{ asset('back/dist/libs/dropzone/dist/dropzone.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('back/dist/css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/dist/css/demo.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('./back/dist/css/demo.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('back/dist/css/dragdrop.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--Iconos tabler-->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <style>
        .colorchange:hover{
            color:rgb(255, 170, 0);
        }
    </style>
    <!-- Scripts -->
</head>

<body>
    {{-- <div class="page"> --}}
        @include('layouts.header')
        {{-- @include('layouts.navbar') --}}
        {{ $slot }}
        {{-- @yield('content') --}}
        @include('layouts.footer')
        {{-- </div> --}}
        
        <!-- Libs JS -->
        
        
        {{-- <script src="{{ asset('back/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('back/dist/libs/litepicker/dist/litepicker.js') }}" defer></script>
        --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
        <script src="{{ asset('back/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('back/dist/libs/litepicker/dist/litepicker.js') }}" defer></script> --}}
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{asset('/js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
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

    <!-- Tabler Core -->
    @stack('scripts')


    <script src="{{ asset('back/dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('back/dist/js/demo-theme.min.js') }}"></script>
</body>

</html>
