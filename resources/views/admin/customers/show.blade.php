@extends('admin.layouts.app')

@section('title', 'Customer Details')

@section('content')

    <div class="customer-page">

        {{-- Page Header --}}
        <div class="page-header">
            <div>
                <span class="eyebrow">STORE MANAGEMENT</span>
                <h1>Customer Details</h1>
                <p>View customer profile and contact information.</p>
            </div>

            <a href="{{ route('admin.customers.index') }}" class="back-btn">
                &larr; Back to Customers
            </a>
        </div>

        {{-- Customer Profile Card --}}
        <div class="profile-card">

            <div class="profile-banner">
                <div class="profile-avatar">
                    {{ strtoupper(substr($customer->name, 0, 1)) }}
                </div>

                <div class="profile-heading">
                    <h2>{{ $customer->name }}</h2>
                    <p>Customer ID: #{{ $customer->id }}</p>
                </div>

                <div class="status-badge {{ $customer->status ? 'active' : 'inactive' }}">
                    <span></span>
                    {{ $customer->status ? 'Active' : 'Inactive' }}
                </div>
            </div>

            {{-- Customer Information --}}
            <div class="details-section">
                <div class="section-heading">
                    <div>
                        <h3>Personal Information</h3>
                        <p>Customer contact details and address.</p>
                    </div>
                </div>

                <div class="details-grid">

                    {{-- Name --}}
                    <div class="detail-item">
                        <div class="detail-icon">U</div>
                        <div class="detail-content">
                            <span class="detail-label">Full Name</span>
                            <strong>{{ $customer->name }}</strong>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="detail-item">
                        <div class="detail-icon">@</div>
                        <div class="detail-content">
                            <span class="detail-label">Email Address</span>
                            <strong>{{ $customer->email ?: 'N/A' }}</strong>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="detail-item">
                        <div class="detail-icon">☎</div>
                        <div class="detail-content">
                            <span class="detail-label">Phone Number</span>
                            <strong>{{ $customer->phone ?: 'N/A' }}</strong>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="detail-item">
                        <div class="detail-icon">✓</div>
                        <div class="detail-content">
                            <span class="detail-label">Account Status</span>
                            <strong class="{{ $customer->status ? 'text-active' : 'text-inactive' }}">
                                {{ $customer->status ? 'Active' : 'Inactive' }}
                            </strong>
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="detail-item address-item">
                        <div class="detail-icon">⌖</div>
                        <div class="detail-content">
                            <span class="detail-label">Customer Address</span>
                            <strong class="address-text">
                                {{ $customer->address ?: 'No address provided.' }}
                            </strong>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Footer Actions --}}
            <div class="profile-footer">
                <p>Customer record #{{ $customer->id }}</p>

                <div class="action-buttons">
                    <a href="{{ route('admin.customers.index') }}" class="cancel-btn">
                        Back
                    </a>

                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="edit-btn">
                        <span>&#9998;</span> Edit Customer
                    </a>
                </div>
            </div>

        </div>

        {{-- Information Note --}}
        <div class="info-note">
            <div class="info-icon">i</div>
            <div>
                <strong>Customer profile</strong>
                <p>Use Edit Customer to update this customer's information or account status.</p>
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
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 28px;
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 8px;
            color: #60a5fa;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.8px;
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

        .profile-card {
            overflow: hidden;
            background: #111827;
            border: 1px solid #263449;
            border-radius: 15px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        }

        .profile-banner {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
            padding: 30px;
            background: linear-gradient(115deg, #172b49, #111827 85%);
            border-bottom: 1px solid #263449;
        }

        .profile-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            flex-shrink: 0;
            border-radius: 20px;
            background: linear-gradient(135deg, #3b82f6, #4f46e5);
            color: #fff;
            font-size: 30px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.22);
        }

        .profile-heading {
            min-width: 0;
        }

        .profile-heading h2 {
            margin: 0;
            color: #fff;
            font-size: 23px;
            font-weight: 750;
            overflow-wrap: anywhere;
        }

        .profile-heading p {
            margin: 8px 0 0;
            color: #9ca3af;
            font-size: 13px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-left: auto;
            padding: 8px 13px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 750;
            white-space: nowrap;
        }

        .status-badge span {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .status-badge.active {
            color: #86efac;
            background: rgba(22, 163, 74, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .status-badge.active span {
            background: #22c55e;
        }

        .status-badge.inactive {
            color: #fca5a5;
            background: rgba(220, 38, 38, 0.12);
            border: 1px solid rgba(248, 113, 113, 0.2);
        }

        .status-badge.inactive span {
            background: #ef4444;
        }

        .details-section {
            padding: 28px 30px;
        }

        .section-heading {
            margin-bottom: 25px;
        }

        .section-heading h3 {
            margin: 0;
            color: #f9fafb;
            font-size: 17px;
            font-weight: 750;
        }

        .section-heading p {
            margin: 7px 0 0;
            color: #9ca3af;
            font-size: 12px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .detail-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            min-width: 0;
            padding: 19px;
            background: #0b1220;
            border: 1px solid #263449;
            border-radius: 11px;
            transition: border-color 0.2s;
        }

        .detail-item:hover {
            border-color: #3b82f6;
        }

        .detail-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 11px;
            background: rgba(59, 130, 246, 0.13);
            border: 1px solid rgba(96, 165, 250, 0.16);
            color: #60a5fa;
            font-size: 17px;
            font-weight: 700;
        }

        .detail-content {
            min-width: 0;
            padding-top: 2px;
        }

        .detail-label {
            display: block;
            margin-bottom: 8px;
            color: #9ca3af;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
        }

        .detail-content strong {
            display: block;
            color: #f3f4f6;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .address-item {
            grid-column: 1 / -1;
        }

        .address-text {
            white-space: pre-line;
        }

        .detail-content strong.text-active {
            color: #86efac;
        }

        .detail-content strong.text-inactive {
            color: #fca5a5;
        }

        .profile-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            padding: 20px 30px;
            background: #131d2c;
            border-top: 1px solid #263449;
        }

        .profile-footer>p {
            margin: 0;
            color: #9ca3af;
            font-size: 12px;
        }

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .cancel-btn,
        .edit-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 41px;
            padding: 10px 17px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
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

        .edit-btn {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: #fff;
            border: 1px solid #3b82f6;
        }

        .edit-btn:hover {
            background: linear-gradient(135deg, #1d4ed8, #4338ca);
            color: #fff;
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
            margin-bottom: 5px;
            color: #bfdbfe;
            font-size: 12px;
        }

        .info-note p {
            margin: 0;
            color: #9ca3af;
            font-size: 12px;
            line-height: 1.6;
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

            .profile-banner {
                padding: 22px;
                gap: 14px;
            }

            .profile-avatar {
                width: 58px;
                height: 58px;
                border-radius: 16px;
                font-size: 25px;
            }

            .profile-heading h2 {
                font-size: 19px;
            }

            .status-badge {
                margin-left: 0;
            }

            .details-section {
                padding: 22px;
            }

            .details-grid {
                grid-template-columns: 1fr;
                gap: 13px;
            }

            .address-item {
                grid-column: auto;
            }

            .profile-footer {
                align-items: flex-start;
                flex-direction: column;
                padding: 20px 22px;
            }

            .action-buttons {
                width: 100%;
            }

            .action-buttons>* {
                flex: 1;
            }
        }

        @media (max-width: 400px) {

            .profile-banner,
            .details-section {
                padding: 16px;
            }

            .detail-item {
                padding: 14px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .cancel-btn,
            .edit-btn {
                width: 100%;
            }
        }
    </style>

@endsection