@extends('admin.layouts.app')

@section('title', 'Order Details')

@section('content')

    <style>
        .order-show-page {
            color: #e5e7eb;
            padding: 10px 0 30px;
        }

        .order-show-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .order-show-title {
            font-size: 27px;
            font-weight: 700;
            color: #f8fafc;
            margin: 0 0 7px;
        }

        .order-show-subtitle {
            margin: 0;
            color: #94a3b8;
            font-size: 14px;
        }

        .order-show-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .order-show-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s;
        }

        .order-show-btn:hover {
            text-decoration: none;
        }

        .order-show-btn-edit {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
        }

        .order-show-btn-edit:hover {
            background: #4338ca;
            color: #fff;
        }

        .order-show-btn-back {
            background: #263449;
            color: #e2e8f0;
            border: 1px solid #3b4b61;
        }

        .order-show-btn-back:hover {
            background: #34465e;
            color: #fff;
        }

        .order-show-card {
            background: #172337;
            border: 1px solid #2b3a50;
            border-radius: 14px;
            overflow: hidden;
            max-width: 950px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .order-show-card-header {
            padding: 22px 25px;
            background: #1d2b41;
            border-bottom: 1px solid #2b3a50;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .order-show-card-header h3 {
            margin: 0 0 5px;
            color: #f8fafc;
            font-size: 18px;
            font-weight: 700;
        }

        .order-show-card-header p {
            margin: 0;
            color: #94a3b8;
            font-size: 13px;
        }

        .order-show-id {
            color: #a5b4fc;
            font-weight: 700;
        }

        .order-show-body {
            padding: 25px;
        }

        .order-show-section-title {
            font-size: 14px;
            color: #a5b4fc;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            margin: 0 0 16px;
        }

        .order-show-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .order-show-info {
            padding: 17px;
            background: #101b2c;
            border: 1px solid #2b3a50;
            border-radius: 10px;
            min-width: 0;
        }

        .order-show-info.full-width {
            grid-column: 1 / -1;
        }

        .order-show-label {
            display: block;
            color: #94a3b8;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .order-show-value {
            color: #f1f5f9;
            font-size: 14px;
            font-weight: 600;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        .order-show-amount {
            color: #4ade80;
            font-size: 22px;
            font-weight: 800;
        }

        .order-show-status {
            display: inline-flex;
            align-items: center;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            background: #334155;
            color: #e2e8f0;
        }

        .order-show-status.status-pending {
            background: rgba(245, 158, 11, 0.15);
            color: #fbbf24;
        }

        .order-show-status.status-processing {
            background: rgba(59, 130, 246, 0.15);
            color: #93c5fd;
        }

        .order-show-status.status-shipped {
            background: rgba(139, 92, 246, 0.15);
            color: #c4b5fd;
        }

        .order-show-status.status-delivered {
            background: rgba(34, 197, 94, 0.15);
            color: #86efac;
        }

        .order-show-status.status-cancelled {
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
        }

        .order-show-divider {
            border: 0;
            border-top: 1px solid #2b3a50;
            margin: 25px 0;
        }

        .order-show-footer {
            display: flex;
            justify-content: flex-start;
        }

        @media (max-width: 600px) {
            .order-show-grid {
                grid-template-columns: 1fr;
            }

            .order-show-info.full-width {
                grid-column: auto;
            }

            .order-show-body {
                padding: 18px;
            }

            .order-show-card-header {
                padding: 18px;
            }

            .order-show-title {
                font-size: 23px;
            }

            .order-show-actions {
                width: 100%;
            }

            .order-show-actions .order-show-btn {
                flex: 1;
            }
        }
    </style>

    <div class="order-show-page">

        <div class="order-show-header">
            <div>
                <h1 class="order-show-title">Order Details</h1>
                <p class="order-show-subtitle">
                    View customer information and order status.
                </p>
            </div>

            <div class="order-show-actions">
                <a href="{{ route('admin.orders.index') }}" class="order-show-btn order-show-btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Back to Orders
                </a>

                <a href="{{ route('admin.orders.edit', $order->id) }}" class="order-show-btn order-show-btn-edit">
                    <i class="fas fa-edit"></i>
                    Edit Order
                </a>
            </div>
        </div>

        <div class="order-show-card">

            <div class="order-show-card-header">
                <div>
                    <h3>
                        <i class="fas fa-receipt" style="color: #818cf8; margin-right: 8px;"></i>
                        Order <span class="order-show-id">#{{ $order->id }}</span>
                    </h3>

                    <p>
                        Created on
                        {{ $order->created_at ? $order->created_at->format('d M Y, h:i A') : '-' }}
                    </p>
                </div>

                <div>
                    @php
                        $statusClass = strtolower($order->status ?? '');
                        $statusClass = str_replace(' ', '-', $statusClass);
                    @endphp

                    <span class="order-show-status status-{{ $statusClass }}">
                        {{ $order->status ?? 'Unknown' }}
                    </span>
                </div>
            </div>

            <div class="order-show-body">

                <h4 class="order-show-section-title">
                    <i class="fas fa-user" style="margin-right: 7px;"></i>
                    Customer Information
                </h4>

                <div class="order-show-grid">

                    <div class="order-show-info">
                        <span class="order-show-label">Customer Name</span>
                        <div class="order-show-value">
                            {{ $order->customer_name }}
                        </div>
                    </div>

                    <div class="order-show-info">
                        <span class="order-show-label">Customer Email</span>
                        <div class="order-show-value">
                            {{ $order->customer_email ?: '-' }}
                        </div>
                    </div>

                    <div class="order-show-info">
                        <span class="order-show-label">Customer Phone</span>
                        <div class="order-show-value">
                            {{ $order->customer_phone ?: '-' }}
                        </div>
                    </div>

                    <div class="order-show-info">
                        <span class="order-show-label">Order ID</span>
                        <div class="order-show-value">
                            #{{ $order->id }}
                        </div>
                    </div>

                    <div class="order-show-info full-width">
                        <span class="order-show-label">Delivery Address</span>
                        <div class="order-show-value">
                            {{ $order->address ?: '-' }}
                        </div>
                    </div>

                </div>

                <hr class="order-show-divider">

                <h4 class="order-show-section-title">
                    <i class="fas fa-shopping-bag" style="margin-right: 7px;"></i>
                    Order Summary
                </h4>

                <div class="order-show-grid">

                    <div class="order-show-info">
                        <span class="order-show-label">Total Amount</span>
                        <div class="order-show-amount">
                            Rs {{ number_format((float) $order->total_amount, 2) }}
                        </div>
                    </div>

                    <div class="order-show-info">
                        <span class="order-show-label">Current Status</span>
                        <div class="order-show-value">
                            <span class="order-show-status status-{{ $statusClass }}">
                                {{ $order->status ?? 'Unknown' }}
                            </span>
                        </div>
                    </div>

                    <div class="order-show-info full-width">
                        <span class="order-show-label">Order Created</span>
                        <div class="order-show-value">
                            {{ $order->created_at ? $order->created_at->format('d M Y, h:i A') : '-' }}
                        </div>
                    </div>

                </div>


                <hr class="order-show-divider">

                <h4 class="order-show-section-title">
                    <i class="fas fa-box" style="margin-right: 7px;"></i>
                    Order Items
                </h4>

                @if ($order->items->isNotEmpty())
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; color: #e5e7eb;">
                            <thead>
                                <tr style="background: #101b2c; text-align: left;">
                                    <th style="padding: 13px; border-bottom: 1px solid #2b3a50;">Product</th>
                                    <th style="padding: 13px; border-bottom: 1px solid #2b3a50;">Price</th>
                                    <th style="padding: 13px; border-bottom: 1px solid #2b3a50;">Quantity</th>
                                    <th style="padding: 13px; border-bottom: 1px solid #2b3a50;">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td style="padding: 13px; border-bottom: 1px solid #2b3a50;">
                                            {{ $item->product_name ?: ($item->product->name ?? 'Product unavailable') }}
                                        </td>
                                        <td style="padding: 13px; border-bottom: 1px solid #2b3a50;">
                                            Rs {{ number_format((float) $item->price, 2) }}
                                        </td>
                                        <td style="padding: 13px; border-bottom: 1px solid #2b3a50;">
                                            {{ $item->quantity }}
                                        </td>
                                        <td style="padding: 13px; border-bottom: 1px solid #2b3a50;">
                                            Rs {{ number_format((float) $item->subtotal, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="order-show-info">
                        <div class="order-show-value">
                            No product items are linked to this order.
                        </div>
                    </div>
                @endif


                <hr class="order-show-divider">

                <div class="order-show-footer">
                    <a href="{{ route('admin.orders.index') }}" class="order-show-btn order-show-btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Back to Orders
                    </a>
                </div>

            </div>
        </div>

    </div>

@endsection