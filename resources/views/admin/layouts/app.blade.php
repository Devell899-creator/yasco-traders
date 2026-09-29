<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Admin Panel')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
        }

        /* Navbar */
        .navbar {
            height: 60px;
            background: #343a40;
            color: white;
            display: flex;
            align-items: center;
            padding: 0 25px;
        }

        .navbar h2 {
            font-size: 20px;
        }

        /* Main Layout */
        .layout {
            display: flex;
            min-height: calc(100vh - 60px);
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background: #212529;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
        }

        .sidebar a:hover {
            background: #343a40;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 30px;
        }

        .content h1 {
            margin-bottom: 25px;
        }

        /* Dashboard Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            font-size: 25px;
            font-weight: bold;
        }

        /* Pagination */
        .content nav {
            margin-top: 20px;
        }

        .content nav svg {
            width: 20px;
            height: 20px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .action-buttons a,
        .action-buttons button {
            border: none;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-view,
        .btn-edit,
        .btn-delete {
            color: #444;
            background: none;
        }

        /* Mobile */
        @media (max-width: 768px) {

            .navbar {
                height: auto;
                min-height: 60px;
                padding: 15px;
            }

            .navbar h2 {
                font-size: 16px;
            }

            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding-top: 0;
            }

            .sidebar a {
                padding: 10px 15px;
            }

            .content {
                padding: 15px;
                overflow-x: auto;
            }

            .content h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .content table {
                min-width: 800px;
            }

            .content nav {
                margin-top: 15px;
            }

            .content nav svg {
                width: 20px !important;
                height: 20px !important;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>YASCO TRADERS - Admin Panel</h2>
    </div>

    <div class="layout">

        <div class="sidebar">

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('admin.products.index') }}">
                Products
            </a>

            <a href="#">
                Categories
            </a>

            <a href="#">
                Orders
            </a>

            <a href="#">
                Customers
            </a>

            <a href="#">
                Messages
            </a>

        </div>

        <div class="content">

            @yield('content')

        </div>

    </div>

</body>

</html>