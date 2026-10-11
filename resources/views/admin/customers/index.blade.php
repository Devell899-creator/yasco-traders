@extends('admin.layouts.app')

@section('title', 'Customers')

@section('content')

    <div class="customers-page">

        {{-- Page Header --}}
        <div class="page-header">

            <div>
                <span class="page-label">STORE MANAGEMENT</span>
                <h1>Customers</h1>
                <p>Manage your customer information and accounts.</p>
            </div>

            <a href="{{ route('admin.customers.create') }}" class="add-btn">
                <span class="plus-icon">+</span>
                Add Customer
            </a>

        </div>


        {{-- Success Message --}}
        @if(session('success'))
            <div class="success-message">
                <span class="success-icon">✓</span>
                {{ session('success') }}
            </div>
        @endif


        {{-- Customer Table Card --}}
        <div class="customers-card">

            <div class="card-header">

                <div>
                    <h2>Customer Directory</h2>
                    <p>View and manage your registered customers.</p>
                </div>

                <div class="customer-count">
                    {{ $customers->total() }} Customers
                </div>

            </div>


            <div class="table-wrapper">

                <table class="customers-table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CUSTOMER</th>
                            <th>CONTACT</th>
                            <th>ADDRESS</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($customers as $customer)

                            <tr>

                                {{-- ID --}}
                                <td>
                                    <span class="customer-id">
                                        #{{ $customer->id }}
                                    </span>
                                </td>


                                {{-- Customer --}}
                                <td>
                                    <div class="customer-info">

                                        <div class="customer-avatar">
                                            {{ strtoupper(substr($customer->name ?? 'C', 0, 1)) }}
                                        </div>

                                        <div class="customer-details">
                                            <strong>{{ $customer->name }}</strong>
                                            <span>{{ $customer->email ?? 'No email provided' }}</span>
                                        </div>

                                    </div>
                                </td>


                                {{-- Contact --}}
                                <td>
                                    <div class="contact-info">
                                        <span class="contact-label">Phone</span>
                                        <span class="contact-value">
                                            {{ $customer->phone ?? 'Not provided' }}
                                        </span>
                                    </div>
                                </td>


                                {{-- Address --}}
                                <td>
                                    <span class="address-text">
                                        {{ $customer->address ?: 'Not provided' }}
                                    </span>
                                </td>


                                {{-- Status --}}
                                <td>
                                    @if($customer->status)
                                        <span class="status-badge status-active">
                                            <span class="status-dot"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="status-badge status-inactive">
                                            <span class="status-dot"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>


                                {{-- Actions --}}
                                <td>
                                    <div class="action-buttons">

                                        <a href="{{ route('admin.customers.show', $customer->id) }}"
                                            class="action-btn view-btn">
                                            View
                                        </a>

                                        <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                            class="action-btn edit-btn">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this customer?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="action-btn delete-btn">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <div class="empty-icon">U</div>
                                        <h3>No Customers Found</h3>
                                        <p>There are no customers to display yet.</p>

                                        <a href="{{ route('admin.customers.create') }}" class="add-btn">
                                            + Add Customer
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($customers->hasPages())
                <div class="pagination-wrapper">
                    {{ $customers->links() }}
                </div>
            @endif

        </div>

    </div>


    <style>
        .customers-page {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Page Header */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-label {
            display: inline-block;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin-bottom: 6px;
        }

        .page-header h1 {
            margin: 0;
            color: #0f172a;
            font-size: 30px;
            font-weight: 700;
        }

        .page-header p {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        /* Add Button */

        .add-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 11px 17px;
            background: #2563eb;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            transition: 0.2s;
        }

        .add-btn:hover {
            background: #1d4ed8;
            color: white;
            transform: translateY(-1px);
        }

        .plus-icon {
            font-size: 19px;
            line-height: 14px;
        }

        /* Success Message */

        .success-message {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 16px;
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
            border-radius: 9px;
            background: #f0fdf4;
            color: #166534;
            font-size: 13px;
        }

        .success-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 23px;
            height: 23px;
            border-radius: 50%;
            background: #dcfce7;
            font-weight: 700;
        }

        /* Card */

        .customers-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.05);
            overflow: hidden;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 22px 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 17px;
            font-weight: 700;
        }

        .card-header p {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 12px;
        }

        .customer-count {
            padding: 7px 11px;
            border-radius: 7px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* Table */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .customers-table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
            text-align: left;
        }

        .customers-table thead {
            background: #f8fafc;
        }

        .customers-table th {
            padding: 15px 18px;
            border-bottom: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.7px;
            white-space: nowrap;
        }

        .customers-table td {
            padding: 17px 18px;
            border-bottom: 1px solid #f1f5f9;
            color: #475569;
            font-size: 12px;
            vertical-align: middle;
        }

        .customers-table tbody tr {
            transition: background 0.2s;
        }

        .customers-table tbody tr:hover {
            background: #f8fafc;
        }

        .customers-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Customer Information */

        .customer-id {
            color: #64748b;
            font-size: 12px;
            font-weight: 700;
        }

        .customer-info {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 180px;
        }

        .customer-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 15px;
            font-weight: 800;
        }

        .customer-details {
            display: flex;
            flex-direction: column;
            gap: 5px;
            min-width: 0;
        }

        .customer-details strong {
            color: #0f172a;
            font-size: 13px;
            font-weight: 700;
        }

        .customer-details span {
            color: #94a3b8;
            font-size: 11px;
            overflow-wrap: anywhere;
        }

        /* Contact and Address */

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .contact-label {
            color: #94a3b8;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .contact-value {
            color: #334155;
            font-size: 12px;
        }

        .address-text {
            display: block;
            max-width: 180px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        /* Status */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-active {
            background: #dcfce7;
            color: #15803d;
        }

        .status-inactive {
            background: #fee2e2;
            color: #b91c1c;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* Action Buttons */

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .action-buttons form {
            margin: 0;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 10px;
            border: none;
            border-radius: 6px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .view-btn {
            background: #eff6ff;
            color: #2563eb;
        }

        .view-btn:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .edit-btn {
            background: #fef3c7;
            color: #92400e;
        }

        .edit-btn:hover {
            background: #fde68a;
            color: #78350f;
        }

        .delete-btn {
            background: #fee2e2;
            color: #b91c1c;
        }

        .delete-btn:hover {
            background: #fecaca;
            color: #991b1b;
        }

        /* Empty State */

        .empty-state {
            padding: 45px 20px;
            text-align: center;
        }

        .empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 55px;
            height: 55px;
            margin: 0 auto 14px;
            border-radius: 14px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 20px;
            font-weight: 800;
        }

        .empty-state h3 {
            margin: 0;
            color: #0f172a;
            font-size: 16px;
        }

        .empty-state p {
            margin: 8px 0 18px;
            color: #64748b;
            font-size: 13px;
        }

        /* Pagination */

        .pagination-wrapper {
            padding: 18px 24px;
            border-top: 1px solid #e2e8f0;
            overflow-x: auto;
        }

        .pagination-wrapper nav {
            display: flex;
            justify-content: flex-end;
        }

        .pagination-wrapper p {
            margin-bottom: 0;
        }

        /* Mobile */

        @media (max-width: 768px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .page-header .add-btn {
                width: 100%;
                box-sizing: border-box;
            }

            .card-header {
                padding: 18px;
                align-items: flex-start;
            }

            .customer-count {
                font-size: 10px;
            }

            .pagination-wrapper {
                padding: 15px;
            }

        }
    </style>

@endsection