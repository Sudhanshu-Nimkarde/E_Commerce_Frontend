<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShopEase - Your One-Stop Shopping Destination')</title>
    <meta name="theme-color" content="#0f172a">
    <link rel="icon" type="image/svg+xml" sizes="any" href="{{ asset('images/home/shopease-favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')
</head>
<body class="auth-page">
    <main class="auth-shell">
        @yield('content')
    </main>

    <script src="{{ asset('js/common.js') }}" defer></script>
    @stack('js')
</body>
</html>
