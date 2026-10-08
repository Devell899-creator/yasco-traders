@extends('frontend.layouts.app')

@section('title', 'Shop | YASCO Traders')

@section('content')

    <style>
        /* =========================
           SHOP BANNER
        ========================= */

        .shop-banner {
            width: 100%;
            overflow: hidden;
            background: #f5f5f5;
        }

        .shop-banner img {
            width: 100%;
            height: auto;
            display: block;
        }


        /* =========================
           GENERAL SECTION
        ========================= */

        .shop-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 70px 25px;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-heading span {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #666;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .section-heading h2 {
            margin: 0 0 12px;
            font-size: 36px;
            color: #222;
            font-weight: 700;
        }

        .section-heading p {
            max-width: 600px;
            margin: 0 auto;
            color: #777;
            font-size: 15px;
            line-height: 1.7;
        }


        /* =========================
           CATEGORY SECTION
        ========================= */

        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .category-card {
            background: #fff;
            border: 1px solid #eeeeee;
            border-radius: 14px;
            padding: 25px 20px;
            text-align: center;
            transition: all .3s ease;
            overflow: hidden;
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .10);
            border-color: #ddd;
        }

        .category-image {
            width: 100%;
            height: 190px;
            background: #f7f7f7;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .category-image img {
            width: 160px;
            height: 160px;
            object-fit: contain;
            transition: transform .3s ease;
        }

        .category-card:hover .category-image img {
            transform: scale(1.08);
        }

        .category-card h3 {
            margin: 0;
            font-size: 19px;
            color: #222;
            font-weight: 600;
        }

        .category-link {
            display: inline-block;
            margin-top: 10px;
            color: #777;
            font-size: 13px;
            text-decoration: none;
        }


        /* =========================
           FEATURED PRODUCTS
        ========================= */

        .featured-section {
            background: #f7f7f7;
        }

        .featured-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 70px 25px;
        }

        .featured-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .featured-card {
            background: #fff;
            border: 1px solid #eeeeee;
            border-radius: 14px;
            overflow: hidden;
            transition: all .3s ease;
        }

        .featured-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .10);
        }

        .featured-image {
            height: 230px;
            background: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .featured-image img {
            width: 190px;
            height: 190px;
            object-fit: contain;
            transition: transform .3s ease;
        }

        .featured-card:hover .featured-image img {
            transform: scale(1.08);
        }

        .featured-info {
            padding: 22px;
        }

        .product-label {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #777;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .featured-info h3 {
            margin: 0 0 10px;
            font-size: 20px;
            color: #222;
        }

        .product-price {
            font-size: 18px;
            font-weight: 700;
            color: #222;
            margin-bottom: 18px;
        }

        .view-details {
            display: inline-block;
            width: 100%;
            text-align: center;
            padding: 11px 15px;
            background: #222;
            color: #fff;
            text-decoration: none;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
            transition: all .3s ease;
        }

        .view-details:hover {
            background: #444;
        }


        /* =========================
           CTA SECTION
        ========================= */

        .shop-cta {
            max-width: 1200px;
            margin: 0 auto;
            padding: 70px 25px;
        }

        .cta-box {
            background: #222;
            color: #fff;
            border-radius: 16px;
            padding: 55px 30px;
            text-align: center;
        }

        .cta-box h2 {
            margin: 0 0 12px;
            font-size: 32px;
        }

        .cta-box p {
            color: #ccc;
            max-width: 600px;
            margin: 0 auto 25px;
            line-height: 1.7;
        }

        .cta-btn {
            display: inline-block;
            background: #fff;
            color: #222;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 7px;
            font-weight: 600;
            font-size: 14px;
            transition: .3s;
        }

        .cta-btn:hover {
            background: #eee;
        }


        /* =========================
           TABLET
        ========================= */

        @media (max-width: 992px) {

            .category-grid,
            .featured-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 600px) {

            .shop-section,
            .featured-inner,
            .shop-cta {
                padding: 50px 15px;
            }

            .section-heading {
                margin-bottom: 30px;
            }

            .section-heading h2 {
                font-size: 28px;
            }

            .section-heading p {
                font-size: 14px;
            }

            .category-grid,
            .featured-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .category-image {
                height: 210px;
            }

            .featured-image {
                height: 240px;
            }

            .cta-box {
                padding: 40px 20px;
            }

            .cta-box h2 {
                font-size: 26px;
            }

        }
    </style>


    {{-- =========================
    SHOP BANNER
    ========================= --}}

    <section class="shop-banner">

        <img src="{{ asset('Images/products/baner.png') }}" alt="YASCO Traders Shop">

    </section>


    {{-- =========================
    SHOP BY CATEGORY
    ========================= --}}

    <section class="shop-section">

        <div class="section-heading">

            <span>Explore</span>

            <h2>Shop By Category</h2>

            <p>
                Explore our collection of quality mobile accessories
                and find the products you need.
            </p>

        </div>


        <div class="category-grid">


            {{-- Earphones --}}

            <div class="category-card">

                <div class="category-image">

                    <img src="{{ asset('Images/products/Image.jpeg') }}" alt="Earphones">

                </div>

                <h3>Earphones</h3>

                <a href="{{ route('frontend.products') }}" class="category-link">
                    Explore Products →
                </a>

            </div>


            {{-- Chargers --}}

            <div class="category-card">

                <div class="category-image">

                    <img src="{{ asset('Images/products/Image 6.jpeg') }}" alt="Chargers">

                </div>

                <h3>Chargers</h3>

                <a href="{{ route('frontend.products') }}" class="category-link">
                    Explore Products →
                </a>

            </div>


            {{-- Data Cables --}}

            <div class="category-card">

                <div class="category-image">

                    <img src="{{ asset('Images/products/Image 1.jpeg') }}" alt="Data Cables">

                </div>

                <h3>Data Cables</h3>

                <a href="{{ route('frontend.products') }}" class="category-link">
                    Explore Products →
                </a>

            </div>


            {{-- Mobile Glass --}}

            <div class="category-card">

                <div class="category-image">

                    <img src="{{ asset('Images/products/Image 5.jpeg') }}" alt="Mobile Glass">

                </div>

                <h3>Mobile Glass</h3>

                <a href="{{ route('frontend.products') }}" class="category-link">
                    Explore Products →
                </a>

            </div>


        </div>

    </section>


    {{-- =========================
    FEATURED PRODUCTS
    ========================= --}}

    <section class="featured-section">

        <div class="featured-inner">

            <div class="section-heading">

                <span>Our Collection</span>

                <h2>Featured Products</h2>

                <p>
                    Discover some of our popular products selected
                    for quality, performance and value.
                </p>

            </div>


            <div class="featured-grid">


                {{-- Product 1 --}}

                <div class="featured-card">

                    <div class="featured-image">

                        <img src="{{ asset('Images/products/Image.jpeg') }}" alt="Premium Earphones">

                    </div>

                    <div class="featured-info">

                        <span class="product-label">
                            Best Quality
                        </span>

                        <h3>Premium Earphones</h3>

                        <div class="product-price">
                            Rs. 200
                        </div>

                        <a href="#" class="view-details">
                            View Details
                        </a>

                    </div>

                </div>


                {{-- Product 2 --}}

                <div class="featured-card">

                    <div class="featured-image">

                        <img src="{{ asset('Images/products/Image 6.jpeg') }}" alt="Fast Charger">

                    </div>

                    <div class="featured-info">

                        <span class="product-label">
                            Best Quality
                        </span>

                        <h3>Fast Charger</h3>

                        <div class="product-price">
                            Rs. 500
                        </div>

                        <a href="#" class="view-details">
                            View Details
                        </a>

                    </div>

                </div>


                {{-- Product 3 --}}

                <div class="featured-card">

                    <div class="featured-image">

                        <img src="{{ asset('Images/products/Image 3.jpeg') }}" alt="Wireless Buds">

                    </div>

                    <div class="featured-info">

                        <span class="product-label">
                            Best Quality
                        </span>

                        <h3>Wireless Buds</h3>

                        <div class="product-price">
                            Rs. 1000
                        </div>

                        <a href="#" class="view-details">
                            View Details
                        </a>

                    </div>

                </div>


                {{-- Product 4 --}}

                <div class="featured-card">

                    <div class="featured-image">

                        <img src="{{ asset('Images/products/Image 5.jpeg') }}" alt="Mobile Glass">

                    </div>

                    <div class="featured-info">

                        <span class="product-label">
                            Best Quality
                        </span>

                        <h3>Mobile Glass</h3>

                        <div class="product-price">
                            Rs. 200
                        </div>

                        <a href="#" class="view-details">
                            View Details
                        </a>

                    </div>

                </div>


            </div>

        </div>

    </section>


    {{-- =========================
    SHOP CTA
    ========================= --}}

    <section class="shop-cta">

        <div class="cta-box">

            <h2>Looking For More Products?</h2>

            <p>
                Browse our complete product collection and discover
                more mobile accessories from YASCO Traders.
            </p>

            <a href="{{ route('frontend.products') }}" class="cta-btn">
                View All Products
            </a>

        </div>

    </section>


@endsection