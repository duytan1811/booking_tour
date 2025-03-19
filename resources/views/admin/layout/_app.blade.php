<!doctype html>
<html lang="en" class="remember-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>UI Framework</title>
    <link rel="shortcut icon" href="/theme/admin/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/theme/admin/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/theme/admin/media/favicons/apple-touch-icon-180x180.png">
    @vite(['resources/css/app_admin.css', 'resources/js/app_admin.js'])
</head>

<body>

    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
        @include('admin.layout._sidebar')

        @include('admin.layout._header')

        <main id="main-container">
            <div class="content" style="max-width:100% !important">
                @yield('content')
            </div>
        </main>

        @include('admin.layout._footer')
    </div>

    @include('admin.layout._toastr')
    @include('admin.layout._datatables')
    @include('admin.layout._confirm_delete')
    @yield('extra_scripts')
</body>

</html>
