<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Billar') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href={{ asset('css/sb-admin-2.min.css') }} rel="stylesheet">

    <link href={{ asset('css/bootstrap-grid.min.css') }} rel="stylesheet">
    <link href={{ asset('css/bootstrap-grid.rtl.min.css') }} rel="stylesheet">
    <link href={{ asset('css/bootstrap-reboot.min.css') }} rel="stylesheet">
    <link href={{ asset('css/bootstrap-reboot.rtl.min.css') }} rel="stylesheet">
    <link href={{ asset('css/bootstrap-utilities.min.css') }} rel="stylesheet">
    <link href={{ asset('css/bootstrap-utilities.rtl.min.css') }} rel="stylesheet">
    <link href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('css/bootstrap.rtl.min.css') }} rel="stylesheet">


    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" id="page-top">
    <div id="wrapper">
        @include('layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.header')
                <!-- Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
