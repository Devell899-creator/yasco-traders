@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard-page">

        {{-- =========================
        DASHBOARD HEADER
        ========================= --}}

        <div class="dashboard-header">

            <div class="header-left">

                <div class="welcome-badge">
                    ADMIN PANEL
                </div>

                <h1>Dashboard</h1>

                <p>
                    Welcome back! Here's what's happening with your store.
                </p>

            </div>

        </div>


        {{-- =========================
        STATISTICS
        ========================= --}}

        <div class="stats-grid">

            {{-- Products --}}
            <div class="stat-card blue-card">

                <div class="stat-top">
                    <div class="stat-icon">
                        P
                    </div>

                    <span class="stat-label">
                        PRODUCTS
                    </span>
                </div>

                <div class="stat-number">
                    {{ $products }}
                </div>

                <div class="stat-bottom">

                    <span>
                        Total products
                    </span>

                    <a href="{{ route('admin.products.index') }}">
                        View →
                    </a>

                </div>

            </div>


            {{-- Categories --}}
            <div class="stat-card purple-card">

                <div class="stat-top">

                    <div class="stat-icon">
                        C
                    </div>

                    <span class="stat-label">
                        CATEGORIES
                    </span>

                </div>

                <div class="stat-number">
                    {{ $categories }}
                </div>

                <div class="stat-bottom">

                    <span>
                        Product categories
                    </span>

                    <a href="{{ route('admin.categories.index') }}">
                        View →
                    </a>

                </div>

            </div>


            {{-- Orders --}}
            <div class="stat-card green-card">

                <div class="stat-top">

                    <div class="stat-icon">
                        O
                    </div>

                    <span class="stat-label">
                        ORDERS
                    </span>

                </div>

                <div class="stat-number">
                    {{ $orders }}
                </div>

                <div class="stat-bottom">

                    <span>
                        Customer orders
                    </span>

                    <a href="{{ route('admin.orders.index') }}">
                        View →
                    </a>

                </div>

            </div>


            {{-- Customers --}}
            <div class="stat-card orange-card">

                <div class="stat-top">

                    <div class="stat-icon">
                        U
                    </div>

                    <span class="stat-label">
                        CUSTOMERS
                    </span>

                </div>

                <div class="stat-number">
                    {{ $customers }}
                </div>

                <div class="stat-bottom">

                    <span>
                        Registered users
                    </span>

                    <a href="{{ route('admin.customers.index') }}">
                        View →
                    </a>

                </div>

            </div>


            {{-- Messages --}}
            <div class="stat-card red-card">

                <div class="stat-top">

                    <div class="stat-icon">
                        M
                    </div>

                    <span class="stat-label">
                        MESSAGES
                    </span>

                </div>

                <div class="stat-number">
                    {{ $messages }}
                </div>

                <div class="stat-bottom">

                    <span>
                        Customer messages
                    </span>

                    <a href="{{ route('admin.messages.index') }}">
                        View →
                    </a>

                </div>

            </div>

        </div>


        {{-- =========================
        LOWER CONTENT
        ========================= --}}

        <div class="dashboard-content-grid">


            {{-- =========================
            QUICK ACTIONS
            ========================= --}}

            <div class="dashboard-panel">

                <div class="panel-header">

                    <div>

                        <span class="panel-label">
                            MANAGEMENT
                        </span>

                        <h2>
                            Quick Actions
                        </h2>

                    </div>

                    <div class="panel-dot"></div>

                </div>


                <div class="quick-actions">


                    {{-- Add Product --}}
                    <a href="{{ route('admin.products.create') }}" class="quick-action">

                        <div class="quick-icon blue-bg">
                            +
                        </div>

                        <div class="quick-text">

                            <strong>
                                Add Product
                            </strong>

                            <small>
                                Create a new product
                            </small>

                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </a>


                    {{-- Add Category --}}
                    <a href="{{ route('admin.categories.create') }}" class="quick-action">

                        <div class="quick-icon purple-bg">
                            +
                        </div>

                        <div class="quick-text">

                            <strong>
                                Add Category
                            </strong>

                            <small>
                                Create a new category
                            </small>

                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </a>


                    {{-- Orders --}}
                    <a href="{{ route('admin.orders.index') }}" class="quick-action">

                        <div class="quick-icon green-bg">
                            O
                        </div>

                        <div class="quick-text">

                            <strong>
                                Manage Orders
                            </strong>

                            <small>
                                View and manage orders
                            </small>

                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </a>


                    {{-- Customers --}}
                    <a href="{{ route('admin.customers.index') }}" class="quick-action">

                        <div class="quick-icon orange-bg">
                            U
                        </div>

                        <div class="quick-text">

                            <strong>
                                Customers
                            </strong>

                            <small>
                                Manage registered customers
                            </small>

                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </a>


                    {{-- Messages --}}
                    <a href="{{ route('admin.messages.index') }}" class="quick-action">

                        <div class="quick-icon red-bg">
                            M
                        </div>

                        <div class="quick-text">

                            <strong>
                                Messages
                            </strong>

                            <small>
                                Check customer messages
                            </small>

                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>


            {{-- =========================
            STORE OVERVIEW
            ========================= --}}

            <div class="dashboard-panel overview-panel">

                <div class="panel-header">

                    <div>

                        <span class="panel-label">
                            STORE
                        </span>

                        <h2>
                            Store Overview
                        </h2>

                    </div>

                    <div class="overview-status">
                        Active
                    </div>

                </div>


                <div class="overview-list">


                    <div class="overview-item">

                        <div class="overview-left">

                            <div class="mini-icon blue-bg">
                                P
                            </div>

                            <span>
                                Products
                            </span>

                        </div>

                        <strong>
                            {{ $products }}
                        </strong>

                    </div>


                    <div class="overview-item">

                        <div class="overview-left">

                            <div class="mini-icon purple-bg">
                                C
                            </div>

                            <span>
                                Categories
                            </span>

                        </div>

                        <strong>
                            {{ $categories }}
                        </strong>

                    </div>


                    <div class="overview-item">

                        <div class="overview-left">

                            <div class="mini-icon green-bg">
                                O
                            </div>

                            <span>
                                Orders
                            </span>

                        </div>

                        <strong>
                            {{ $orders }}
                        </strong>

                    </div>


                    <div class="overview-item">

                        <div class="overview-left">

                            <div class="mini-icon orange-bg">
                                U
                            </div>

                            <span>
                                Customers
                            </span>

                        </div>

                        <strong>
                            {{ $customers }}
                        </strong>

                    </div>


                    <div class="overview-item">

                        <div class="overview-left">

                            <div class="mini-icon red-bg">
                                M
                            </div>

                            <span>
                                Messages
                            </span>

                        </div>

                        <strong>
                            {{ $messages }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>


    </div>


    <style>
        /* =========================================
               DASHBOARD MAIN
            ========================================= */

        .dashboard-page {
            width: 100%;
            color: #1e293b;
        }


        /* =========================================
               HEADER
            ========================================= */

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 25px 28px;
            background: linear-gradient(135deg, #111827, #1e3a8a);
            border-radius: 14px;
            color: white;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.15);
        }


        .welcome-badge {
            display: inline-block;
            padding: 6px 10px;
            margin-bottom: 10px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.12);
            color: #bfdbfe;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }


        .header-left h1 {
            margin: 0 0 6px;
            font-size: 30px;
            font-weight: 700;
            color: white;
        }


        .header-left p {
            margin: 0;
            color: #cbd5e1;
            font-size: 13px;
        }


        /* =========================================
               ADD PRODUCT BUTTON
            ========================================= */

        .add-product-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 18px;
            background: white;
            color: #1e3a8a;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: 0.3s;
        }


        .add-product-btn span {
            font-size: 20px;
            line-height: 1;
        }


        .add-product-btn:hover {
            background: #eff6ff;
            color: #1d4ed8;
            transform: translateY(-2px);
        }


        /* =========================================
               STATISTICS
            ========================================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
            margin-bottom: 25px;
        }


        .stat-card {
            position: relative;
            overflow: hidden;
            min-height: 170px;
            padding: 20px;
            border-radius: 12px;
            color: white;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.10);
            transition: 0.3s;
        }


        .stat-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            right: -35px;
            bottom: -40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.10);
        }


        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.16);
        }


        .blue-card {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
        }


        .purple-card {
            background: linear-gradient(135deg, #7c3aed, #5b21b6);
        }


        .green-card {
            background: linear-gradient(135deg, #059669, #047857);
        }


        .orange-card {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }


        .red-card {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }


        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .stat-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: rgba(255, 255, 255, 0.18);
            font-size: 13px;
            font-weight: 700;
        }


        .stat-label {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.75);
        }


        .stat-number {
            margin-top: 18px;
            font-size: 30px;
            font-weight: 700;
        }


        .stat-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            position: relative;
            z-index: 2;
        }


        .stat-bottom span {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.72);
        }


        .stat-bottom a {
            color: white;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
        }


        .stat-bottom a:hover {
            text-decoration: underline;
        }


        /* =========================================
               LOWER GRID
            ========================================= */

        .dashboard-content-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 20px;
        }


        .dashboard-panel {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, 0.05);
        }


        /* =========================================
               PANEL HEADER
            ========================================= */

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }


        .panel-label {
            display: block;
            color: #64748b;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin-bottom: 4px;
        }


        .panel-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 19px;
            font-weight: 700;
        }


        .panel-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #2563eb;
            box-shadow: 0 0 0 5px #dbeafe;
        }


        .overview-status {
            padding: 5px 9px;
            border-radius: 5px;
            background: #dcfce7;
            color: #15803d;
            font-size: 10px;
            font-weight: 700;
        }


        /* =========================================
               QUICK ACTIONS
            ========================================= */

        .quick-actions {
            display: flex;
            flex-direction: column;
        }


        .quick-action {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 5px;
            border-bottom: 1px solid #f1f5f9;
            color: #0f172a;
            text-decoration: none;
            transition: 0.25s;
        }


        .quick-action:last-child {
            border-bottom: none;
        }


        .quick-action:hover {
            padding-left: 10px;
            background: #f8fafc;
            color: #0f172a;
        }


        .quick-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: white;
            font-size: 13px;
            font-weight: 700;
        }


        .blue-bg {
            background: #2563eb;
        }


        .purple-bg {
            background: #7c3aed;
        }


        .green-bg {
            background: #059669;
        }


        .orange-bg {
            background: #f59e0b;
        }


        .red-bg {
            background: #ef4444;
        }


        .quick-text {
            flex: 1;
        }


        .quick-text strong {
            display: block;
            margin-bottom: 3px;
            font-size: 13px;
        }


        .quick-text small {
            color: #64748b;
            font-size: 11px;
        }


        .quick-arrow {
            color: #94a3b8;
            font-size: 18px;
        }


        /* =========================================
               STORE OVERVIEW
            ========================================= */

        .overview-list {
            display: flex;
            flex-direction: column;
        }


        .overview-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }


        .overview-item:last-child {
            border-bottom: none;
        }


        .overview-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }


        .mini-icon {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            color: white;
            font-size: 10px;
            font-weight: 700;
        }


        .overview-left span {
            color: #475569;
            font-size: 12px;
        }


        .overview-item strong {
            color: #0f172a;
            font-size: 15px;
        }


        /* =========================================
               TABLET
            ========================================= */

        @media (max-width: 1100px) {

            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }


            .dashboard-content-grid {
                grid-template-columns: 1fr;
            }

        }


        /* =========================================
               MOBILE
            ========================================= */

        @media (max-width: 768px) {

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
                padding: 22px;
            }


            .header-left h1 {
                font-size: 26px;
            }


            .add-product-btn {
                width: 100%;
                justify-content: center;
            }


            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }


            .stat-card {
                min-height: 155px;
                padding: 16px;
            }


            .stat-number {
                font-size: 26px;
            }


            .dashboard-panel {
                padding: 20px;
            }

        }


        /* =========================================
               SMALL MOBILE
            ========================================= */

        @media (max-width: 480px) {

            .stats-grid {
                grid-template-columns: 1fr;
            }


            .dashboard-header {
                padding: 20px;
            }


            .header-left h1 {
                font-size: 24px;
            }


            .dashboard-content-grid {
                gap: 15px;
            }


            .stat-card {
                min-height: 150px;
            }

        }
    </style>

@endsection