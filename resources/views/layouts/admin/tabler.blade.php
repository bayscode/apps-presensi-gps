<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <script defer data-api="/stats/api/event" data-domain="tabler.io" src="/stats/js/script.js"></script>
    <meta name="msapplication-TileColor" content="" />
    <meta name="theme-color" content="" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <meta name="description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!" />
    <meta name="canonical" content="https://tabler.io/demo/layout-combo.html">
    <meta name="twitter:image:src" content="https://tabler.io/demo/static/og.png">
    <meta name="twitter:site" content="@tabler_ui">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title"
        content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta name="twitter:description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <meta property="og:image" content="https://tabler.io/demo/static/og.png">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <meta property="og:site_name" content="Tabler">
    <meta property="og:type" content="object">
    <meta property="og:title"
        content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta property="og:url" content="https://tabler.io/demo/static/og.png">
    <meta property="og:description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <!-- CSS files -->
    <link href="{{ asset('tabler/dist/css/tabler.min.css?1685976624') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css?1685976624') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css?1685976624') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css?1685976624') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/demo.min.css?1685976624') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="{{ asset('tabler/dist/js/demo-theme.min.js?1685976624') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- Navbar -->
        @include('layouts.admin.header')
        <div class="page-wrapper">
            @yield('content')
            <!-- Footer -->
            @include('layouts.admin.footer')
        </div>
    </div>

    <!-- Libs JS -->
    <script src="{{ asset('tabler/dist/libs/apexcharts/dist/apexcharts.min.js?1685976624') }}" defer></script>
    <script src="{{ asset('tabler/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1685976624') }}" defer></script>
    <script src="{{ asset('tabler/dist/libs/jsvectormap/dist/maps/world.js?1685976624') }}" defer></script>
    <script src="{{ asset('tabler/dist/libs/jsvectormap/dist/maps/world-merc.js?1685976624') }}" defer></script>
    <!-- Tabler Core -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('tabler/dist/js/tabler.min.js?1685976624') }}" defer></script>
    <script src="{{ asset('tabler/dist/js/demo.min.js?1685976624') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    @stack('myscript')
</body>

</html>
