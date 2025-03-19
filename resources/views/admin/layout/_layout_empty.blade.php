<!doctype html>
<html lang="en" class="remember-theme">

<head>
    <meta charset="utf-8">
    <title>Codebase</title>

    <link rel="shortcut icon" href="/theme/admin/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/theme/admin/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/theme/admin/media/favicons/apple-touch-icon-180x180.png">
    @vite(['resources/css/app_admin.css', 'resources/js/app_admin.js'])
</head>

<body>
    <div id="page-container" class="main-content-boxed">
        <main id="main-container">
            @yield('content')
        </main>
    </div>

</body>

</html>
