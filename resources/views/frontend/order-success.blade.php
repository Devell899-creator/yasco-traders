@extends('frontend.layouts.app')

@section('title', 'Order Summary | YASCO Traders')

@section('content')

    <style>
        /* ==============================
           ORDER SUCCESS PAGE
        ============================== */

        .order-success-page {
            background: #f6f6f6;
            padding: 60px 20px;
            min-height: 75vh;
        }

        .order-container {
            max-width: 950px;
            margin: auto;
        }

        /* ==============================
           SUCCESS HEADER
        ============================== */

        .success-header {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 14px;

            padding: 35px 30px;
            margin-bottom: 22px;

            text-align: center;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .success-icon {
            width: 65px;
            height: 65px;

            margin: 0 auto 18px;

            border-radius: 50%;

            background: #222;
            color: #fff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
            font-weight: bold;
        }

        .success-header h1 {
            margin: 0 0 10px;

            color: #222;

            font-size: 32px;
            font-weight: 700;
        }

        .success-header p {
            margin: 0;

            color: #777;
            font-size: 15px;
        }

        /* ==============================
           ORDER BOX
        ============================== */

        .order-box {
            background: #fff;

            border: 1px solid #e8e8e8;
            border-radius: 14px;

            padding: 28px;

            margin-bottom: 22px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            margin: 0 0 22px;

            color: #222;

            font-size: 21px;
            font-weight: 700;
        }

        /* ==============================
           ORDER INFORMATION
        ============================== */

        .order-info-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 15px;

            margin-bottom: 5px;
        }

        .info-item {
            background: #f8f8f8;

            border: 1px solid #eee;
            border-radius: 8px;

            padding: 15px;
        }

        .info-label {
            display: block;

            color: #888;

            font-size: 12px;
            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: .5px;

            margin-bottom: 5px;
        }

        .info-value {
            color: #222;

            font-size: 14px;
            font-weight: 600;

            word-break: break-word;
        }

        .status-badge {
            display: inline-block;

            background: #222;
            color: #fff;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 12px;
            font-weight: 600;

            text-transform: capitalize;
        }

        .address-box {
            background: #f8f8f8;

            border: 1px solid #eee;
            border-radius: 8px;

            padding: 15px;

            margin-top: 15px;
        }

        .address-box .info-value {
            line-height: 1.6;
        }

        /* ==============================
           ORDER ITEMS
        ============================== */

        .order-item {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 17px 0;

            border-bottom: 1px solid #eee;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            color: #222;

            font-size: 15px;
            font-weight: 700;

            margin-bottom: 6px;
        }

        .item-meta {
            color: #777;

            font-size: 13px;
        }

        .item-subtotal {
            color: #222;

            font-size: 15px;
            font-weight: 700;

            white-space: nowrap;
        }

        /* ==============================
           TOTAL
        ============================== */

        .order-total {
            display: flex;

            align-items: center;
            justify-content: space-between;

            border-top: 2px solid #222;

            margin-top: 10px;

            padding-top: 20px;

            color: #222;

            font-size: 22px;
            font-weight: 700;
        }

        /* ==============================
           ACTIONS
        ============================== */

        .order-actions {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 12px;

            margin-top: 25px;
        }

        .continue-shopping {
            display: inline-block;

            background: #222;
            color: #fff;

            padding: 13px 25px;

            border-radius: 7px;

            text-decoration: none;

            font-size: 14px;
            font-weight: 700;

            transition: .3s ease;
        }

        .continue-shopping:hover {
            background: #000;

            transform: translateY(-2px);
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 768px) {

            .order-success-page {
                padding: 40px 15px;
            }

            .success-header {
                padding: 30px 20px;
            }

            .success-header h1 {
                font-size: 27px;
            }

            .order-box {
                padding: 20px;
            }

            .order-info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {

            .order-success-page {
                padding: 30px 12px;
            }

            .success-header {
                padding: 25px 17px;
            }

            .success-header h1 {
                font-size: 24px;
            }

            .success-header p {
                font-size: 14px;
            }

            .order-box {
                padding: 17px;
                border-radius: 11px;
            }

            .section-title {
                font-size: 19px;
            }

            .order-item {
                gap: 10px;
            }

            .item-name {
                font-size: 14px;
            }

            .item-meta {
                font-size: 12px;
            }

            .item-subtotal {
                font-size: 13px;
            }

            .order-total {
                font-size: 19px;
            }

            .order-actions {
                display: block;
            }

            .continue-shopping {
                width: 100%;
                text-align: center;
                box-sizing: border-box;
            }
        }
    </style>


    <section class="order-success-page">

        <div class="order-container">


            {{-- ==============================
            SUCCESS MESSAGE
            ============================== --}}

            <div class="success-header">

                <div class="success-icon">
                    ✓
                </div>

                <h1>
                    Order Placed Successfully!
                </h1>

                <p>
                    Thank you for shopping with YASCO Traders.
                    Your order has been received.
                </p>

            </div>


            {{-- ==============================
            ORDER INFORMATION
            ============================== --}}

            <div class="order-box">

                <h2 class="section-title">
                    Order Information
                </h2>


                <div class="order-info-grid">


                    {{-- Order ID --}}

                    <div class="info-item">

                        <span class="info-label">
                            Order ID
                        </span>

                        <span class="info-value">
                            #{{ $order->id }}
                        </span>

                    </div>


                    {{-- Status --}}

                    <div class="info-item">

                        <span class="info-label">
                            Status
                        </span>

                        <span class="status-badge">
                            {{ $order->status }}
                        </span>

                    </div>


                    {{-- Customer --}}

                    <div class="info-item">

                        <span class="info-label">
                            Customer
                        </span>

                        <span class="info-value">
                            {{ $order->customer_name }}
                        </span>

                    </div>


                    {{-- Email --}}

                    <div class="info-item">

                        <span class="info-label">
                            Email
                        </span>

                        <span class="info-value">
                            {{ $order->customer_email }}
                        </span>

                    </div>


                    {{-- Phone --}}

                    <div class="info-item">

                        <span class="info-label">
                            Phone
                        </span>

                        <span class="info-value">
                            {{ $order->customer_phone }}
                        </span>

                    </div>

                </div>


                {{-- Address --}}

                <div class="address-box">

                    <span class="info-label">
                        Delivery Address
                    </span>

                    <div class="info-value">

                        {!! nl2br(e($order->address)) !!}

                    </div>

                </div>

            </div>


            {{-- ==============================
            ORDER SUMMARY
            ============================== --}}

            <div class="order-box">

                <h2 class="section-title">
                    Order Summary
                </h2>


                {{-- ORDER ITEMS --}}

                @foreach($order->items as $item)

                    <div class="order-item">


                        <div class="item-info">

                            <div class="item-name">
                                {{ $item->product_name }}
                            </div>

                            <div class="item-meta">

                                {{ $item->quantity }}

                                ×

                                Rs {{ number_format($item->price, 2) }}

                            </div>

                        </div>


                        <div class="item-subtotal">

                            Rs {{ number_format($item->subtotal, 2) }}

                        </div>

                    </div>

                @endforeach


                {{-- TOTAL --}}

                <div class="order-total">

                    <span>
                        Total
                    </span>

                    <span>
                        Rs {{ number_format($order->total_amount, 2) }}
                    </span>

                </div>


                {{-- ACTION --}}

                <div class="order-actions">

                    <a href="{{ route('frontend.products') }}" class="continue-shopping">
                        Continue Shopping
                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection