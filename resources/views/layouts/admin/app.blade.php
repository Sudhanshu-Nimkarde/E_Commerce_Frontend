<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShopEase Admin')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0f172a">
    <link rel="icon" type="image/svg+xml" sizes="any" href="{{ asset('images/home/shopease-favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('css')
</head>
<body class="admin-page">
    <div class="admin-shell d-lg-flex">
        @include('layouts.admin.sidebar')

        <div class="admin-main flex-grow-1 min-vw-0 d-flex flex-column">
            @include('layouts.admin.header')

            <main class="admin-content flex-grow-1">
                <div class="container-fluid px-3 px-lg-4 py-4">
                    @yield('main_content')
                </div>
            </main>

            @include('layouts.admin.footer')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    @stack('js')
</body>
</html>
