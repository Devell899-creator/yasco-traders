@extends('frontend.layouts.app')

@section('title', 'Checkout | YASCO Traders')

@section('content')

    <style>
        .checkout-container {
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .checkout-title {
            text-align: center;
            color: #222;
            margin-bottom: 35px;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 25px;
            align-items: start;
        }

        .checkout-box {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, .08);
            margin-bottom: 25px;
        }

        .checkout-box h2 {
            margin-top: 0;
            margin-bottom: 22px;
            color: #222;
            font-size: 21px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-number {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e63946;
            color: #fff;
            border-radius: 50%;
            font-size: 14px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            outline: none;
        }

        .form-control:focus {
            border-color: #e63946;
        }

        textarea.form-control {
            resize: vertical;
        }

        .login-notice {
            background: #f8f8f8;
            border-left: 4px solid #e63946;
            padding: 15px;
            margin-bottom: 22px;
            border-radius: 5px;
        }

        .login-notice strong {
            color: #222;
        }

        .login-notice a {
            color: #e63946;
            font-weight: bold;
            text-decoration: none;
        }

        .login-notice p {
            margin: 7px 0 0;
            color: #666;
            font-size: 13px;
        }

        .account-box {
            background: #fafafa;
            border: 1px solid #eee;
            padding: 18px;
            border-radius: 7px;
            margin-bottom: 22px;
        }

        .account-box h3 {
            margin: 0 0 8px;
            color: #222;
            font-size: 17px;
        }

        .account-box p {
            color: #666;
            font-size: 13px;
            margin: 0 0 18px;
        }

        /* ORDER SUMMARY */

        .order-summary {
            position: sticky;
            top: 20px;
        }

        .product-item {
            display: flex;
            gap: 12px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-weight: bold;
            color: #222;
            margin-bottom: 6px;
        }

        .product-meta {
            color: #777;
            font-size: 13px;
        }

        .product-price {
            font-weight: bold;
            color: #222;
            white-space: nowrap;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            color: #555;
            font-size: 14px;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #ddd;
            margin-top: 10px;
            padding-top: 18px;
            font-size: 20px;
            font-weight: bold;
            color: #222;
        }

        .summary-total span:last-child {
            color: #e63946;
        }

        .payment-box {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 7px;
            background: #fafafa;
        }

        .payment-box label {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            color: #222;
            font-weight: 600;
        }

        .payment-box input {
            accent-color: #e63946;
        }

        .place-order-btn {
            width: 100%;
            padding: 15px;
            background: #e63946;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        .place-order-btn:hover {
            background: #c92f3b;
        }

        .error-box {
            background: #ffe8e8;
            color: #c1121f;
            padding: 14px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #f5b5b5;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        @media (max-width: 768px) {

            .checkout-container {
                margin: 30px auto;
                padding: 0 12px;
            }

            .checkout-title {
                font-size: 28px;
                margin-bottom: 25px;
            }

            .checkout-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .order-summary {
                position: static;
            }

            .checkout-box {
                padding: 18px;
            }

            .checkout-box h2 {
                font-size: 19px;
            }

            .summary-total {
                font-size: 18px;
            }
        }
    </style>


    <div class="checkout-container">

        <h1 class="checkout-title">
            Checkout
        </h1>


        {{-- VALIDATION ERRORS --}}
        @if($errors->any())

            <div class="error-box">

                <strong>Please fix the following:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <div class="checkout-grid">


            {{-- ========================= --}}
            {{-- LEFT SIDE --}}
            {{-- ========================= --}}

            <div>


                {{-- CUSTOMER INFORMATION --}}

                <div class="checkout-box">

                    <h2 class="section-title">
                        <span class="section-number">1</span>
                        Customer Information
                    </h2>


                    {{-- GUEST LOGIN NOTICE --}}

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

                            <label>
                                Full Name
                            </label>

                            <input type="text" name="name" class="form-control" placeholder="Enter your full name"
                                value="{{ old('name', auth()->user()->name ?? '') }}" required>

                        </div>


                        {{-- EMAIL --}}

                        <div class="form-group">

                            <label>
                                Email Address
                            </label>

                            <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                value="{{ old('email', auth()->user()->email ?? '') }}" required>

                        </div>


                        {{-- PHONE --}}

                        <div class="form-group">

                            <label>
                                Phone Number
                            </label>

                            <input type="text" name="phone" class="form-control" placeholder="Enter your phone number"
                                value="{{ old('phone', auth()->user()->phone ?? '') }}" required>

                        </div>


                        {{-- ========================= --}}
                        {{-- CREATE ACCOUNT --}}
                        {{-- ========================= --}}

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

                                    <label>
                                        Password
                                    </label>

                                    <input type="password" name="password" class="form-control"
                                        placeholder="Minimum 8 characters" required>

                                </div>


                                {{-- CONFIRM PASSWORD --}}

                                <div class="form-group">

                                    <label>
                                        Confirm Password
                                    </label>

                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm your password" required>

                                </div>

                            </div>

                        @endif


                        {{-- ========================= --}}
                        {{-- DELIVERY INFORMATION --}}
                        {{-- ========================= --}}

                        <h2 class="section-title">

                            <span class="section-number">2</span>

                            Delivery Information

                        </h2>


                        {{-- ADDRESS --}}

                        <div class="form-group">

                            <label>
                                Complete Address
                            </label>

                            <textarea name="address" class="form-control" rows="4"
                                placeholder="House number, street, area..." required>{{ old('address') }}</textarea>

                        </div>


                        {{-- CITY --}}

                        <div class="form-group">

                            <label>
                                City
                            </label>

                            <input type="text" name="city" class="form-control" placeholder="Enter your city"
                                value="{{ old('city') }}" required>

                        </div>


                        {{-- ========================= --}}
                        {{-- PAYMENT --}}
                        {{-- ========================= --}}

                        <h2 class="section-title">

                            <span class="section-number">3</span>

                            Payment Method

                        </h2>


                        <div class="payment-box">

                            <label>

                                <input type="radio" name="payment_method" value="cod" required>

                                Cash on Delivery

                            </label>

                        </div>


                        <button type="submit" class="place-order-btn">
                            Place Order
                        </button>


                    </form>

                </div>

            </div>


            {{-- ========================= --}}
            {{-- RIGHT SIDE --}}
            {{-- ========================= --}}

            <div>


                <div class="checkout-box order-summary">

                    <h2 class="section-title">

                        <span class="section-number">
                            4
                        </span>

                        Your Order

                    </h2>


                    {{-- PRODUCTS --}}

                    {{-- PRODUCTS --}}

                    @foreach($cart as $item)

                        <div class="product-item">

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

                            <div class="product-price">
                                Rs. {{ number_format($item['price'] * $item['quantity'], 2) }}
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


                </div>

            </div>


        </div>

    </div>

@endsection