@extends('frontend.layouts.app')

@section('title', 'Checkout | YASCO Traders')

@section('content')

    <div style="
        max-width:700px;
        margin:60px auto;
        padding:20px;
    ">

        {{-- Page Heading --}}
        <h1 style="
            color:#222;
            margin-bottom:30px;
        ">
            Checkout
        </h1>


        {{-- =========================
             ORDER SUMMARY
        ========================== --}}

        <div style="
            background:#fff;
            padding:25px;
            margin-bottom:25px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
        ">

            <h2 style="
                margin-top:0;
                margin-bottom:20px;
                color:#222;
            ">
                Order Summary
            </h2>


            @foreach($cart as $item)

                <div style="
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    padding:12px 0;
                    border-bottom:1px solid #eee;
                ">

                    {{-- Product Information --}}
                    <div>

                        <strong>
                            {{ $item['name'] }}
                        </strong>

                        <div style="
                            color:#666;
                            font-size:14px;
                            margin-top:5px;
                        ">
                            Rs. {{ number_format($item['price'], 2) }}
                            ×
                            {{ $item['quantity'] }}
                        </div>

                    </div>


                    {{-- Product Subtotal --}}
                    <strong>
                        Rs.
                        {{ number_format($item['price'] * $item['quantity'], 2) }}
                    </strong>

                </div>

            @endforeach


            {{-- Total --}}
            <div style="
                display:flex;
                justify-content:space-between;
                padding-top:20px;
                font-size:18px;
            ">

                <strong>
                    Total
                </strong>

                <strong style="color:#e63946;">
                    Rs. {{ number_format($total, 2) }}
                </strong>

            </div>

        </div>



        {{-- =========================
             CUSTOMER INFORMATION
        ========================== --}}

        <div style="
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
        ">

            <h2 style="
                margin-top:0;
                margin-bottom:25px;
                color:#222;
            ">
                Customer Information
            </h2>


            {{-- Guest Login Option --}}
            @if(!auth()->check())

                <div style="
                    margin-bottom:25px;
                    padding:15px;
                    background:#f5f5f5;
                    border-radius:6px;
                    color:#222;
                ">

                    <strong>
                        Already have an account?
                    </strong>

                    <a
                        href="{{ route('frontend.login') }}"
                        style="
                            color:#e63946;
                            text-decoration:none;
                            font-weight:bold;
                            margin-left:5px;
                        "
                    >
                        Login
                    </a>

                    <p style="
                        margin:8px 0 0;
                        color:#666;
                        font-size:14px;
                    ">
                        Don't have an account?
                        Enter your details below and your account
                        will be created automatically.
                    </p>

                </div>

            @endif


            {{-- Checkout Form --}}
            <form
                method="POST"
                action="{{ route('frontend.checkout.place') }}"
            >

                @csrf


                {{-- Name --}}
                <div style="margin-bottom:18px;">

                    <label>
                        <strong>Name</strong>
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', auth()->user()->name ?? '') }}"
                        required
                        style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #ddd;
                            border-radius:5px;
                            box-sizing:border-box;
                        "
                    >

                </div>


                {{-- Email --}}
                <div style="margin-bottom:18px;">

                    <label>
                        <strong>Email</strong>
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email ?? '') }}"
                        required
                        style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #ddd;
                            border-radius:5px;
                            box-sizing:border-box;
                        "
                    >

                </div>


                {{-- Phone --}}
                <div style="margin-bottom:18px;">

                    <label>
                        <strong>Phone</strong>
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', auth()->user()->phone ?? '') }}"
                        required
                        style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #ddd;
                            border-radius:5px;
                            box-sizing:border-box;
                        "
                    >

                </div>


                {{-- Create Account --}}
                @if(!auth()->check())

                    <div style="
                        padding:18px;
                        margin-bottom:20px;
                        background:#fafafa;
                        border:1px solid #eee;
                        border-radius:6px;
                    ">

                        <h3 style="
                            color:#222;
                            margin-top:0;
                            margin-bottom:15px;
                        ">
                            Create Your Account
                        </h3>


                        <p style="
                            color:#666;
                            font-size:14px;
                            margin-bottom:15px;
                        ">
                            Your account will be created automatically
                            when you place the order.
                        </p>


                        {{-- Password --}}
                        <div style="margin-bottom:18px;">

                            <label>
                                <strong>Password</strong>
                            </label>

                            <input
                                type="password"
                                name="password"
                                required
                                style="
                                    width:100%;
                                    padding:12px;
                                    margin-top:6px;
                                    border:1px solid #ddd;
                                    border-radius:5px;
                                    box-sizing:border-box;
                                "
                            >

                        </div>


                        {{-- Confirm Password --}}
                        <div>

                            <label>
                                <strong>Confirm Password</strong>
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                required
                                style="
                                    width:100%;
                                    padding:12px;
                                    margin-top:6px;
                                    border:1px solid #ddd;
                                    border-radius:5px;
                                    box-sizing:border-box;
                                "
                            >

                        </div>

                    </div>

                @endif


                {{-- Address --}}
                <div style="margin-bottom:18px;">

                    <label>
                        <strong>Address</strong>
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        required
                        style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #ddd;
                            border-radius:5px;
                            box-sizing:border-box;
                            resize:vertical;
                        "
                    >{{ old('address') }}</textarea>

                </div>


                {{-- City --}}
                <div style="margin-bottom:18px;">

                    <label>
                        <strong>City</strong>
                    </label>

                    <input
                        type="text"
                        name="city"
                        value="{{ old('city') }}"
                        required
                        style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #ddd;
                            border-radius:5px;
                            box-sizing:border-box;
                        "
                    >

                </div>


                {{-- Payment Method --}}
                <div style="margin-bottom:20px;">

                    <label>
                        <strong>Payment Method</strong>
                    </label>

                    <select
                        name="payment_method"
                        required
                        style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #ddd;
                            border-radius:5px;
                            box-sizing:border-box;
                        "
                    >

                        <option value="">
                            Select Payment Method
                        </option>

                        <option value="cod">
                            Cash on Delivery
                        </option>

                    </select>

                </div>


                {{-- Place Order --}}
                <button
                    type="submit"
                    style="
                        width:100%;
                        padding:14px;
                        background:#e63946;
                        color:white;
                        border:none;
                        border-radius:6px;
                        cursor:pointer;
                        font-size:16px;
                        font-weight:bold;
                    "
                >
                    Place Order
                </button>

            </form>

        </div>

    </div>

@endsection