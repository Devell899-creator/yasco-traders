<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        @yield('title', 'YASCO Traders')
    </title>


    <style>
        /* =========================
           RESET
        ========================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =========================
           BODY
        ========================= */

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #ffffff;
            color: #222;
            line-height: 1.5;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            width: 100%;
            min-height: 78px;

            background: #ffffff;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 7%;

            border-bottom: 1px solid #eeeeee;

            position: relative;
            z-index: 1000;
        }


        /* =========================
           LOGO
        ========================= */

        .logo img {
            width: 145px;
            height: auto;
            display: block;
        }


        /* =========================
           NAVIGATION
        ========================= */

        nav ul {
            list-style: none;

            display: flex;
            align-items: center;

            gap: 32px;
        }


        nav ul li a {
            position: relative;

            text-decoration: none;

            color: #222;

            font-size: 14px;
            font-weight: 600;

            transition: 0.3s;
        }


        nav ul li a::after {
            content: "";

            position: absolute;

            left: 0;
            bottom: -7px;

            width: 0;
            height: 2px;

            background: #222;

            transition: 0.3s;
        }


        nav ul li a:hover {
            color: #000;
        }


        nav ul li a:hover::after {
            width: 100%;
        }


        /* =========================
           NAV BUTTONS
        ========================= */

        .nav-buttons {
            display: flex;
            align-items: center;

            gap: 10px;
        }


        .login-btn,
        .register-btn,
        .cart-btn {

            display: inline-block;

            text-decoration: none;

            padding: 10px 17px;

            border-radius: 6px;

            font-size: 13px;
            font-weight: 600;

            transition: 0.3s;
        }


        /* Login */

        .login-btn {

            color: #222;

            background: #ffffff;

            border: 1px solid #dddddd;
        }


        .login-btn:hover {

            background: #f5f5f5;

            transform: translateY(-1px);
        }


        /* Register */

        .register-btn {

            background: #222;

            color: #ffffff;

            border: 1px solid #222;
        }


        .register-btn:hover {

            background: #444;

            transform: translateY(-1px);
        }


        /* Cart */

        .cart-btn {

            background: #222;

            color: #ffffff;

            border: 1px solid #222;
        }


        .cart-btn:hover {

            background: #444;

            transform: translateY(-1px);
        }


        /* =========================
           MOBILE MENU BUTTON
        ========================= */

        .menu-toggle {

            display: none;

            font-size: 28px;

            color: #222;

            cursor: pointer;

            user-select: none;
        }


        /* =========================
           MAIN CONTENT
        ========================= */

        main {
            width: 100%;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {

            background: #222;

            color: #ffffff;

            margin-top: 70px;

            padding: 65px 7% 25px;
        }


        .footer-container {

            max-width: 1200px;

            margin: auto;

            display: grid;

            grid-template-columns: 2fr 1fr 1fr;

            gap: 60px;
        }


        .footer-column h2 {

            font-size: 25px;

            margin-bottom: 16px;
        }


        .footer-column h3 {

            font-size: 17px;

            margin-bottom: 18px;
        }


        .footer-column p {

            color: #bbbbbb;

            line-height: 1.8;

            font-size: 14px;

            margin-bottom: 8px;
        }


        /* =========================
           FOOTER LINKS
        ========================= */

        .footer-links {

            display: flex;

            flex-direction: column;

            gap: 11px;
        }


        .footer-links a {

            color: #bbbbbb;

            text-decoration: none;

            font-size: 14px;

            transition: 0.3s;
        }


        .footer-links a:hover {

            color: #ffffff;

            padding-left: 4px;
        }


        /* =========================
           FOOTER BOTTOM
        ========================= */

        .footer-bottom {

            max-width: 1200px;

            margin: 45px auto 0;

            padding-top: 22px;

            border-top: 1px solid #444;

            text-align: center;
        }


        .footer-bottom p {

            color: #999999;

            font-size: 13px;

            margin: 0;
        }


        /* =========================
           TABLET
        ========================= */

        @media (max-width: 1100px) {

            .navbar {
                padding: 0 4%;
            }


            nav ul {
                gap: 20px;
            }


            .nav-buttons {
                gap: 6px;
            }


            .login-btn,
            .register-btn,
            .cart-btn {

                padding: 9px 12px;
            }

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 768px) {


            /* Navbar */

            .navbar {

                min-height: 70px;

                padding: 15px 20px;

                flex-wrap: wrap;
            }


            /* Logo */

            .logo img {

                width: 125px;
            }


            /* Menu icon */

            .menu-toggle {

                display: block;

                order: 2;
            }


            /* Navigation */

            nav {

                display: none;

                width: 100%;

                order: 3;
            }


            nav.active {

                display: block;
            }


            nav ul {

                flex-direction: column;

                align-items: center;

                gap: 18px;

                padding: 25px 0 15px;
            }


            nav ul li a {

                font-size: 15px;
            }


            /* Hide buttons on mobile */

            .nav-buttons {

                display: none;
            }


            /* Footer */

            .footer {

                padding: 50px 25px 20px;

                margin-top: 50px;
            }


            .footer-container {

                grid-template-columns: 1fr;

                gap: 35px;

                text-align: center;
            }


            .footer-links {

                align-items: center;
            }


            .footer-bottom {

                margin-top: 35px;
            }

        }


        /* =========================
           SMALL MOBILE
        ========================= */

        @media (max-width: 400px) {

            .navbar {

                padding: 14px 15px;
            }


            .logo img {

                width: 110px;
            }


            nav ul {

                gap: 15px;
            }


            .footer {

                padding-left: 18px;

                padding-right: 18px;
            }

        }
    </style>

</head>


<body>


    {{-- =========================
    NAVBAR
    ========================= --}}

    <header class="navbar">


        {{-- Logo --}}

        <div class="logo">

            <a href="{{ route('frontend.home') }}">

                <img src="{{ asset('Images/products/logo 2.png') }}" alt="YASCO Traders">

            </a>

        </div>


        {{-- Mobile Menu Button --}}

        <div class="menu-toggle" id="menu-toggle">
            ☰
        </div>


        {{-- Navigation --}}

        <nav id="nav-menu">

            <ul>

                <li>

                    <a href="{{ route('frontend.home') }}">
                        Home
                    </a>

                </li>


                <li>

                    <a href="{{ route('frontend.shop') }}">
                        Shop
                    </a>

                </li>


                <li>

                    <a href="{{ route('frontend.products') }}">
                        Products
                    </a>

                </li>


                <li>

                    <a href="{{ route('frontend.about') }}">
                        About Us
                    </a>

                </li>


                <li>

                    <a href="{{ route('frontend.contact') }}">
                        Contact Us
                    </a>

                </li>

            </ul>

        </nav>


        {{-- Right Side Buttons --}}

        <div class="nav-buttons">


            <a href="{{ route('frontend.login') }}" class="login-btn">
                Login
            </a>


            <a href="{{ route('frontend.register') }}" class="register-btn">
                Register
            </a>


            <a href="{{ route('frontend.cart') }}" class="cart-btn">
                Cart ({{ collect(session('cart', []))->sum('quantity') }})
            </a>


        </div>


    </header>



    {{-- =========================
    PAGE CONTENT
    ========================= --}}

    <main>

        @yield('content')

    </main>



    {{-- =========================
    FOOTER
    ========================= --}}

    <footer class="footer">


        <div class="footer-container">


            {{-- Company --}}

            <div class="footer-column">

                <h2>
                    YASCO Traders
                </h2>


                <p>
                    YASCO Traders provides quality mobile
                    accessories at affordable prices.
                </p>


                <p>
                    Your trusted place for mobile accessories.
                </p>

            </div>



            {{-- Quick Links --}}

            <div class="footer-column">

                <h3>
                    Quick Links
                </h3>


                <div class="footer-links">


                    <a href="{{ route('frontend.home') }}">
                        Home
                    </a>


                    <a href="{{ route('frontend.shop') }}">
                        Shop
                    </a>


                    <a href="{{ route('frontend.products') }}">
                        Products
                    </a>


                    <a href="{{ route('frontend.about') }}">
                        About Us
                    </a>


                    <a href="{{ route('frontend.contact') }}">
                        Contact Us
                    </a>


                </div>

            </div>



            {{-- Contact --}}

            <div class="footer-column">

                <h3>
                    Contact Us
                </h3>


                <p>
                    Gujranwala, Pakistan
                </p>


                <p>
                    +92 312 4749525
                </p>


                <p>
                    info@yascotraders.com
                </p>

            </div>


        </div>



        {{-- Footer Bottom --}}

        <div class="footer-bottom">

            <p>
                © 2026 YASCO Traders. All Rights Reserved.
            </p>

        </div>


    </footer>



    {{-- =========================
    MOBILE MENU SCRIPT
    ========================= --}}

    <script>

        const menuToggle =
            document.getElementById("menu-toggle");

        const navMenu =
            document.getElementById("nav-menu");


        menuToggle.addEventListener("click", function () {

            navMenu.classList.toggle("active");

        });

    </script>


</body>

</html>