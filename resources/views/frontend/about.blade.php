@extends('frontend.layouts.app')

@section('title', 'About Us | YASCO Traders')

@section('content')

    <style>
        /* =========================
           ABOUT HERO
        ========================= */

        .about-hero {
            background: #222;
            color: #fff;
            text-align: center;
            padding: 85px 20px;
        }

        .about-hero span {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #ccc;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .about-hero h1 {
            font-size: 46px;
            margin: 0 0 15px;
            font-weight: 700;
        }

        .about-hero p {
            max-width: 650px;
            margin: auto;
            color: #ccc;
            font-size: 17px;
            line-height: 1.7;
        }


        /* =========================
           COMPANY SECTION
        ========================= */

        .about-company {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 25px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 60px;
        }

        .about-image {
            overflow: hidden;
            border-radius: 16px;
        }

        .about-image img {
            width: 100%;
            height: 430px;
            object-fit: cover;
            display: block;
            transition: transform .4s ease;
        }

        .about-image:hover img {
            transform: scale(1.03);
        }

        .about-content span {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #777;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .about-content h2 {
            font-size: 36px;
            color: #222;
            margin: 0 0 20px;
        }

        .about-content p {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 18px;
        }


        /* =========================
           MISSION
        ========================= */

        .mission-section {
            background: #f7f7f7;
        }

        .our-mission {
            max-width: 900px;
            margin: 0 auto;
            padding: 75px 25px;
            text-align: center;
        }

        .our-mission span {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #777;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .our-mission h2 {
            font-size: 36px;
            color: #222;
            margin: 0 0 18px;
        }

        .our-mission p {
            font-size: 18px;
            color: #666;
            line-height: 1.8;
            margin: 0;
        }


        /* =========================
           WHY CHOOSE US
        ========================= */

        .why-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 25px;
        }

        .why-heading {
            text-align: center;
            margin-bottom: 45px;
        }

        .why-heading span {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #777;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .why-heading h2 {
            font-size: 36px;
            color: #222;
            margin: 0 0 12px;
        }

        .why-heading p {
            color: #777;
            font-size: 15px;
            max-width: 600px;
            margin: auto;
            line-height: 1.7;
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
        }

        .why-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
            padding: 30px 18px;
            text-align: center;
            transition: all .3s ease;
        }

        .why-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .09);
        }

        .why-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 18px;
            background: #f3f3f3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .why-card h3 {
            color: #222;
            font-size: 16px;
            margin: 0;
            line-height: 1.4;
        }


        /* =========================
           CTA
        ========================= */

        .about-cta {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 25px 80px;
        }

        .cta-box {
            background: #222;
            color: #fff;
            border-radius: 16px;
            padding: 55px 25px;
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
            font-size: 14px;
            font-weight: 600;
            transition: .3s;
        }

        .cta-btn:hover {
            background: #eee;
        }


        /* =========================
           TABLET
        ========================= */

        @media (max-width: 992px) {

            .about-company {
                gap: 35px;
            }

            .why-grid {
                grid-template-columns: repeat(3, 1fr);
            }

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 700px) {

            .about-hero {
                padding: 60px 20px;
            }

            .about-hero h1 {
                font-size: 32px;
            }

            .about-hero p {
                font-size: 15px;
            }

            .about-company {
                grid-template-columns: 1fr;
                padding: 55px 15px;
                gap: 35px;
            }

            .about-image img {
                height: 300px;
            }

            .about-content h2 {
                font-size: 29px;
            }

            .our-mission {
                padding: 55px 15px;
            }

            .our-mission h2,
            .why-heading h2 {
                font-size: 29px;
            }

            .why-section {
                padding: 55px 15px;
            }

            .why-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .why-card {
                padding: 25px;
            }

            .about-cta {
                padding: 0 15px 55px;
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
    ABOUT HERO
    ========================= --}}

    <section class="about-hero">

        <span>About YASCO Traders</span>

        <h1>Quality You Can Trust</h1>

        <p>
            We provide reliable and quality mobile accessories
            with a focus on value, performance and customer satisfaction.
        </p>

    </section>


    {{-- =========================
    WHO WE ARE
    ========================= --}}

    <section class="about-company">

        <div class="about-image">

            <img src="{{ asset('Images/products/banner (2).png') }}" alt="YASCO Traders">

        </div>


        <div class="about-content">

            <span>Who We Are</span>

            <h2>About YASCO Traders</h2>

            <p>
                YASCO Traders is a trusted supplier of premium mobile
                accessories. We provide quality products including
                chargers, data cables, earphones, neckbands and
                many other mobile accessories.
            </p>

            <p>
                Our goal is to provide reliable products at affordable
                prices while ensuring a smooth and satisfying experience
                for every customer.
            </p>

        </div>

    </section>


    {{-- =========================
    MISSION
    ========================= --}}

    <section class="mission-section">

        <div class="our-mission">

            <span>Our Mission</span>

            <h2>Built Around Quality</h2>

            <p>
                To become one of Pakistan's most trusted mobile
                accessories suppliers by providing quality products,
                fair prices and dependable customer service.
            </p>

        </div>

    </section>


    {{-- =========================
    WHY CHOOSE US
    ========================= --}}

    <section class="why-section">

        <div class="why-heading">

            <span>Why YASCO Traders</span>

            <h2>Why Choose Us?</h2>

            <p>
                We focus on the things that matter most when
                choosing mobile accessories.
            </p>

        </div>


        <div class="why-grid">


            <div class="why-card">

                <div class="why-icon">
                    ✓
                </div>

                <h3>Premium Quality</h3>

            </div>


            <div class="why-card">

                <div class="why-icon">
                    ₹
                </div>

                <h3>Affordable Prices</h3>

            </div>


            <div class="why-card">

                <div class="why-icon">
                    ⚡
                </div>

                <h3>Fast Delivery</h3>

            </div>


            <div class="why-card">

                <div class="why-icon">
                    ★
                </div>

                <h3>Customer Satisfaction</h3>

            </div>


            <div class="why-card">

                <div class="why-icon">
                    ✓
                </div>

                <h3>Genuine Accessories</h3>

            </div>


        </div>

    </section>


    {{-- =========================
    CTA
    ========================= --}}

    <section class="about-cta">

        <div class="cta-box">

            <h2>Explore Our Products</h2>

            <p>
                Looking for reliable mobile accessories?
                Explore our collection and find the right product for you.
            </p>

            <a href="{{ route('frontend.products') }}" class="cta-btn">
                View Products
            </a>

        </div>

    </section>


@endsection