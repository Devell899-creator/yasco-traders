@extends('admin.layouts.app')

@section('title', 'Add Order')

@section('content')

    <h1 style="margin-bottom: 25px;">Add Order</h1>

    <div style="
        background: white;
        padding: 25px;
        border-radius: 8px;
        max-width: 800px;
    ">

        <form action="{{ route('admin.orders.store') }}" method="POST">

            @csrf

            {{-- Customer Name --}}
            <div style="margin-bottom: 20px;">
                <label for="customer_name">
                    Customer Name
                </label>

                <input
                    type="text"
                    name="customer_name"
                    id="customer_name"
                    value="{{ old('customer_name') }}"
                    required
                    style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 7px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    "
                >

                @error('customer_name')
                    <p style="color: red; margin-top: 5px;">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Customer Email --}}
            <div style="margin-bottom: 20px;">
                <label for="customer_email">
                    Customer Email
                </label>

                <input
                    type="email"
                    name="customer_email"
                    id="customer_email"
                    value="{{ old('customer_email') }}"
                    style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 7px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    "
                >

                @error('customer_email')
                    <p style="color: red; margin-top: 5px;">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Customer Phone --}}
            <div style="margin-bottom: 20px;">
                <label for="customer_phone">
                    Customer Phone
                </label>

                <input
                    type="text"
                    name="customer_phone"
                    id="customer_phone"
                    value="{{ old('customer_phone') }}"
                    style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 7px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    "
                >

                @error('customer_phone')
                    <p style="color: red; margin-top: 5px;">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Address --}}
            <div style="margin-bottom: 20px;">
                <label for="address">
                    Address
                </label>

                <textarea
                    name="address"
                    id="address"
                    rows="4"
                    style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 7px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    "
                >{{ old('address') }}</textarea>

                @error('address')
                    <p style="color: red; margin-top: 5px;">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Total Amount --}}
            <div style="margin-bottom: 20px;">
                <label for="total_amount">
                    Total Amount
                </label>

                <input
                    type="number"
                    name="total_amount"
                    id="total_amount"
                    value="{{ old('total_amount') }}"
                    min="0"
                    step="0.01"
                    required
                    style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 7px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    "
                >

                @error('total_amount')
                    <p style="color: red; margin-top: 5px;">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Status --}}
            <div style="margin-bottom: 25px;">
                <label for="status">
                    Status
                </label>

                <select
                    name="status"
                    id="status"
                    required
                    style="
                        width: 100%;
                        padding: 10px;
                        margin-top: 7px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    "
                >
                    <option value="Pending"
                        {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Processing"
                        {{ old('status') == 'Processing' ? 'selected' : '' }}>
                        Processing
                    </option>

                    <option value="Shipped"
                        {{ old('status') == 'Shipped' ? 'selected' : '' }}>
                        Shipped
                    </option>

                    <option value="Delivered"
                        {{ old('status') == 'Delivered' ? 'selected' : '' }}>
                        Delivered
                    </option>

                    <option value="Cancelled"
                        {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                        Cancelled
                    </option>
                </select>

                @error('status')
                    <p style="color: red; margin-top: 5px;">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- Buttons --}}
            <div style="display: flex; gap: 10px;">

                <button
                    type="submit"
                    style="
                        background: #007bff;
                        color: white;
                        border: none;
                        padding: 10px 18px;
                        border-radius: 6px;
                        cursor: pointer;
                    "
                >
                    Save Order
                </button>

                <a
                    href="{{ route('admin.orders.index') }}"
                    style="
                        background: #6c757d;
                        color: white;
                        padding: 10px 18px;
                        border-radius: 6px;
                        text-decoration: none;
                    "
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

@endsection