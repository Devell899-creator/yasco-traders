@extends('frontend.layouts.app')

@section('title', 'Checkout | YASCO Traders')

@section('content')

    <style>
        /* ==============================
           CHECKOUT PAGE
        ============================== */

        .checkout-page {
            background: #f6f6f6;
            padding: 60px 20px;
            min-height: 75vh;
        }

        .checkout-container {
            max-width: 1100px;
            margin: auto;
        }

        /* ==============================
           HEADER
        ============================== */

        .checkout-header {
            margin-bottom: 35px;
        }

        .checkout-header span {
            display: block;
            color: #777;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .checkout-header h1 {
            margin: 0;
            color: #222;
            font-size: 38px;
            font-weight: 700;
        }

        .checkout-header p {
            color: #777;
            margin: 10px 0 0;
            font-size: 15px;
        }

        /* ==============================
           GRID
        ============================== */

        .checkout-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 25px;
            align-items: start;
        }

        /* ==============================
           BOX
        ============================== */

        .checkout-box {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 14px;
            padding: 28px;
            margin-bottom: 22px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        /* ==============================
           SECTION TITLE
        ============================== */

        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0 0 25px;
            color: #222;
            font-size: 21px;
        }

        .section-number {
            width: 32px;
            height: 32px;
            min-width: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #222;
            color: #fff;

            border-radius: 50%;

            font-size: 13px;
            font-weight: 700;
        }

        /* ==============================
           FORM
        ============================== */

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;

            color: #333;
            font-size: 14px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 13px 14px;

            border: 1px solid #ddd;
            border-radius: 7px;

            background: #fff;
            color: #222;

            font-size: 14px;

            outline: none;
            box-sizing: border-box;

            transition: 0.2s ease;
        }

        .form-control:focus {
            border-color: #222;
            box-shadow: 0 0 0 3px rgba(34, 34, 34, 0.06);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 110px;
        }

        /* ==============================
           LOGIN NOTICE
        ============================== */

        .login-notice {
            background: #f7f7f7;
            border: 1px solid #e5e5e5;

            padding: 16px;

            border-radius: 8px;

            margin-bottom: 25px;
        }

        .login-notice strong {
            color: #222;
            font-size: 14px;
        }

        .login-notice a {
            color: #222;
            font-weight: 700;
            text-decoration: underline;
            margin-left: 5px;
        }

        .login-notice p {
            color: #777;
            font-size: 13px;
            margin: 8px 0 0;
        }

        /* ==============================
           ACCOUNT BOX
        ============================== */

        .account-box {
            background: #fafafa;
            border: 1px solid #e5e5e5;

            padding: 20px;

            border-radius: 9px;

            margin-bottom: 28px;
        }

        .account-box h3 {
            margin: 0 0 7px;
            color: #222;
            font-size: 17px;
        }

        .account-box>p {
            margin: 0 0 20px;
            color: #777;
            font-size: 13px;
            line-height: 1.6;
        }

        /* ==============================
           PAYMENT
        ============================== */

        .payment-box {
            border: 1px solid #ddd;
            border-radius: 8px;

            padding: 16px;

            background: #fafafa;
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 12px;

            cursor: pointer;

            color: #222;
            font-weight: 600;
            font-size: 14px;
        }

        .payment-option input {
            width: 17px;
            height: 17px;
            accent-color: #222;
        }

        .payment-description {
            margin: 8px 0 0 29px;
            color: #777;
            font-size: 13px;
        }

        /* ==============================
           ERROR
        ============================== */

        .error-box {
            background: #fff2f2;
            color: #b42318;

            border: 1px solid #f2c4c4;
            border-radius: 8px;

            padding: 15px 18px;

            margin-bottom: 25px;
        }

        .error-box strong {
            display: block;
            margin-bottom: 7px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .error-box li {
            margin-bottom: 3px;
            font-size: 14px;
        }

        /* ==============================
           PLACE ORDER
        ============================== */

        .place-order-btn {
            width: 100%;

            margin-top: 20px;

            padding: 15px;

            background: #222;
            color: #fff;

            border: none;
            border-radius: 7px;

            font-size: 15px;
            font-weight: 700;

            cursor: pointer;

            transition: 0.3s ease;
        }

        .place-order-btn:hover {
            background: #000;
            transform: translateY(-1px);
        }

        /* ==============================
           ORDER SUMMARY
        ============================== */

        .order-summary {
            position: sticky;
            top: 20px;
        }

        .product-item {
            display: flex;
            align-items: center;
            gap: 14px;

            padding: 15px 0;

            border-bottom: 1px solid #eee;
        }

        .product-image {
            width: 65px;
            height: 65px;
            min-width: 65px;

            background: #f7f7f7;
            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            padding: 5px;
            object-fit: contain;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            color: #222;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .product-meta {
            color: #777;
            font-size: 12px;
        }

        .product-price {
            color: #222;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* ==============================
           SUMMARY
        ============================== */

        .summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 11px 0;

            color: #666;
            font-size: 14px;
        }

        .summary-row strong {
            color: #222;
        }

        .summary-total {
            display: flex;
            align-items: center;
            justify-content: space-between;

            border-top: 1px solid #ddd;

            margin-top: 10px;
            padding-top: 20px;

            color: #222;
            font-size: 21px;
            font-weight: 700;
        }

        .summary-total span:last-child {
            font-size: 23px;
        }

        .secure-note {
            margin-top: 18px;
            padding-top: 15px;

            border-top: 1px solid #eee;

            color: #777;
            font-size: 12px;
            text-align: center;
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 768px) {

            .checkout-page {
                padding: 40px 15px;
            }

            .checkout-header h1 {
                font-size: 30px;
            }

            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .order-summary {
                position: static;
            }

            .checkout-box {
                padding: 20px;
            }

            .section-title {
                font-size: 19px;
            }
        }

        @media (max-width: 500px) {

            .checkout-page {
                padding: 30px 12px;
            }

            .checkout-header {
                margin-bottom: 25px;
            }

            .checkout-header h1 {
                font-size: 27px;
            }

            .checkout-box {
                padding: 17px;
                border-radius: 11px;
            }

            .product-image {
                width: 55px;
                min-width: 55px;
                height: 55px;
            }

            .product-name {
                font-size: 13px;
            }

            .product-price {
                font-size: 13px;
            }

            .summary-total {
                font-size: 18px;
            }

            .summary-total span:last-child {
                font-size: 20px;
            }
        }
    </style>


    <section class="checkout-page">

        <div class="checkout-container">


            {{-- ==============================
            CHECKOUT HEADER
            ============================== --}}

            <div class="checkout-header">

                <span>YASCO TRADERS</span>

                <h1>Checkout</h1>

                <p>
                    Complete your information and place your order.
                </p>

            </div>


            {{-- ==============================
            VALIDATION ERRORS
            ============================== --}}

            @if($errors->any())

                <div class="error-box">

                    <strong>
                        Please fix the following:
                    </strong>

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="checkout-grid">


                {{-- ==============================
                LEFT SIDE
                ============================== --}}

                <div>


                    {{-- CUSTOMER INFORMATION --}}

                    <div class="checkout-box">

                        <h2 class="section-title">

                            <span class="section-number">
                                1
                            </span>

                            Customer Information

                        </h2>


                        {{-- LOGIN NOTICE --}}

                        @if(!auth()->check())

                            <div class="login-notice">

                                <strong>
                                    Already have an account?
                                </strong>

                                <a href="{{ route('frontend.login') }}">
                                    Login
                                </a>

                                <p>
                                    Don't have an account?
                                    You can create one while placing your order.
                                </p>

                            </div>

                        @endif


                        <form method="POST" action="{{ route('frontend.checkout.place') }}">

                            @csrf


                            {{-- NAME --}}

                            <div class="form-group">

                                <label for="name">
                                    Full Name
                                </label>

                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Enter your full name" value="{{ old('name', auth()->user()->name ?? '') }}"
                                    required>

                            </div>


                            {{-- EMAIL --}}

                            <div class="form-group">

                                <label for="email">
                                    Email Address
                                </label>

                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter your email" value="{{ old('email', auth()->user()->email ?? '') }}"
                                    required>

                            </div>


                            {{-- PHONE --}}

                            <div class="form-group">

                                <label for="phone">
                                    Phone Number
                                </label>

                                <input type="text" id="phone" name="phone" class="form-control"
                                    placeholder="Enter your phone number"
                                    value="{{ old('phone', auth()->user()->phone ?? '') }}" required>

                            </div>


                            {{-- GUEST ACCOUNT --}}

                            @if(!auth()->check())

                                <div class="account-box">

                                    <h3>
                                        Create Your Account
                                    </h3>

                                    <p>
                                        Your customer account will be created automatically
                                        after placing the order.
                                    </p>


                                    {{-- PASSWORD --}}

                                    <div class="form-group">

                                        <label for="password">
                                            Password
                                        </label>

                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Minimum 8 characters" required>

                                    </div>


                                    {{-- CONFIRM PASSWORD --}}

                                    <div class="form-group">

                                        <label for="password_confirmation">
                                            Confirm Password
                                        </label>

                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" placeholder="Confirm your password" required>

                                    </div>

                                </div>

                            @endif


                            {{-- ==============================
                            DELIVERY
                            ============================== --}}

                            <h2 class="section-title">

                                <span class="section-number">
                                    2
                                </span>

                                Delivery Information

                            </h2>


                            {{-- ADDRESS --}}

                            <div class="form-group">

                                <label for="address">
                                    Complete Address
                                </label>

                                <textarea id="address" name="address" class="form-control" rows="4"
                                    placeholder="House number, street, area..." required>{{ old('address') }}</textarea>

                            </div>


                            {{-- CITY --}}

                            <div class="form-group">

                                <label for="city">
                                    City
                                </label>

                                <input type="text" id="city" name="city" class="form-control" placeholder="Enter your city"
                                    value="{{ old('city') }}" required>

                            </div>


                            {{-- ==============================
                            PAYMENT
                            ============================== --}}

                            <h2 class="section-title">

                                <span class="section-number">
                                    3
                                </span>

                                Payment Method

                            </h2>


                            <div class="payment-box">

                                <label class="payment-option">

                                    <input type="radio" name="payment_method" value="cod" required>

                                    Cash on Delivery

                                </label>

                                <p class="payment-description">
                                    Pay when your order is delivered to your address.
                                </p>

                            </div>


                            {{-- PLACE ORDER --}}

                            <button type="submit" class="place-order-btn">
                                Place Order
                            </button>


                        </form>

                    </div>

                </div>


                {{-- ==============================
                RIGHT SIDE
                ============================== --}}

                <div>

                    <div class="checkout-box order-summary">


                        <h2 class="section-title">

                            <span class="section-number">
                                4
                            </span>

                            Your Order

                        </h2>


                        {{-- PRODUCTS --}}

                        @foreach($cart as $item)

                                            <div class="product-item">

                                                {{-- PRODUCT INFO --}}

                                                <div class="product-info">

                                                    <div class="product-name">
                                                        {{ $item['name'] }}
                                                    </div>

                                                    <div class="product-meta">

                                                        Rs. {{ number_format($item['price'], 2) }}

                                                        ×

                                                        {{ $item['quantity'] }}

                                                    </div>

                                                </div>


                                                {{-- PRODUCT TOTAL --}}

                                                <div class="product-price">

                                                    Rs. {{ number_format(
                                $item['price'] * $item['quantity'],
                                2
                            ) }}

                                                </div>

                                            </div>

                        @endforeach


                        {{-- SUBTOTAL --}}

                        <div class="summary-row">

                            <span>
                                Subtotal
                            </span>

                            <strong>
                                Rs. {{ number_format($total, 2) }}
                            </strong>

                        </div>


                        {{-- DELIVERY --}}

                        <div class="summary-row">

                            <span>
                                Delivery
                            </span>

                            <strong>
                                Free
                            </strong>

                        </div>


                        {{-- TOTAL --}}

                        <div class="summary-total">

                            <span>
                                Total
                            </span>

                            <span>
                                Rs. {{ number_format($total, 2) }}
                            </span>

                        </div>


                        <div class="secure-note">
                            Your order will be processed securely.
                        </div>


                    </div>

                </div>


            </div>

        </div>

    </section>

@endsection