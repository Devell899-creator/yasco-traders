@extends('frontend.layouts.app')

@section('title', $product->name . ' | YASCO Traders')

@section('content')

    <style>
        /* ==============================
           PRODUCT DETAIL PAGE
        ============================== */

        .product-detail-page {
            background: #f6f6f6;
            padding: 60px 20px;
            min-height: 75vh;
        }

        .product-detail-container {
            max-width: 1100px;
            margin: auto;
        }

        /* ==============================
           BREADCRUMB
        ============================== */

        .product-breadcrumb {
            margin-bottom: 25px;
            color: #777;
            font-size: 13px;
        }

        .product-breadcrumb a {
            color: #555;
            text-decoration: none;
            font-weight: 600;
        }

        .product-breadcrumb a:hover {
            color: #000;
        }

        /* ==============================
           PRODUCT CARD
        ============================== */

        .product-detail-card {
            background: #fff;

            border: 1px solid #e8e8e8;
            border-radius: 16px;

            padding: 35px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            gap: 55px;
            align-items: center;

            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
        }

        /* ==============================
           IMAGE
        ============================== */

        .detail-image {
            background: #f7f7f7;

            border-radius: 12px;

            min-height: 450px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .detail-image img {
            width: 100%;
            height: 450px;

            padding: 25px;

            object-fit: contain;

            transition: transform 0.4s ease;
        }

        .detail-image:hover img {
            transform: scale(1.04);
        }

        .no-image {
            color: #999;
            font-size: 15px;
        }

        /* ==============================
           PRODUCT INFORMATION
        ============================== */

        .detail-info {
            padding-right: 10px;
        }

        .product-label {
            display: inline-block;

            background: #f1f1f1;
            color: #555;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: 1px;

            text-transform: uppercase;

            margin-bottom: 15px;
        }

        .detail-info h1 {
            color: #222;

            font-size: 38px;
            line-height: 1.2;

            margin: 0 0 18px;

            font-weight: 700;
        }

        .detail-category {
            color: #555;

            font-size: 14px;

            margin-bottom: 8px;
        }

        .detail-category strong {
            color: #222;
        }

        .detail-brand {
            color: #555;

            font-size: 14px;

            margin-bottom: 20px;
        }

        .detail-brand strong {
            color: #222;
        }

        /* ==============================
           PRICE
        ============================== */

        .detail-price {
            color: #222 !important;

            font-size: 30px !important;

            font-weight: 700;

            margin: 0 0 20px !important;
        }

        .detail-price .currency {
            font-size: 17px;
            font-weight: 600;
        }

        /* ==============================
           STOCK
        ============================== */

        .stock-box {
            display: inline-flex;

            align-items: center;
            gap: 7px;

            background: #f5f5f5;

            padding: 7px 12px;

            border-radius: 20px;

            margin-bottom: 20px;

            color: #333;

            font-size: 13px;
            font-weight: 600;
        }

        .stock-dot {
            width: 8px;
            height: 8px;

            background: #222;

            border-radius: 50%;
        }

        /* ==============================
           DESCRIPTION
        ============================== */

        .detail-description {
            border-top: 1px solid #eee;

            padding-top: 20px;

            color: #666 !important;

            font-size: 15px !important;

            line-height: 1.8 !important;

            margin-bottom: 25px !important;
        }

        /* ==============================
           BUTTONS
        ============================== */

        .product-actions {
            display: flex;

            align-items: center;

            gap: 12px;
        }

        .add-cart-btn {
            display: inline-block;

            background: #222;
            color: #fff;

            border: none;
            border-radius: 7px;

            padding: 14px 28px;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            transition: 0.3s ease;
        }

        .add-cart-btn:hover {
            background: #000;

            transform: translateY(-2px);
        }

        .back-btn {
            display: inline-block;

            background: #f2f2f2;
            color: #222;

            padding: 14px 24px;

            border-radius: 7px;

            text-decoration: none;

            font-size: 14px;
            font-weight: 700;

            transition: 0.3s ease;
        }

        .back-btn:hover {
            background: #e5e5e5;
        }

        /* ==============================
           PRODUCT FEATURES
        ============================== */

        .product-features {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 15px;

            margin-top: 22px;
        }

        .feature-box {
            background: #fff;

            border: 1px solid #e8e8e8;
            border-radius: 10px;

            padding: 18px;

            text-align: center;

            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.04);
        }

        .feature-box strong {
            display: block;

            color: #222;

            font-size: 13px;

            margin-bottom: 5px;
        }

        .feature-box span {
            color: #777;

            font-size: 12px;
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 900px) {

            .product-detail-card {
                grid-template-columns: 1fr;

                gap: 35px;

                padding: 25px;
            }

            .detail-image {
                min-height: 400px;
            }

            .detail-image img {
                height: 400px;
            }

            .detail-info {
                padding-right: 0;
            }

        }

        @media (max-width: 768px) {

            .product-detail-page {
                padding: 40px 15px;
            }

            .product-detail-card {
                border-radius: 12px;
                padding: 18px;
            }

            .detail-image {
                min-height: 330px;
            }

            .detail-image img {
                height: 330px;
            }

            .detail-info h1 {
                font-size: 30px;
            }

            .detail-price {
                font-size: 27px !important;
            }

            .product-features {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 500px) {

            .product-detail-page {
                padding: 30px 12px;
            }

            .product-detail-card {
                padding: 14px;

                gap: 25px;
            }

            .detail-image {
                min-height: 280px;
            }

            .detail-image img {
                height: 280px;
                padding: 15px;
            }

            .detail-info h1 {
                font-size: 26px;
            }

            .detail-description {
                font-size: 14px !important;
            }

            .product-actions {
                display: block;
            }

            .add-cart-btn,
            .back-btn {
                width: 100%;
                text-align: center;
                box-sizing: border-box;
            }

            .back-btn {
                margin-top: 10px;
            }

        }
    </style>


    <section class="product-detail-page">

        <div class="product-detail-container">


            {{-- ==============================
            BREADCRUMB
            ============================== --}}

            <div class="product-breadcrumb">

                <a href="{{ route('frontend.products') }}">
                    Products
                </a>

                <span>
                    &nbsp; / &nbsp; {{ $product->name }}
                </span>

            </div>


            {{-- ==============================
            PRODUCT
            ============================== --}}

            <div class="product-detail-card">


                {{-- PRODUCT IMAGE --}}

                <div class="detail-image">

                    @if($product->image)

                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

                    @else

                        <span class="no-image">
                            No Image Available
                        </span>

                    @endif

                </div>


                {{-- PRODUCT INFORMATION --}}

                <div class="detail-info">


                    <span class="product-label">
                        YASCO TRADERS
                    </span>


                    {{-- PRODUCT NAME --}}

                    <h1>
                        {{ $product->name }}
                    </h1>


                    {{-- CATEGORY --}}

                    <p class="detail-category">

                        <strong>
                            Category:
                        </strong>

                        {{ $product->category->name ?? 'No Category' }}

                    </p>


                    {{-- BRAND --}}

                    <p class="detail-brand">

                        <strong>
                            Brand:
                        </strong>

                        {{ $product->brand ?? 'N/A' }}

                    </p>


                    {{-- PRICE --}}

                    <p class="detail-price">

                        <span class="currency">
                            {{ $product->currency ?? 'Rs' }}
                        </span>

                        {{ number_format($product->price, 2) }}

                    </p>


                    {{-- STOCK --}}

                    <div class="stock-box">

                        <span class="stock-dot"></span>

                        Stock:
                        {{ $product->stock }}

                    </div>


                    {{-- DESCRIPTION --}}

                    <p class="detail-description">

                        {{ $product->description ?? 'No description available.' }}

                    </p>


                    {{-- ACTIONS --}}

                    <div class="product-actions">


                        {{-- ADD TO CART --}}

                        <form action="{{ route('frontend.cart.add') }}" method="POST">

                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <button type="submit" class="add-cart-btn">
                                Add to Cart
                            </button>

                        </form>


                        {{-- BACK TO PRODUCTS --}}

                        <a href="{{ route('frontend.products') }}" class="back-btn">
                            Back to Products
                        </a>

                    </div>

                </div>

            </div>


            {{-- ==============================
            FEATURES
            ============================== --}}

            <div class="product-features">

                <div class="feature-box">

                    <strong>
                        Quality Products
                    </strong>

                    <span>
                        Best quality products
                    </span>

                </div>


                <div class="feature-box">

                    <strong>
                        Easy Shopping
                    </strong>

                    <span>
                        Simple and convenient
                    </span>

                </div>


                <div class="feature-box">

                    <strong>
                        Secure Checkout
                    </strong>

                    <span>
                        Safe ordering process
                    </span>

                </div>

            </div>

        </div>

    </section>

@endsection