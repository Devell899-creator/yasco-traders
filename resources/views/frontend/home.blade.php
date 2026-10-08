@extends('frontend.layouts.app')

@section('title', 'YASCO Traders')

@section('content')

    {{-- ================= HERO SECTION ================= --}}
    <section class="hero-section">

        <div class="hero-content">

            <span class="hero-badge">YASCO TRADERS</span>

            <h1>
                Quality Products.<br>
                Better Shopping.
            </h1>

            <p>
                Discover quality products at affordable prices.
                Shop your favourite products with confidence.
            </p>

            <a href="{{ route('frontend.products') }}" class="hero-btn">
                Shop Now
            </a>

        </div>

    </section>


    {{-- ================= FEATURED PRODUCTS ================= --}}
    <section class="featured-section">

        <div class="section-heading">
            <span>OUR COLLECTION</span>

            <h2>Featured Products</h2>

            <p>
                Explore some of our best quality products.
            </p>
        </div>


        <div class="product-grid">

            @foreach($products->take(5) as $product)

                <div class="product-card">

                    {{-- Product Image --}}
                    <div class="product-image">

                        @if($product->image)

                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

                        @else

                            <div class="no-image">
                                No Image
                            </div>

                        @endif

                    </div>


                    {{-- Product Information --}}
                    <div class="product-info">

                        <span class="product-quality">
                            {{ $qualityText ?? 'BEST QUALITY' }}
                        </span>

                        <h3>
                            {{ $product->name }}
                        </h3>

                        <p class="product-category">
                            {{ $product->category->name ?? 'Accessories' }}
                        </p>

                        <div class="product-bottom">

                            <strong>
                                Rs. {{ number_format($product->price, 2) }}
                            </strong>

                            <a href="{{ route('frontend.product-detail', $product->id) }}" class="view-product">
                                View
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- View All --}}
        <div class="view-all">

            <a href="{{ route('frontend.products') }}">
                View All Products
            </a>

        </div>

    </section>


    {{-- ================= SECOND PRODUCT SECTION ================= --}}
    <section class="collection-section">

        <div class="section-heading">

            <span>MORE TO EXPLORE</span>

            <h2>Our Products</h2>

            <p>
                Find more products from the YASCO Traders collection.
            </p>

        </div>


        <div class="product-grid">

            @foreach($products->skip(5)->take(5) as $product)

                <div class="product-card">

                    <div class="product-image">

                        @if($product->image)

                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

                        @else

                            <div class="no-image">
                                No Image
                            </div>

                        @endif

                    </div>


                    <div class="product-info">

                        <span class="product-quality">
                            BEST QUALITY
                        </span>

                        <h3>
                            {{ $product->name }}
                        </h3>

                        <p class="product-category">
                            {{ $product->category->name ?? 'Accessories' }}
                        </p>

                        <div class="product-bottom">

                            <strong>
                                Rs. {{ number_format($product->price, 2) }}
                            </strong>

                            <a href="{{ route('frontend.product-detail', $product->id) }}" class="view-product">
                                View
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </section>


    {{-- ================= CTA SECTION ================= --}}
    <section class="home-cta">

        <div>

            <span>YASCO TRADERS</span>

            <h2>
                Find Something You'll Love
            </h2>

            <p>
                Browse our complete product collection and discover
                quality products at great prices.
            </p>

            <a href="{{ route('frontend.products') }}">
                Explore Products
            </a>

        </div>

    </section>


    {{-- ================= HOME PAGE CSS ================= --}}
    <style>
        .hero-section {
            min-height: 480px;
            display: flex;
            align-items: center;
            padding: 70px 8%;
            background:
                linear-gradient(90deg,
                    rgba(0, 0, 0, 0.78),
                    rgba(0, 0, 0, 0.35)),
                linear-gradient(135deg, #17202a, #34495e);
            color: white;
        }

        .hero-content {
            max-width: 650px;
        }

        .hero-badge {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 18px;
        }

        .hero-content h1 {
            font-size: 56px;
            line-height: 1.1;
            margin: 0 0 20px;
        }

        .hero-content p {
            max-width: 520px;
            font-size: 17px;
            line-height: 1.7;
            color: #e5e5e5;
            margin-bottom: 30px;
        }

        .hero-btn {
            display: inline-block;
            padding: 13px 28px;
            background: white;
            color: #222;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: 0.3s;
        }

        .hero-btn:hover {
            transform: translateY(-2px);
            background: #f1f1f1;
        }


        /* Sections */

        .featured-section,
        .collection-section {
            padding: 70px 8%;
        }

        .collection-section {
            background: #f7f7f7;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-heading span {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #777;
        }

        .section-heading h2 {
            font-size: 34px;
            margin: 10px 0;
            color: #222;
        }

        .section-heading p {
            color: #777;
            margin: 0;
        }


        /* Product Grid */

        .product-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 22px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            transition: 0.3s;
            border: 1px solid #eee;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.10);
        }


        /* Product Image */

        .product-image {
            height: 220px;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: 0.4s;
        }

        .product-card:hover .product-image img {
            transform: scale(1.06);
        }

        .no-image {
            color: #999;
            font-size: 14px;
        }


        /* Product Info */

        .product-info {
            padding: 18px;
        }

        .product-quality {
            font-size: 10px;
            font-weight: 700;
            color: #777;
            letter-spacing: 1px;
        }

        .product-info h3 {
            font-size: 18px;
            margin: 8px 0;
            color: #222;
        }

        .product-category {
            font-size: 13px;
            color: #777;
            margin-bottom: 18px;
        }

        .product-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .product-bottom strong {
            font-size: 16px;
            color: #222;
        }

        .view-product {
            padding: 7px 12px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 12px;
            transition: 0.3s;
        }

        .view-product:hover {
            background: #444;
        }


        /* View All */

        .view-all {
            text-align: center;
            margin-top: 40px;
        }

        .view-all a {
            display: inline-block;
            padding: 12px 25px;
            border: 1px solid #222;
            color: #222;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: 0.3s;
        }

        .view-all a:hover {
            background: #222;
            color: white;
        }


        /* CTA */

        .home-cta {
            padding: 80px 8%;
            text-align: center;
            background: #222;
            color: white;
        }

        .home-cta span {
            font-size: 12px;
            letter-spacing: 2px;
            font-weight: 700;
        }

        .home-cta h2 {
            font-size: 36px;
            margin: 12px 0;
        }

        .home-cta p {
            max-width: 600px;
            margin: 0 auto 25px;
            line-height: 1.7;
            color: #ccc;
        }

        .home-cta a {
            display: inline-block;
            padding: 13px 28px;
            background: white;
            color: #222;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
        }


        /* Responsive */

        @media (max-width: 1100px) {

            .product-grid {
                grid-template-columns: repeat(3, 1fr);
            }

        }

        @media (max-width: 700px) {

            .hero-section {
                min-height: 420px;
                padding: 50px 25px;
            }

            .hero-content h1 {
                font-size: 40px;
            }

            .featured-section,
            .collection-section {
                padding: 50px 20px;
            }

            .section-heading h2 {
                font-size: 28px;
            }

            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
            }

            .product-image {
                height: 170px;
            }

            .product-info {
                padding: 14px;
            }

            .product-info h3 {
                font-size: 16px;
            }

            .product-bottom {
                display: block;
            }

            .product-bottom strong {
                display: block;
                margin-bottom: 10px;
            }

            .home-cta {
                padding: 60px 20px;
            }

            .home-cta h2 {
                font-size: 28px;
            }

        }
    </style>

@endsection