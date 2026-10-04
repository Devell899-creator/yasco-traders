@extends('frontend.layouts.app')

@section('title', 'Checkout | YASCO Traders')

@section('content')

    <div style="
            max-width:1100px;
            margin:60px auto;
            padding:20px;
        ">

        <h1 style="
                color:#222;
                margin-bottom:30px;
            ">
            Checkout
        </h1>


        <div style="
                display:flex;
                gap:30px;
                align-items:flex-start;
            ">

            {{-- Customer Information --}}
            <div style="
                    flex:1;
                    background:#fff;
                    padding:25px;
                    border-radius:10px;
                    box-shadow:0 2px 10px rgba(0,0,0,.1);
                ">

                <h2 style="
                        margin-top:0;
                        color:#222;
                    ">
                    Customer Information
                </h2>


                <form method="POST" action="{{ route('frontend.checkout.place') }}">

                    @csrf


                    {{-- Name --}}
                    <div style="margin-bottom:18px;">

                        <label>
                            <strong>Name</strong>
                        </label>

                        <input type="text" name="name" value="{{ old('name') }}" required style="
                                    width:100%;
                                    padding:12px;
                                    margin-top:6px;
                                    border:1px solid #ddd;
                                    border-radius:5px;
                                    box-sizing:border-box;
                                ">

                    </div>


                    {{-- Email --}}
                    <div style="margin-bottom:18px;">

                        <label>
                            <strong>Email</strong>
                        </label>

                        <input type="email" name="email" value="{{ old('email') }}" required style="
                                    width:100%;
                                    padding:12px;
                                    margin-top:6px;
                                    border:1px solid #ddd;
                                    border-radius:5px;
                                    box-sizing:border-box;
                                ">

                    </div>


                    {{-- Phone --}}
                    <div style="margin-bottom:18px;">

                        <label>
                            <strong>Phone</strong>
                        </label>

                        <input type="text" name="phone" value="{{ old('phone') }}" required style="
                                    width:100%;
                                    padding:12px;
                                    margin-top:6px;
                                    border:1px solid #ddd;
                                    border-radius:5px;
                                    box-sizing:border-box;
                                ">

                    </div>


                    {{-- Address --}}
                    <div style="margin-bottom:18px;">

                        <label>
                            <strong>Address</strong>
                        </label>

                        <textarea name="address" rows="4" required style="
                                    width:100%;
                                    padding:12px;
                                    margin-top:6px;
                                    border:1px solid #ddd;
                                    border-radius:5px;
                                    box-sizing:border-box;
                                    resize:vertical;
                                ">{{ old('address') }}</textarea>

                    </div>


                    {{-- City --}}
                    <div style="margin-bottom:18px;">

                        <label>
                            <strong>City</strong>
                        </label>

                        <input type="text" name="city" value="{{ old('city') }}" required style="
                                    width:100%;
                                    padding:12px;
                                    margin-top:6px;
                                    border:1px solid #ddd;
                                    border-radius:5px;
                                    box-sizing:border-box;
                                ">

                    </div>


                    {{-- Payment Method --}}
                    <div style="margin-bottom:20px;">

                        <label>
                            <strong>Payment Method</strong>
                        </label>

                        <select name="payment_method" required style="
                                    width:100%;
                                    padding:12px;
                                    margin-top:6px;
                                    border:1px solid #ddd;
                                    border-radius:5px;
                                    box-sizing:border-box;
                                ">

                            <option value="">
                                Select Payment Method
                            </option>

                            <option value="cod">
                                Cash on Delivery
                            </option>

                        </select>

                    </div>


                    {{-- Place Order --}}
                    <button type="submit" style="
                                width:100%;
                                padding:14px;
                                background:#e63946;
                                color:white;
                                border:none;
                                border-radius:6px;
                                cursor:pointer;
                                font-size:16px;
                                font-weight:bold;
                            ">
                        Place Order
                    </button>

                </form>

            </div>


            {{-- Order Summary --}}
            <div style="
                    width:380px;
                    background:#fff;
                    padding:25px;
                    border-radius:10px;
                    box-shadow:0 2px 10px rgba(0,0,0,.1);
                ">

                <h2 style="
                        margin-top:0;
                        color:#222;
                    ">
                    Order Summary
                </h2>


                @foreach($cart as $item)

                            <div style="
                                        display:flex;
                                        justify-content:space-between;
                                        gap:15px;
                                        padding:12px 0;
                                        border-bottom:1px solid #eee;
                                    ">

                                <div>

                                    <strong>
                                        {{ $item['name'] }}
                                    </strong>

                                    <br>

                                    <small>
                                        {{ $item['quantity'] }} ×
                                        Rs {{ number_format($item['price'], 2) }}
                                    </small>

                                </div>


                                <strong>
                                    Rs {{ number_format(
                        $item['price'] * $item['quantity'],
                        2
                    ) }}
                                </strong>

                            </div>

                @endforeach


                {{-- Total --}}
                <div style="
                        display:flex;
                        justify-content:space-between;
                        margin-top:20px;
                        font-size:20px;
                    ">

                    <strong>
                        Total
                    </strong>

                    <strong>
                        Rs {{ number_format($total, 2) }}
                    </strong>

                </div>

            </div>

        </div>

    </div>

@endsection