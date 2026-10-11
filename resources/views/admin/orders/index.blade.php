@extends('admin.layouts.app')

@section('title', 'Orders')

@section('content')

    <style>
        .orders-page {
            color: #444;
            padding: 5px 0 25px;
        }

        .orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .orders-title {
            margin: 0;
            font-size: 28px;
            font-weight: 750;
            color: #444;
            letter-spacing: -0.5px;
        }

        .orders-subtitle {
            color: #94a3b8;
            margin: 7px 0 0;
            font-size: 14px;
        }

        .order-add-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: #fff !important;
            padding: 11px 17px;
            border-radius: 9px;
            text-decoration: none !important;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(37, 99, 235, .22);
            transition: .2s ease;
        }

        .order-add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, .35);
        }

        .orders-alert {
            background: rgba(22, 163, 74, .13);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, .25);
            border-radius: 10px;
            padding: 14px 17px;
            margin-bottom: 20px;
        }

        .orders-card {
            background: #111c30;
            border: 1px solid #26354c;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
        }

        .orders-card-header {
            padding: 20px 22px;
            border-bottom: 1px solid #26354c;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .orders-card-title {
            color: #f1f5f9;
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .orders-count {
            background: #1e3a5f;
            color: #93c5fd;
            border: 1px solid #294b78;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 700;
        }

        .orders-table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }

        .orders-table thead {
            background: #17243a;
        }

        .orders-table th {
            color: #94a3b8;
            text-align: left;
            padding: 15px 17px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .7px;
            font-weight: 700;
            white-space: nowrap;
            border-bottom: 1px solid #26354c;
        }

        .orders-table td {
            color: #cbd5e1;
            padding: 16px 17px;
            font-size: 13px;
            border-bottom: 1px solid #243147;
            vertical-align: middle;
        }

        .orders-table tbody tr {
            transition: background .2s ease;
        }

        .orders-table tbody tr:hover {
            background: rgba(51, 65, 85, .25);
        }

        .orders-table tbody tr:last-child td {
            border-bottom: none;
        }

        .order-id {
            color: #93c5fd;
            font-weight: 700;
        }

        .order-customer {
            color: #f1f5f9;
            font-weight: 600;
            min-width: 125px;
        }

        .order-address {
            display: block;
            max-width: 180px;
            color: #94a3b8;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .order-total {
            color: #86efac;
            font-weight: 700;
            white-space: nowrap;
        }

        .order-status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #253449;
            color: #cbd5e1;
            font-size: 11px;
            font-weight: 700;
            text-transform: capitalize;
            white-space: nowrap;
            border: 1px solid #34465f;
        }

        .order-actions {
            display: flex;
            align-items: center;
            gap: 7px;
            white-space: nowrap;
        }

        .order-actions form {
            margin: 0;
            display: inline-flex;
        }

        .order-action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 10px;
            border-radius: 7px;
            text-decoration: none !important;
            border: 1px solid transparent;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .order-view {
            background: rgba(59, 130, 246, .12);
            color: #93c5fd !important;
            border-color: rgba(59, 130, 246, .25);
        }

        .order-view:hover {
            background: #2563eb;
            color: #fff !important;
        }

        .order-edit {
            background: rgba(245, 158, 11, .12);
            color: #fcd34d !important;
            border-color: rgba(245, 158, 11, .25);
        }

        .order-edit:hover {
            background: #d97706;
            color: #fff !important;
        }

        .order-delete {
            background: rgba(239, 68, 68, .10);
            color: #fca5a5;
            border-color: rgba(239, 68, 68, .25);
        }

        .order-delete:hover {
            background: #dc2626;
            color: #fff;
        }

        .orders-empty {
            text-align: center;
            padding: 55px 20px !important;
        }

        .orders-empty-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .orders-empty-title {
            color: #e2e8f0;
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .orders-empty-text {
            color: #94a3b8;
            font-size: 13px;
        }

        .orders-pagination {
            padding: 18px 22px;
            border-top: 1px solid #26354c;
            overflow-x: auto;
        }

        .orders-pagination nav {
            display: flex;
            justify-content: flex-end;
        }

        .orders-pagination nav p {
            color: #94a3b8;
        }

        .orders-pagination nav span,
        .orders-pagination nav a {
            background: #17243a !important;
            color: #cbd5e1 !important;
            border-color: #334155 !important;
        }

        .orders-pagination nav [aria-current="page"] span {
            background: #2563eb !important;
            color: #fff !important;
            border-color: #2563eb !important;
        }

        @media (max-width: 768px) {
            .orders-title {
                font-size: 24px;
            }

            .orders-header {
                align-items: flex-start;
            }

            .order-add-btn {
                padding: 10px 13px;
            }

            .orders-card-header {
                padding: 16px;
            }

            .orders-pagination {
                padding: 15px;
            }
        }
    </style>

    <div class="orders-page">

        <div class="orders-header">
            <div>
                <h1 class="orders-title">Orders</h1>
                <p class="orders-subtitle">
                    Manage customer orders, review details and track order status.
                </p>
            </div>

            <a href="{{ route('admin.orders.create') }}" class="order-add-btn">
                <span>+</span> Add Order
            </a>
        </div>

        @if(session('success'))
            <div class="orders-alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="orders-card">

            <div class="orders-card-header">
                <h3 class="orders-card-title">All Orders</h3>

                <span class="orders-count">
                    {{ $orders->total() }} Orders
                </span>
            </div>

            <div class="orders-table-wrap">
                <table class="orders-table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>
                                    <span class="order-id">#{{ $order->id }}</span>
                                </td>

                                <td>
                                    <div class="order-customer">
                                        {{ $order->customer_name }}
                                    </div>
                                </td>

                                <td>{{ $order->customer_email ?? '-' }}</td>

                                <td>{{ $order->customer_phone ?? '-' }}</td>

                                <td>
                                    <span class="order-address">
                                        {{ $order->address ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="order-total">
                                        Rs {{ number_format((float) $order->total_amount, 2) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="order-status">
                                        {{ $order->status ?? 'Pending' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="order-actions">

                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                           class="order-action-btn order-view">
                                            View
                                        </a>

                                        <a href="{{ route('admin.orders.edit', $order->id) }}"
                                           class="order-action-btn order-edit">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this order?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="order-action-btn order-delete">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="orders-empty">
                                    <div class="orders-empty-icon">📦</div>
                                    <div class="orders-empty-title">No orders found</div>
                                    <div class="orders-empty-text">
                                        Orders will appear here when they are available.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            @if($orders->hasPages())
                <div class="orders-pagination">
                    {{ $orders->links() }}
                </div>
            @endif

        </div>

    </div>

@endsection