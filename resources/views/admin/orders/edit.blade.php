@extends('admin.layouts.app')

@section('title', 'Edit Order')

@section('content')

    <style>
        .order-edit-page {
            color: #e5e7eb;
            padding: 10px 0 30px;
        }

        .order-edit-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .order-edit-title {
            font-size: 27px;
            font-weight: 700;
            color: #f8fafc;
            margin: 0 0 7px;
        }

        .order-edit-subtitle {
            color: #94a3b8;
            margin: 0;
            font-size: 14px;
        }

        .order-edit-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            background: #263449;
            color: #e2e8f0;
            border: 1px solid #3b4b61;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.2s;
        }

        .order-edit-back:hover {
            background: #34465e;
            color: #fff;
            text-decoration: none;
        }

        .order-edit-card {
            background: #172337;
            border: 1px solid #2b3a50;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .order-edit-card-header {
            padding: 20px 25px;
            background: #1d2b41;
            border-bottom: 1px solid #2b3a50;
        }

        .order-edit-card-header h3 {
            margin: 0 0 6px;
            color: #f8fafc;
            font-size: 18px;
            font-weight: 700;
        }

        .order-edit-card-header p {
            margin: 0;
            color: #94a3b8;
            font-size: 13px;
        }

        .order-edit-form {
            padding: 25px;
        }

        .order-edit-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .order-edit-field {
            min-width: 0;
        }

        .order-edit-field.full-width {
            grid-column: 1 / -1;
        }

        .order-edit-field label {
            display: block;
            color: #dbe4f0;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .order-edit-field label span {
            color: #fb7185;
        }

        .order-edit-control {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 11px 13px;
            background: #101b2c;
            border: 1px solid #36465d;
            border-radius: 8px;
            color: #f1f5f9;
            outline: none;
            box-shadow: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .order-edit-control:focus {
            border-color: #818cf8;
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.15);
        }

        .order-edit-control::placeholder {
            color: #64748b;
        }

        .order-edit-control option {
            background: #172337;
            color: #f1f5f9;
        }

        textarea.order-edit-control {
            min-height: 115px;
            resize: vertical;
        }

        .order-edit-error {
            color: #fda4af;
            font-size: 12px;
            margin: 7px 0 0;
        }

        .order-edit-control.is-invalid {
            border-color: #fb7185;
        }

        .order-edit-error-summary {
            padding: 13px 16px;
            margin-bottom: 22px;
            color: #fecdd3;
            background: rgba(190, 24, 93, 0.13);
            border: 1px solid rgba(251, 113, 133, 0.4);
            border-radius: 8px;
        }

        .order-edit-error-summary ul {
            padding-left: 20px;
            margin: 7px 0 0;
        }

        .order-edit-divider {
            border: 0;
            border-top: 1px solid #2b3a50;
            margin: 25px 0 20px;
        }

        .order-edit-actions {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 10px;
        }

        .order-edit-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 11px 19px;
            border: 0;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }

        .order-edit-btn-primary {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
        }

        .order-edit-btn-primary:hover {
            background: linear-gradient(135deg, #4f46e5, #4338ca);
            color: #fff;
            text-decoration: none;
        }

        .order-edit-btn-secondary {
            background: #2b3a50;
            color: #e2e8f0;
            border: 1px solid #40516a;
        }

        .order-edit-btn-secondary:hover {
            background: #394b64;
            color: #fff;
            text-decoration: none;
        }

        @media (max-width: 650px) {
            .order-edit-grid {
                grid-template-columns: 1fr;
            }

            .order-edit-field.full-width {
                grid-column: auto;
            }

            .order-edit-form {
                padding: 18px;
            }

            .order-edit-card-header {
                padding: 18px;
            }

            .order-edit-title {
                font-size: 23px;
            }

            .order-edit-actions {
                flex-direction: column;
            }

            .order-edit-btn {
                width: 100%;
            }
        }
    </style>

    <div class="order-edit-page">

        <div class="order-edit-header">
            <div>
                <h1 class="order-edit-title">Edit Order</h1>
                <p class="order-edit-subtitle">
                    Update customer details, order amount and delivery status.
                </p>
            </div>

            <a href="{{ route('admin.orders.index') }}" class="order-edit-back">
                <i class="fas fa-arrow-left"></i>
                Back to Orders
            </a>
        </div>

        <div class="order-edit-card">

            <div class="order-edit-card-header">
                <h3>
                    <i class="fas fa-edit" style="color: #818cf8; margin-right: 8px;"></i>
                    Order #{{ $order->id }}
                </h3>
                <p>Edit the information below and save your changes.</p>
            </div>

            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="order-edit-form">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="order-edit-error-summary">
                        <strong>Please correct the following errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="order-edit-grid">

                    {{-- Customer Name --}}
                    <div class="order-edit-field">
                        <label for="customer_name">
                            Customer Name <span>*</span>
                        </label>

                        <input type="text" name="customer_name" id="customer_name"
                            class="order-edit-control @error('customer_name') is-invalid @enderror"
                            value="{{ old('customer_name', $order->customer_name) }}" placeholder="Enter customer name"
                            required>

                        @error('customer_name')
                            <p class="order-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="order-edit-field">
                        <label for="customer_email">Customer Email</label>

                        <input type="email" name="customer_email" id="customer_email"
                            class="order-edit-control @error('customer_email') is-invalid @enderror"
                            value="{{ old('customer_email', $order->customer_email) }}" placeholder="customer@example.com">

                        @error('customer_email')
                            <p class="order-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="order-edit-field">
                        <label for="customer_phone">Customer Phone</label>

                        <input type="text" name="customer_phone" id="customer_phone"
                            class="order-edit-control @error('customer_phone') is-invalid @enderror"
                            value="{{ old('customer_phone', $order->customer_phone) }}" placeholder="Enter phone number">

                        @error('customer_phone')
                            <p class="order-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Total Amount --}}
                    <div class="order-edit-field">
                        <label for="total_amount">
                            Total Amount (Rs) <span>*</span>
                        </label>

                        <input type="number" name="total_amount" id="total_amount"
                            class="order-edit-control @error('total_amount') is-invalid @enderror"
                            value="{{ old('total_amount', $order->total_amount) }}" min="0" step="0.01" placeholder="0.00"
                            required>

                        @error('total_amount')
                            <p class="order-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="order-edit-field full-width">
                        <label for="address">Delivery Address</label>

                        <textarea name="address" id="address" rows="4"
                            class="order-edit-control @error('address') is-invalid @enderror"
                            placeholder="Enter complete delivery address">{{ old('address', $order->address) }}</textarea>

                        @error('address')
                            <p class="order-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="order-edit-field full-width">
                        <label for="status">
                            Order Status <span>*</span>
                        </label>

                        <select name="status" id="status" class="order-edit-control @error('status') is-invalid @enderror"
                            required>
                            @foreach (['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'] as $status)
                                <option value="{{ $status }}" {{ old('status', $order->status) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>

                        @error('status')
                            <p class="order-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <hr class="order-edit-divider">

                <div class="order-edit-actions">
                    <a href="{{ route('admin.orders.index') }}" class="order-edit-btn order-edit-btn-secondary">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>

                    <button type="submit" class="order-edit-btn order-edit-btn-primary">
                        <i class="fas fa-save"></i>
                        Update Order
                    </button>
                </div>

            </form>
        </div>

    </div>

@endsection