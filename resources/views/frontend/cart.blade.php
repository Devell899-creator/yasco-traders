@extends('frontend.layouts.app')

@section('title', 'Shopping Cart | YASCO Traders')

@section('content')

    <style>
        /* ==============================
           CART PAGE
        ============================== */

        .cart-page {
            background: #f6f6f6;
            padding: 60px 20px;
            min-height: 70vh;
        }

        .cart-container {
            max-width: 1100px;
            margin: auto;
        }

        .cart-header {
            margin-bottom: 30px;
        }

        .cart-header span {
            display: block;
            color: #777;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .cart-header h1 {
            margin: 0;
            color: #222;
            font-size: 38px;
            font-weight: 700;
        }

        /* ==============================
           CART ITEM
        ============================== */

        .cart-item {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 18px;

            display: flex;
            align-items: center;
            gap: 25px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);

            transition: 0.3s ease;
        }

        .cart-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        /* ==============================
           PRODUCT IMAGE
        ============================== */

        .cart-image {
            width: 150px;
            min-width: 150px;
            height: 150px;

            background: #f7f7f7;
            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .cart-image img {
            width: 100%;
            height: 100%;
            padding: 12px;
            object-fit: contain;
        }

        .no-image {
            color: #999;
            font-size: 14px;
        }

        /* ==============================
           PRODUCT INFO
        ============================== */

        .cart-info {
            flex: 1;
        }

        .cart-info h3 {
            margin: 0 0 10px;
            color: #222;
            font-size: 22px;
            font-weight: 700;
        }

        .product-price {
            color: #555;
            font-size: 15px;
            margin-bottom: 18px;
        }

        .product-price strong {
            color: #222;
        }

        /* ==============================
           QUANTITY
        ============================== */

        .quantity-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .quantity-label {
            color: #333;
            font-weight: 600;
            margin-right: 5px;
        }

        .quantity-form {
            margin: 0;
        }

        .quantity-btn {
            width: 36px;
            height: 36px;

            border: 1px solid #ddd;
            border-radius: 6px;

            background: #fff;
            color: #222;

            font-size: 19px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .quantity-btn:hover {
            background: #222;
            color: #fff;
            border-color: #222;
        }

        .quantity-number {
            min-width: 40px;
            height: 36px;

            padding: 8px 10px;

            border: 1px solid #ddd;
            border-radius: 6px;

            background: #f8f8f8;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #222;
            font-weight: 600;
        }

        /* ==============================
           SUBTOTAL
        ============================== */

        .product-subtotal {
            margin: 0 0 15px;

            color: #222;
            font-size: 16px;
        }

        .product-subtotal strong {
            font-weight: 700;
        }

        /* ==============================
           REMOVE BUTTON
        ============================== */

        .remove-form {
            margin: 0;
        }

        .remove-btn {
            background: transparent;
            border: none;

            color: #777;

            font-size: 14px;
            font-weight: 600;

            padding: 0;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .remove-btn:hover {
            color: #d62828;
        }

        /* ==============================
           CART SUMMARY
        ============================== */

        .cart-summary {
            background: #fff;

            border: 1px solid #e8e8e8;
            border-radius: 14px;

            padding: 28px;

            margin-top: 25px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .summary-label {
            color: #777;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .summary-total {
            margin: 0;

            color: #222;
            font-size: 28px;
            font-weight: 700;
        }

        /* ==============================
           CHECKOUT BUTTON
        ============================== */

        .checkout-btn {
            display: inline-block;

            background: #222;
            color: #fff;

            padding: 14px 28px;

            border-radius: 7px;

            text-decoration: none;

            font-size: 15px;
            font-weight: 700;

            transition: 0.3s ease;
        }

        .checkout-btn:hover {
            background: #000;
            transform: translateY(-2px);
        }

        /* ==============================
           EMPTY CART
        ============================== */

        .empty-cart {
            background: #fff;

            border: 1px solid #e8e8e8;
            border-radius: 14px;

            padding: 70px 30px;

            text-align: center;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .empty-cart-icon {
            width: 70px;
            height: 70px;

            margin: 0 auto 20px;

            border-radius: 50%;

            background: #f2f2f2;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
        }

        .empty-cart h2 {
            margin: 0 0 10px;

            color: #222;
            font-size: 25px;
        }

        .empty-cart p {
            margin: 0 0 25px;

            color: #777;
            font-size: 15px;
        }

        .continue-shopping {
            display: inline-block;

            background: #222;
            color: #fff;

            padding: 12px 24px;

            border-radius: 7px;

            text-decoration: none;

            font-weight: 600;

            transition: 0.3s ease;
        }

        .continue-shopping:hover {
            background: #000;
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 768px) {

            .cart-page {
                padding: 40px 15px;
            }

            .cart-header h1 {
                font-size: 30px;
            }

            .cart-item {
                align-items: flex-start;
                padding: 15px;
                gap: 18px;
            }

            .cart-image {
                width: 110px;
                min-width: 110px;
                height: 110px;
            }

            .cart-info h3 {
                font-size: 18px;
            }

            .cart-summary {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .checkout-btn {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 500px) {

            .cart-page {
                padding: 30px 12px;
            }

            .cart-item {
                display: block;
            }

            .cart-image {
                width: 100%;
                height: 180px;
                margin-bottom: 18px;
            }

            .cart-info h3 {
                font-size: 19px;
            }

            .quantity-wrapper {
                flex-wrap: wrap;
            }

            .cart-summary {
                padding: 22px 18px;
            }

            .summary-total {
                font-size: 24px;
            }
        }
    </style>


    <section class="cart-page">

        <div class="cart-container">

            {{-- ==============================
            CART HEADER
            ============================== --}}

            <div class="cart-header">

                <span>YASCO TRADERS</span>

                <h1>Shopping Cart</h1>

            </div>


            {{-- ==============================
            CART HAS PRODUCTS
            ============================== --}}

            @if(count($cart) > 0)

                @foreach($cart as $item)

                    <div class="cart-item">


                        {{-- Product Image --}}

                        <div class="cart-image">

                            @php
                                $imagePath = $item['image'] ?? null;
                            @endphp

                            @if(!empty($imagePath))

                                <img src="{{ asset($imagePath) }}" alt="{{ $item['name'] }}">

                            @else

                                <span class="no-image">
                                    No Image
                                </span>

                            @endif

                        </div>


                        {{-- Product Information --}}

                        <div class="cart-info">


                            {{-- Product Name --}}

                            <h3>
                                {{ $item['name'] }}
                            </h3>


                            {{-- Price --}}

                            <div class="product-price">

                                <strong>Price:</strong>

                                Rs {{ number_format($item['price'], 2) }}

                            </div>


                            {{-- Quantity --}}

                            <div class="quantity-wrapper">

                                <span class="quantity-label">
                                    Quantity:
                                </span>


                                {{-- Minus --}}

                                <form action="{{ route('frontend.cart.update') }}" method="POST" class="quantity-form">

                                    @csrf

                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">

                                    <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">

                                    <button type="submit" class="quantity-btn">
                                        −
                                    </button>

                                </form>


                                {{-- Current Quantity --}}

                                <span class="quantity-number">
                                    {{ $item['quantity'] }}
                                </span>


                                {{-- Plus --}}

                                <form action="{{ route('frontend.cart.update') }}" method="POST" class="quantity-form">

                                    @csrf

                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">

                                    <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">

                                    <button type="submit" class="quantity-btn">
                                        +
                                    </button>

                                </form>

                            </div>


                            {{-- Subtotal --}}

                            <p class="product-subtotal">

                                <strong>Subtotal:</strong>

                                Rs {{ number_format(
                        $item['price'] * $item['quantity'],
                        2
                    ) }}

                            </p>


                            {{-- Remove --}}

                            <form action="{{ route('frontend.cart.remove') }}" method="POST" class="remove-form">

                                @csrf

                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">

                                <button type="submit" class="remove-btn">
                                    Remove
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach


                {{-- ==============================
                CART TOTAL
                ============================== --}}

                @php

                    $cartTotal = collect($cart)->sum(function ($item) {

                        return $item['price'] * $item['quantity'];

                    });

                @endphp


                <div class="cart-summary">


                    <div>

                        <div class="summary-label">
                            Cart Total
                        </div>

                        <h2 class="summary-total">

                            Rs {{ number_format($cartTotal, 2) }}

                        </h2>

                    </div>


                    {{-- Checkout --}}

                    <a href="{{ route('frontend.checkout') }}" class="checkout-btn">
                        Proceed to Checkout
                    </a>

                </div>


            @else


                {{-- ==============================
                EMPTY CART
                ============================== --}}

                <div class="empty-cart">

                    <div class="empty-cart-icon">
                        🛒
                    </div>

                    <h2>
                        Your Cart is Empty
                    </h2>

                    <p>
                        You haven't added any products to your cart yet.
                    </p>

                    <a href="{{ route('frontend.products') }}" class="continue-shopping">
                        Continue Shopping
                    </a>

                </div>


            @endif

        </div>

    </section>

@endsection