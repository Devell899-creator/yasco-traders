@extends('frontend.layouts.app')

@section('title', 'Order Summary | YASCO Traders')

@section('content')

    <div style="
        max-width:900px;
        margin:60px auto;
        padding:30px;
        background:#fff;
        border-radius:10px;
        box-shadow:0 2px 10px rgba(0,0,0,.1);
        color:#222;
    ">

        <h1 style="
            color:#28a745;
            margin-top:0;
            margin-bottom:20px;
        ">
            Order Placed Successfully!
        </h1>

        <hr>

        <h2 style="color:#222; margin-top:25px;">
            Order Information
        </h2>

        <p style="color:#333;">
            <strong>Order ID:</strong>
            #{{ $order->id }}
        </p>

        <p style="color:#333;">
            <strong>Status:</strong>
            {{ $order->status }}
        </p>

        <p style="color:#333;">
            <strong>Customer:</strong>
            {{ $order->customer_name }}
        </p>

        <p style="color:#333;">
            <strong>Email:</strong>
            {{ $order->customer_email }}
        </p>

        <p style="color:#333;">
            <strong>Phone:</strong>
            {{ $order->customer_phone }}
        </p>

        <p style="color:#333;">
            <strong>Address:</strong><br>

            {!! nl2br(e($order->address)) !!}
        </p>

        <hr>

        <h2 style="
            color:#222;
            margin-top:25px;
        ">
            Order Summary
        </h2>

        @foreach($order->items as $item)

            <div style="
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    padding:15px 0;
                    border-bottom:1px solid #eee;
                    color:#333;
                ">

                <div>

                    <strong style="color:#222;">
                        {{ $item->product_name }}
                    </strong>

                    <br>

                    <small style="color:#555;">
                        {{ $item->quantity }}
                        ×
                        Rs {{ number_format($item->price, 2) }}
                    </small>

                </div>

                <strong style="color:#222;">
                    Rs {{ number_format($item->subtotal, 2) }}
                </strong>

            </div>

        @endforeach

        <div style="
            display:flex;
            justify-content:space-between;
            margin-top:25px;
            padding-top:20px;
            border-top:2px solid #222;
            font-size:22px;
            color:#222;
        ">

            <strong>Total</strong>

            <strong>
                Rs {{ number_format($order->total_amount, 2) }}
            </strong>

        </div>

        <div style="margin-top:30px;">

            <a href="{{ route('frontend.products') }}" style="
                display:inline-block;
                background:#e63946;
                color:white;
                padding:12px 22px;
                text-decoration:none;
                border-radius:6px;
            ">
                Continue Shopping
            </a>

        </div>

    </div>

@endsection