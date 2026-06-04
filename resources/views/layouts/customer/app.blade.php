<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShopEase Customer')</title>
    <meta name="theme-color" content="#0f172a">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg+xml" sizes="any" href="{{ asset('images/home/shopease-favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @stack('css')
</head>
<body class="dashboard-page customer-page">
    <div class="customer-shell" data-customer-shell>
        <div class="customer-shell__backdrop" data-customer-sidebar-overlay></div>

        @include('layouts.customer.sidebar')

        <div class="customer-shell__page">
            @include('layouts.customer.header')

            <main class="customer-content">
                @yield('customer_content')
            </main>

            @include('layouts.customer.footer')
        </div>
    </div>

    <script src="{{ asset('js/common.js') }}" defer></script>
    @stack('js')
</body>
</html>
