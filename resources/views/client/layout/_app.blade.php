<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - {{ isset($app_settings) ? $app_settings['app_name'] : 'Booking tour' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/client/img/favicons/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app_client.css', 'resources/js/app_client.js'])
</head>

<body>
    @include('client.layout._header')

    @yield('content')
    @include('client.layout._footer')

    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>

</body>

</html>
