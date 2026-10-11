@extends('admin.layouts.app')

@section('title', 'Edit Customer')

@section('content')

    <div class="customer-page">

        {{-- Page Header --}}
        <div class="page-header">
            <div>
                <span class="eyebrow">STORE MANAGEMENT</span>
                <h1>Edit Customer</h1>
                <p>Update customer information and contact details.</p>
            </div>

            <a href="{{ route('admin.customers.index') }}" class="back-btn">
                <span>&larr;</span> Back to Customers
            </a>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert-error">
                <strong>Please correct the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Customer Form --}}
        <div class="form-card">

            <div class="card-heading">
                <div class="heading-icon">&#9998;</div>
                <div>
                    <h2>Customer Information</h2>
                    <p>Editing customer #{{ $customer->id }}</p>
                </div>

                <div class="current-status {{ $customer->status ? 'status-active' : 'status-inactive' }}">
                    <span></span>
                    {{ $customer->status ? 'Active' : 'Inactive' }}
                </div>
            </div>

            <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">

                    {{-- Customer Name --}}
                    <div class="form-group">
                        <label for="name">Customer Name <span>*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}"
                            placeholder="Enter customer name" class="@error('name') input-error @enderror" required>
                        @error('name')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}"
                            placeholder="customer@example.com" class="@error('email') input-error @enderror">
                        @error('email')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}"
                            placeholder="Enter phone number" class="@error('phone') input-error @enderror">
                        @error('phone')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Customer Status <span>*</span></label>
                        <select name="status" id="status" class="@error('status') input-error @enderror" required>
                            <option value="1" {{ old('status', $customer->status) == '1' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ old('status', $customer->status) == '0' ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                        @error('status')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="form-group full-width">
                        <label for="address">Customer Address</label>
                        <textarea name="address" id="address" rows="4" placeholder="Enter complete customer address"
                            class="@error('address') input-error @enderror">{{ old('address', $customer->address) }}</textarea>
                        @error('address')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                {{-- Form Footer --}}
                <div class="form-footer">
                    <p><span>*</span> Required fields</p>

                    <div class="form-actions">
                        <a href="{{ route('admin.customers.index') }}" class="cancel-btn">
                            Cancel
                        </a>

                        <button type="submit" class="save-btn">
                            <span>&#10003;</span> Update Customer
                        </button>
                    </div>
                </div>

            </form>
        </div>

        {{-- Customer Metadata --}}
        <div class="info-note">
            <div class="info-icon">i</div>
            <div>
                <strong>Editing customer details</strong>
                <p>Review the updated information before clicking Update Customer.</p>
            </div>
        </div>

    </div>

    <style>
        .customer-page {
            padding: 8px 4px 30px;
            color: #e5e7eb;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }

        .eyebrow {
            display: inline-block;
            color: #60a5fa;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.8px;
            margin-bottom: 8px;
        }

        .page-header h1 {
            margin: 0;
            color: #fff;
            font-size: 29px;
            font-weight: 750;
            letter-spacing: -0.6px;
        }

        .page-header p {
            margin: 8px 0 0;
            color: #9ca3af;
            font-size: 14px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 9px;
            color: #e2e8f0;
            text-decoration: none;
            font-size: 13px;
            font-weight: 650;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: #334155;
            color: #fff;
        }

        .form-card {
            background: #111827;
            border: 1px solid #263449;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 23px 27px;
            background: linear-gradient(110deg, #17243a, #111827);
            border-bottom: 1px solid #263449;
        }

        .heading-icon {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(96, 165, 250, 0.25);
            color: #60a5fa;
            font-size: 23px;
        }

        .card-heading h2 {
            margin: 0;
            color: #f9fafb;
            font-size: 17px;
            font-weight: 700;
        }

        .card-heading p {
            margin: 6px 0 0;
            color: #9ca3af;
            font-size: 12px;
        }

        .current-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-left: auto;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 750;
            white-space: nowrap;
        }

        .current-status span {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .status-active {
            color: #86efac;
            background: rgba(22, 163, 74, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .status-active span {
            background: #22c55e;
        }

        .status-inactive {
            color: #fca5a5;
            background: rgba(220, 38, 38, 0.12);
            border: 1px solid rgba(248, 113, 113, 0.2);
        }

        .status-inactive span {
            background: #ef4444;
        }

        .form-card form {
            padding: 28px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px 22px;
        }

        .form-group {
            min-width: 0;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            color: #e5e7eb;
            font-size: 13px;
            font-weight: 650;
        }

        .form-group label span,
        .form-footer>p span {
            color: #f87171;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            display: block;
            width: 100%;
            box-sizing: border-box;
            padding: 12px 14px;
            border: 1px solid #374151;
            border-radius: 9px;
            outline: none;
            background: #0b1220;
            color: #f3f4f6;
            font-family: inherit;
            font-size: 13px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input,
        .form-group select {
            min-height: 45px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 115px;
            line-height: 1.6;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #6b7280;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.13);
        }

        .form-group select option {
            background: #111827;
            color: #f3f4f6;
        }

        .input-error {
            border-color: #ef4444 !important;
        }

        .error-text {
            display: block;
            margin-top: 7px;
            color: #fca5a5;
            font-size: 12px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
            margin-top: 30px;
            padding-top: 23px;
            border-top: 1px solid #263449;
        }

        .form-footer>p {
            margin: 0;
            color: #9ca3af;
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            gap: 11px;
            flex-wrap: wrap;
        }

        .cancel-btn,
        .save-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 42px;
            box-sizing: border-box;
            padding: 10px 18px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .cancel-btn {
            background: #1f2937;
            color: #d1d5db;
            border: 1px solid #374151;
        }

        .cancel-btn:hover {
            background: #374151;
            color: #fff;
        }

        .save-btn {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: #fff;
            border: 1px solid #3b82f6;
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.18);
        }

        .save-btn:hover {
            background: linear-gradient(135deg, #1d4ed8, #4338ca);
            transform: translateY(-1px);
        }

        .info-note {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-top: 20px;
            padding: 17px 20px;
            background: rgba(30, 64, 175, 0.10);
            border: 1px solid rgba(59, 130, 246, 0.20);
            border-radius: 11px;
        }

        .info-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            border: 1px solid #60a5fa;
            border-radius: 50%;
            color: #60a5fa;
            font-size: 13px;
            font-weight: 700;
        }

        .info-note strong {
            display: block;
            color: #bfdbfe;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .info-note p {
            margin: 0;
            color: #9ca3af;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-error {
            margin-bottom: 20px;
            padding: 16px 20px;
            background: rgba(127, 29, 29, 0.22);
            border: 1px solid #7f1d1d;
            border-radius: 10px;
            color: #fecaca;
            font-size: 13px;
        }

        .alert-error strong {
            display: block;
            margin-bottom: 8px;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert-error li+li {
            margin-top: 5px;
        }

        @media (max-width: 700px) {
            .customer-page {
                padding: 5px 0 22px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 20px;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .full-width {
                grid-column: auto;
            }

            .card-heading {
                padding: 19px;
                flex-wrap: wrap;
            }

            .current-status {
                margin-left: 0;
            }

            .form-card form {
                padding: 20px;
            }

            .form-footer {
                align-items: stretch;
                flex-direction: column;
            }

            .form-actions {
                width: 100%;
            }

            .form-actions>* {
                flex: 1;
            }
        }

        @media (max-width: 400px) {
            .form-card form {
                padding: 16px;
            }

            .form-actions {
                flex-direction: column;
            }

            .cancel-btn,
            .save-btn {
                width: 100%;
            }
        }
    </style>

@endsection