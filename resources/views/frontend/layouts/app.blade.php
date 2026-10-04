<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', "YASCO Traders")
    </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: white;
        }

        .logo img {
            width: 150px;
            height: auto;
            display: block;
        }

        .navbar {
            width: 100%;
            height: 75px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .logo h1 {
            font-size: 28px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 35px;
        }

        nav ul li a {
            text-decoration: none;
            color: #222;
            font-size: 16px;
            font-weight: 500;
            transition: 0.3s;
        }

        nav ul li a:hover {
            color: #e63946;
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .login-btn,
        .cart-btn {
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 14px;
        }

        .login-btn {
            color: #222;
            border: 1px solid #ddd;
        }

        .cart-btn {
            background-color: #e63946;
            color: white;
        }

        .login-btn:hover {
            background-color: #f5f5f5;
        }

        .cart-btn:hover {
            background-color: #c92f3b;
        }

        .product-box {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 30px;
        }

        .product {
            width: 200px;
            padding: 20px;
            background-color: white;
            color: #222;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .product img {
            width: 150px;
            height: 150px;
            object-fit: contain;
        }

        .product h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        .product p {
            margin: 8px 0;
            font-size: 14px;
        }

        .product button {
            margin-top: 10px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #e63946;
            color: white;
            cursor: pointer;
        }

        .main {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 30px;
        }

        .head {
            width: 200px;
            padding: 30px;
            background-color: white;
            color: #222;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgb(0, 0, 0, 0.08);
        }

        .main img {
            width: 150px;
            height: 150px;
            object-fit: contain;
        }

        .main h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        .main p {
            margin: 8px 0;
            font-size: 14px;
        }

        .main button {
            margin-top: 10px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #e63946;
            color: white;
            cursor: pointer;
        }

        .footer {
            background: #222;
            color: white;
            margin-top: 60px;
            padding: 45px 60px 20px;
        }

        .footer-container {
            max-width: 1200px;
            margin: auto;

            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 50px;
        }

        .footer-column h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .footer-column p {
            color: #ccc;
            line-height: 1.7;
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
            transition: .3s;
        }

        .footer-links a:hover {
            color: #e63946;
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 35px auto 0;
            padding-top: 20px;
            border-top: 1px solid #444;
            text-align: center;
        }

        .footer-bottom p {
            color: #aaa;
            font-size: 14px;
            margin: 0;
        }


        @media (max-width: 768px) {

            .navbar {
                flex-direction: column;
                height: auto;
                padding: 20px;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .nav-buttons {
                margin-top: 15px;
            }

            .product-box,
            .main {
                flex-wrap: wrap;
                justify-content: center;
            }

            .product,
            .head {
                width: 90%;
            }

            .footer {
                padding: 40px 25px 20px;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .footer-column {
                text-align: center;
            }

            .footer-links {
                align-items: center;
            }

        }

        .menu-toggle {
            display: none;
            font-size: 32px;
            color: black;
            cursor: pointer;
        }

        @media (max-width:768px) {

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-direction: row;
                padding: 15px 20px;
            }

            .menu-toggle {
                display: block;
            }

            nav {
                display: none;
                width: 100%;
            }

            nav.active {
                display: block;
            }

            nav ul {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 15px;
                padding: 20px 0;
            }

            .nav-buttons {
                display: none;
            }

            .footer-links {
                align-items: center;
            }
        }
    </style>

</head>

<body>

    {{-- Navbar --}}
    <header class="navbar">

        <div class="logo">
            <a href="{{ route('frontend.home') }}">
                <img src="{{ asset('Images/products/logo 2.png') }}" alt="YASCO Traders">
            </a>
        </div>

        <div class="menu-toggle" id="menu-toggle">
            ☰
        </div>

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

        <div class="nav-buttons">

            <a href="{{ route('frontend.login') }}" class="login-btn">
                Login
            </a>

            <a href="{{ route('frontend.cart') }}" class="cart-btn">
                Cart
            </a>

        </div>

    </header>


    {{-- Page Content --}}

    <main>

        @yield('content')

    </main>


    {{-- Footer --}}

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

    <script>

        const menuToggle = document.getElementById("menu-toggle");

        const navMenu = document.getElementById("nav-menu");

        menuToggle.addEventListener("click", function () {

            navMenu.classList.toggle("active");

        });

    </script>

</body>

</html>