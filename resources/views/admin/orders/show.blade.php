@extends('admin.layouts.app')

@section('title', 'Order Details')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1>Order Details</h1>

        <a href="{{ route('admin.orders.edit', $order->id) }}"
           style="
                background: #007bff;
                color: white;
                padding: 10px 16px;
                border-radius: 6px;
                text-decoration: none;
           ">
            Edit Order
        </a>
    </div>

    <div style="
        background: white;
        padding: 25px;
        border-radius: 8px;
        max-width: 800px;
    ">

        <p><strong>Order ID:</strong> {{ $order->id }}</p>

        <p style="margin-top: 15px;">
            <strong>Customer Name:</strong>
            {{ $order->customer_name }}
        </p>

        <p style="margin-top: 15px;">
            <strong>Email:</strong>
            {{ $order->customer_email ?? '-' }}
        </p>

        <p style="margin-top: 15px;">
            <strong>Phone:</strong>
            {{ $order->customer_phone ?? '-' }}
        </p>

        <p style="margin-top: 15px;">
            <strong>Address:</strong>
            {{ $order->address ?? '-' }}
        </p>

        <p style="margin-top: 15px;">
            <strong>Total Amount:</strong>
            {{ $order->total_amount }}
        </p>

        <p style="margin-top: 15px;">
            <strong>Status:</strong>
            {{ $order->status }}
        </p>

        <p style="margin-top: 15px;">
            <strong>Created:</strong>
            {{ $order->created_at->format('d M Y, h:i A') }}
        </p>

        <div style="margin-top: 25px;">

            <a href="{{ route('admin.orders.index') }}"
               style="
                    background: #6c757d;
                    color: white;
                    padding: 10px 16px;
                    border-radius: 6px;
                    text-decoration: none;
               ">
                Back to Orders
            </a>

        </div>

    </div>

@endsection