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
            background: #f1f5f9;
            color: #1e293b;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 65px;
            background: #0f172a;
            color: white;

            display: flex;
            align-items: center;

            padding: 0 25px;

            border-bottom: 1px solid #1e293b;
        }

        .navbar h2 {
            font-size: 19px;
            font-weight: 700;
        }


        /* =========================
           MAIN LAYOUT
        ========================= */

        .layout {
            display: flex;
            min-height: calc(100vh - 65px);
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 245px;
            flex-shrink: 0;

            background: #111827;

            padding: 22px 14px;

            border-right: 1px solid #1e293b;

            min-height: calc(100vh - 65px);
        }


        /* Admin Profile */

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 14px 12px;
            margin-bottom: 25px;

            background: #1e293b;
            border: 1px solid #334155;

            border-radius: 10px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: linear-gradient(135deg,
                    #2563eb,
                    #7c3aed);

            color: white;

            font-size: 14px;
            font-weight: 700;
        }

        .admin-info strong {
            display: block;

            color: white;

            font-size: 13px;

            margin-bottom: 3px;
        }

        .admin-info span {
            color: #94a3b8;

            font-size: 10px;
        }


        /* Sidebar Title */

        .sidebar-title {
            color: #64748b;

            font-size: 9px;
            font-weight: 700;

            letter-spacing: 1.5px;

            padding: 0 12px;

            margin-bottom: 8px;
        }


        /* Sidebar Links */

        .sidebar a {
            position: relative;

            display: flex;
            align-items: center;

            gap: 12px;

            color: #cbd5e1;

            text-decoration: none;

            padding: 11px 12px;

            margin-bottom: 4px;

            border-radius: 8px;

            font-size: 13px;
            font-weight: 500;

            transition: all 0.25s ease;
        }


        /* Sidebar Icons */

        .sidebar-icon {
            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 7px;

            background: #1e293b;

            color: #94a3b8;

            font-size: 11px;
            font-weight: 700;

            transition: all 0.25s ease;
        }


        /* Hover */

        .sidebar a:hover {
            background: #1e293b;

            color: white;

            transform: translateX(3px);
        }

        .sidebar a:hover .sidebar-icon {
            background: #2563eb;

            color: white;
        }


        /* Active Menu */

        .sidebar a.active {
            background: linear-gradient(90deg,
                    #1d4ed8,
                    #2563eb);

            color: white;

            box-shadow:
                0 5px 15px rgba(37, 99, 235, 0.25);
        }

        .sidebar a.active .sidebar-icon {
            background: rgba(255, 255, 255, 0.18);

            color: white;
        }


        /* Active Left Line */

        .sidebar a.active::before {
            content: "";

            position: absolute;

            left: -14px;

            top: 8px;
            bottom: 8px;

            width: 3px;

            border-radius: 0 4px 4px 0;

            background: #60a5fa;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            flex: 1;

            padding: 30px;

            min-width: 0;
        }

        .content h1 {
            margin-bottom: 25px;
        }


        /* =========================
           DASHBOARD CARDS
        ========================= */

        .cards {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;
        }

        .card {
            background: white;

            padding: 25px;

            border-radius: 8px;

            box-shadow:
                0 2px 8px rgba(15, 23, 42, 0.08);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            font-size: 25px;

            font-weight: bold;
        }


        /* =========================
           PAGINATION
        ========================= */

        .content nav {
            margin-top: 20px;
        }

        .content nav svg {
            width: 20px;
            height: 20px;
        }


        /* =========================
           ACTION BUTTONS
        ========================= */

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


        /* =========================
           DIVIDER
        ========================= */

        .sidebar-divider {
            height: 1px;

            background: #1e293b;

            margin: 20px 5px;
        }


        /* =========================
           LOGOUT
        ========================= */

        .logout-form {
            margin: 0;
        }

        .logout-btn {
            width: 100%;

            display: flex;

            align-items: center;

            gap: 12px;

            color: #fca5a5;

            background: transparent;

            border: none;

            padding: 11px 12px;

            border-radius: 8px;

            cursor: pointer;

            font-size: 13px;

            font-weight: 500;

            font-family: inherit;

            transition: 0.25s;
        }

        .logout-btn:hover {
            background: #3f1d1d;

            color: #fecaca;
        }

        .logout-icon {
            width: 32px;
            height: 32px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 7px;

            background: #3f1d1d;

            color: #f87171;

            font-size: 11px;

            font-weight: 700;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .content {
                padding: 20px;
            }

        }


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

                min-height: auto;

                padding: 15px;
            }

            .admin-profile {
                margin-bottom: 18px;
            }

            .sidebar-title {
                margin-top: 12px;
            }

            .sidebar a {
                padding: 10px 12px;
            }

            .sidebar a.active::before {
                left: -15px;
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


    <!-- =========================
         NAVBAR
    ========================= -->

    <div class="navbar">

        <h2>
            YASCO TRADERS
            <span style="color:#64748b;"> / </span>
            Admin Panel
        </h2>

    </div>


    <!-- =========================
         LAYOUT
    ========================= -->

    <div class="layout">


        <!-- =========================
             SIDEBAR
        ========================= -->

        <div class="sidebar">


            <!-- Admin Profile -->

            <div class="admin-profile">

                <div class="admin-avatar">
                    A
                </div>

                <div class="admin-info">

                    <strong>Administrator</strong>

                    <span>Store Manager</span>

                </div>

            </div>


            <!-- Menu Title -->

            <div class="sidebar-title">
                MAIN MENU
            </div>


            <!-- Dashboard -->

            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                <div class="sidebar-icon">
                    D
                </div>

                <span>Dashboard</span>

            </a>


            <!-- Products -->

            <a href="{{ route('admin.products.index') }}"
                class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">

                <div class="sidebar-icon">
                    P
                </div>

                <span>Products</span>

            </a>


            <!-- Categories -->

            <a href="{{ route('admin.categories.index') }}"
                class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">

                <div class="sidebar-icon">
                    C
                </div>

                <span>Categories</span>

            </a>


            <!-- Orders -->

            <a href="{{ route('admin.orders.index') }}"
                class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">

                <div class="sidebar-icon">
                    O
                </div>

                <span>Orders</span>

            </a>


            <!-- Customers -->

            <a href="{{ route('admin.customers.index') }}"
                class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">

                <div class="sidebar-icon">
                    U
                </div>

                <span>Customers</span>

            </a>


            <!-- Messages -->

            <a href="{{ route('admin.messages.index') }}"
                class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">

                <div class="sidebar-icon">
                    M
                </div>

                <span>Messages</span>

            </a>


            <!-- Website Content -->

            <a href="{{ route('admin.website-content.index') }}"
                class="{{ request()->routeIs('admin.website-content.*') ? 'active' : '' }}">

                <div class="sidebar-icon">
                    W
                </div>

                <span>Website Content</span>

            </a>


            <!-- Divider -->

            <div class="sidebar-divider"></div>


            <!-- Logout -->

            <form action="{{ route('admin.logout') }}" method="POST" class="logout-form">

                @csrf

                <button type="submit" class="logout-btn">

                    <div class="logout-icon">
                        X
                    </div>

                    <span>Logout</span>

                </button>

            </form>


        </div>


        <!-- =========================
             PAGE CONTENT
        ========================= -->

        <div class="content">

            @yield('content')

        </div>


    </div>


</body>

</html>