@extends('admin.layouts.app')

@section('title', 'Add Order')

@section('content')

    <style>
        .order-create-page {
            color: #e2e8f0;
            padding: 5px 0 25px;
        }

        .order-create-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .order-create-title {
            margin: 0;
            font-size: 28px;
            font-weight: 750;
            color: #f8fafc;
        }

        .order-create-subtitle {
            color: #94a3b8;
            margin: 7px 0 0;
            font-size: 14px;
        }

        .order-create-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #17243a;
            border: 1px solid #334155;
            color: #cbd5e1 !important;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none !important;
            font-size: 13px;
            font-weight: 600;
        }

        .order-create-back:hover {
            background: #25354d;
        }

        .order-create-card {
            max-width: 900px;
            background: #111c30;
            border: 1px solid #26354c;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
        }

        .order-create-card-header {
            padding: 21px 25px;
            border-bottom: 1px solid #26354c;
            background: #142139;
        }

        .order-create-card-header h3 {
            color: #f1f5f9;
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 6px;
        }

        .order-create-card-header p {
            color: #94a3b8;
            font-size: 13px;
            margin: 0;
        }

        .order-create-form {
            padding: 25px;
        }

        .order-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px 20px;
        }

        .order-form-group {
            min-width: 0;
        }

        .order-form-group.full-width {
            grid-column: 1 / -1;
        }

        .order-form-label {
            display: block;
            color: #cbd5e1;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .order-required {
            color: #f87171;
        }

        .order-form-control {
            display: block;
            width: 100%;
            box-sizing: border-box;
            background: #0b1425;
            color: #f1f5f9;
            border: 1px solid #334155;
            border-radius: 8px;
            padding: 12px 13px;
            font-size: 14px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .order-form-control::placeholder {
            color: #64748b;
        }

        .order-form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .13);
        }

        .order-form-control option {
            background: #111c30;
            color: #f1f5f9;
        }

        textarea.order-form-control {
            resize: vertical;
            min-height: 115px;
        }

        .order-field-error {
            color: #fca5a5;
            font-size: 12px;
            margin: 7px 0 0;
        }

        .order-error-summary {
            background: rgba(239, 68, 68, .10);
            border: 1px solid rgba(239, 68, 68, .3);
            color: #fca5a5;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 22px;
        }

        .order-error-summary ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .order-form-actions {
            display: flex;
            align-items: center;
            gap: 11px;
            flex-wrap: wrap;
            margin-top: 27px;
            padding-top: 22px;
            border-top: 1px solid #26354c;
        }

        .order-save-btn,
        .order-cancel-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none !important;
            cursor: pointer;
            transition: .2s ease;
        }

        .order-save-btn {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: #fff;
            border: none;
            box-shadow: 0 5px 15px rgba(37, 99, 235, .2);
        }

        .order-save-btn:hover {
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 7px 18px rgba(37, 99, 235, .3);
        }

        .order-cancel-btn {
            background: #253247;
            border: 1px solid #3b4b62;
            color: #cbd5e1 !important;
        }

        .order-cancel-btn:hover {
            background: #334155;
        }

        .order-form-note {
            color: #94a3b8;
            font-size: 12px;
            margin-top: 17px;
        }

        @media (max-width: 600px) {
            .order-create-title {
                font-size: 24px;
            }

            .order-create-form {
                padding: 18px;
            }

            .order-create-card-header {
                padding: 18px;
            }

            .order-form-grid {
                grid-template-columns: 1fr;
                gap: 19px;
            }

            .order-form-group.full-width {
                grid-column: auto;
            }

            .order-save-btn,
            .order-cancel-btn {
                flex: 1;
            }
        }
    </style>

    <div class="order-create-page">

        <div class="order-create-header">
            <div>
                <h1 class="order-create-title">Add Order</h1>
                <p class="order-create-subtitle">
                    Enter customer information and order details below.
                </p>
            </div>

            <a href="{{ route('admin.orders.index') }}" class="order-create-back">
                &larr; Back to Orders
            </a>
        </div>

        <div class="order-create-card">

            <div class="order-create-card-header">
                <h3>Order Information</h3>
                <p>
                    Fields marked with
                    <span class="order-required">*</span> are required.
                </p>
            </div>

            <form action="{{ route('admin.orders.store') }}" method="POST" class="order-create-form">

                @csrf

                @if ($errors->any())
                    <div class="order-error-summary">
                        <strong>Please correct the following errors:</strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="order-form-grid">

                    {{-- Customer Name --}}
                    <div class="order-form-group">
                        <label for="customer_name" class="order-form-label">
                            Customer Name <span class="order-required">*</span>
                        </label>

                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}"
                            required autocomplete="name" placeholder="Enter customer name" class="order-form-control">

                        @error('customer_name')
                            <p class="order-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Customer Email --}}
                    <div class="order-form-group">
                        <label for="customer_email" class="order-form-label">
                            Customer Email
                        </label>

                        <input type="email" name="customer_email" id="customer_email" value="{{ old('customer_email') }}"
                            autocomplete="email" placeholder="customer@example.com" class="order-form-control">

                        @error('customer_email')
                            <p class="order-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Customer Phone --}}
                    <div class="order-form-group">
                        <label for="customer_phone" class="order-form-label">
                            Customer Phone
                        </label>

                        <input type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}"
                            autocomplete="tel" placeholder="Enter phone number" class="order-form-control">

                        @error('customer_phone')
                            <p class="order-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Total Amount --}}
                    <div class="order-form-group">
                        <label for="total_amount" class="order-form-label">
                            Total Amount (Rs) <span class="order-required">*</span>
                        </label>

                        <input type="number" name="total_amount" id="total_amount" value="{{ old('total_amount') }}" min="0"
                            step="0.01" required placeholder="0.00" class="order-form-control">

                        @error('total_amount')
                            <p class="order-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="order-form-group full-width">
                        <label for="address" class="order-form-label">
                            Delivery Address
                        </label>

                        <textarea name="address" id="address" rows="4" autocomplete="street-address"
                            placeholder="Enter customer's complete address"
                            class="order-form-control">{{ old('address') }}</textarea>

                        @error('address')
                            <p class="order-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="order-form-group full-width">
                        <label for="status" class="order-form-label">
                            Order Status <span class="order-required">*</span>
                        </label>

                        <select name="status" id="status" required class="order-form-control">
                            <option value="Pending" {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Processing" {{ old('status') == 'Processing' ? 'selected' : '' }}>
                                Processing
                            </option>

                            <option value="Shipped" {{ old('status') == 'Shipped' ? 'selected' : '' }}>
                                Shipped
                            </option>

                            <option value="Delivered" {{ old('status') == 'Delivered' ? 'selected' : '' }}>
                                Delivered
                            </option>

                            <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>
                        </select>

                        @error('status')
                            <p class="order-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- Stock Restoration Status --}}
                <div class="order-form-group full-width">
                    <label class="order-form-label">
                        Stock Restoration Status
                    </label>

                    <div class="order-form-control">
                        Not restored — order has not been cancelled yet.
                    </div>

                    <p class="order-form-note">
                        Stock restoration is handled automatically when an order is cancelled.
                    </p>
                </div>

                <div class="order-form-actions">
                    <button type="submit" class="order-save-btn">
                        Save Order
                    </button>

                    <a href="{{ route('admin.orders.index') }}" class="order-cancel-btn">
                        Cancel
                    </a>
                </div>

                <p class="order-form-note">
                    Please verify the customer details and total amount before saving.
                </p>

            </form>

        </div>

    </div>

@endsection