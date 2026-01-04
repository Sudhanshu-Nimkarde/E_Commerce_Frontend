<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Comm Store | Futuristic UI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --soft-blue: #f0f7ff;
            --deep-blue: #0099ff;
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--soft-blue);
            color: #44556e;
            overflow-x: hidden;
        }

        /* Futuristic Card Styling */
        .f-card {
            background: #ffffff;
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 153, 255, 0.05);
            transition: all 0.3s ease;
        }

        .f-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 153, 255, 0.1);
        }

        /* Gradient Button */
        .btn-gradient {
            background: linear-gradient(135deg, #00d2ff 0%, #0099ff 100%);
            border: none;
            color: white;
            border-radius: 12px;
            font-weight: 600;
            padding: 10px 24px;
        }

        /* Sidebar Styling */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            background: white;
            border-right: 1px solid #eef2f6;
            padding: 20px;
            z-index: 1000;
        }

        .nav-link {
            color: #64748b;
            padding: 12px 20px;
            border-radius: 15px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            transition: 0.3s;
        }

        .nav-link i { margin-right: 12px; font-size: 1.2rem; }

        .nav-link.active {
            background: var(--deep-blue);
            color: white !important;
            box-shadow: 0 8px 15px rgba(0, 153, 255, 0.3);
        }

        /* Top Navbar */
        .top-navbar {
            margin-left: var(--sidebar-width);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 15px 30px;
            border-bottom: 1px solid #eef2f6;
        }

        .content-wrapper {
            margin-left: var(--sidebar-width);
            padding: 30px;
        }

        .search-bar {
            background: #f1f5f9;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
        }
    </style>
    @stack('css')
</head>
<body>
    @yield('nav_layout')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('js')
</body>
</html>