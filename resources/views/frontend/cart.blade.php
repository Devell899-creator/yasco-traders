@extends('frontend.layouts.app')

@section('title', 'Cart | YASCO Traders')

@section('content')

    <div style="
            max-width:1000px;
            margin:60px auto;
            padding:20px;
        ">

        <h1 style="
                color:#222;
                margin-bottom:30px;
            ">
            Shopping Cart
        </h1>


        @if(count($cart) > 0)

            @foreach($cart as $item)

                {{-- Product --}}
                <div style="
                                background:#fff;
                                padding:20px;
                                margin-bottom:15px;
                                border-radius:10px;
                                box-shadow:0 2px 10px rgba(0,0,0,.1);
                                display:flex;
                                align-items:center;
                                gap:30px;
                            ">

                    {{-- Product Image --}}
                    <div style="
                                    width:140px;
                                    min-width:140px;
                                    text-align:center;
                                ">

                        @php
                            $imagePath = $item['image'];
                        @endphp

                        @if(!empty($imagePath))

                            <img src="{{ asset($imagePath) }}" alt="{{ $item['name'] }}" style="
                                                    width:120px;
                                                    height:120px;
                                                    object-fit:contain;
                                                ">

                        @else

                            <p>No Image</p>

                        @endif

                    </div>


                    {{-- Product Information --}}
                    <div style="
                                    flex:1;
                                    color:#333;
                                ">

                        <h3 style="
                                        margin:0 0 12px 0;
                                        font-size:22px;
                                    ">
                            {{ $item['name'] }}
                        </h3>


                        {{-- Price --}}
                        <p style="margin:7px 0;">
                            <strong>Price:</strong>

                            Rs {{ number_format($item['price'], 2) }}
                        </p>


                        {{-- Quantity --}}
                        <div style="
                                        margin:12px 0;
                                        display:flex;
                                        align-items:center;
                                        gap:8px;
                                    ">

                            <strong>Quantity:</strong>


                            {{-- Minus --}}
                            <form action="{{ route('frontend.cart.update') }}" method="POST" style="margin:0;">

                                @csrf

                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">

                                <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">

                                <button type="submit" style="
                                                    width:35px;
                                                    height:35px;
                                                    border:none;
                                                    background:#222;
                                                    color:white;
                                                    border-radius:5px;
                                                    cursor:pointer;
                                                    font-size:18px;
                                                ">
                                    -
                                </button>

                            </form>


                            {{-- Current Quantity --}}
                            <span style="
                                            min-width:35px;
                                            text-align:center;
                                            padding:7px 10px;
                                            border:1px solid #ddd;
                                            border-radius:5px;
                                            background:#f8f8f8;
                                        ">
                                {{ $item['quantity'] }}
                            </span>


                            {{-- Plus --}}
                            <form action="{{ route('frontend.cart.update') }}" method="POST" style="margin:0;">

                                @csrf

                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">

                                <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">

                                <button type="submit" style="
                                                    width:35px;
                                                    height:35px;
                                                    border:none;
                                                    background:#e63946;
                                                    color:white;
                                                    border-radius:5px;
                                                    cursor:pointer;
                                                    font-size:18px;
                                                ">
                                    +
                                </button>

                            </form>

                        </div>


                        {{-- Subtotal --}}
                        <p style="
                                        margin:7px 0;
                                        font-size:17px;
                                    ">
                            <strong>Subtotal:</strong>

                            Rs {{ number_format(
                        $item['price'] * $item['quantity'],
                        2
                    ) }}
                        </p>


                        {{-- Remove --}}
                        <form action="{{ route('frontend.cart.remove') }}" method="POST" style="margin-top:12px;">

                            @csrf

                            <input type="hidden" name="product_id" value="{{ $item['id'] }}">

                            <button type="submit" style="
                                                background:#e63946;
                                                color:white;
                                                border:none;
                                                padding:8px 18px;
                                                border-radius:5px;
                                                cursor:pointer;
                                            ">
                                Remove
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach


            {{-- Cart Total --}}
            <div style="
                        background:#fff;
                        padding:25px;
                        margin-top:25px;
                        border-radius:10px;
                        box-shadow:0 2px 10px rgba(0,0,0,.1);
                        text-align:right;
                    ">

                @php
                    $cartTotal = collect($cart)->sum(function ($item) {
                        return $item['price'] * $item['quantity'];
                    });
                @endphp


                <h2 style="
                            margin:0;
                            color:#222;
                        ">
                    Total:
                    Rs {{ number_format($cartTotal, 2) }}
                </h2>


                {{-- Checkout Button --}}
                <a href="{{ route('frontend.checkout') }}" style="
                                display:inline-block;
                                margin-top:20px;
                                background:#e63946;
                                color:white;
                                padding:12px 25px;
                                text-decoration:none;
                                border-radius:6px;
                                font-weight:bold;
                            ">
                    Proceed to Checkout
                </a>

            </div>


        @else

            {{-- Empty Cart --}}
            <div style="
                        background:#fff;
                        padding:40px;
                        border-radius:10px;
                        box-shadow:0 2px 10px rgba(0,0,0,.1);
                        text-align:center;
                    ">

                <p style="
                            color:#555;
                            font-size:18px;
                        ">
                    Your cart is empty.
                </p>

            </div>

        @endif

    </div>

@endsection