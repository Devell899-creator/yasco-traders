@extends('admin.layouts.app')

@section('title', 'Orders')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">

        <h1 style="font-size: 32px; font-weight: 700; margin-bottom: 25px;">
            Orders
        </h1>

        <a href="{{ route('admin.orders.create') }}" style="
                        background: #007bff;
                        color: white;
                        padding: 10px 16px;
                        border-radius: 6px;
                        text-decoration: none;
                   ">
            Add Order
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div style="
                            background: #d4edda;
                            color: #155724;
                            padding: 12px;
                            margin-bottom: 20px;
                            border-radius: 6px;
                        ">
            {{ session('success') }}
        </div>

    @endif


    <div style="
                background: white;
                padding: 20px;
                border-radius: 8px;
                overflow-x: auto;
            ">

        <table style="
                    width: 100%;
                    border-collapse: collapse;
                ">

            <thead>

                <tr style="border-bottom: 1px solid #ddd;">

                    <th style="padding: 12px; text-align: left;">
                        ID
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Customer
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Email
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Phone
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Address
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Total
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Status
                    </th>

                    <th style="padding: 12px; text-align: left;">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($orders as $order)

                    <tr style="border-bottom: 1px solid #eee;">

                        <td style="padding: 12px;">
                            {{ $order->id }}
                        </td>

                        <td style="padding: 12px;">
                            {{ $order->customer_name }}
                        </td>

                        <td style="padding: 12px;">
                            {{ $order->customer_email ?? '-' }}
                        </td>

                        <td style="padding: 12px;">
                            {{ $order->customer_phone ?? '-' }}
                        </td>

                        <td style="padding: 12px;">
                            {{ $order->address ?? '-' }}
                        </td>

                        <td style="padding: 12px;">
                            {{ $order->total_amount }}
                        </td>

                        <td style="padding: 12px;">
                            {{ $order->status }}
                        </td>

                        <td style="padding: 12px;">

                            <div class="action-buttons">

                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn-view">
                                    View
                                </a>

                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this order?')">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" style="padding: 30px; text-align: center;">

                            No orders found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        {{-- Pagination --}}
        <div style="margin-top: 20px;">

            {{ $orders->links() }}

        </div>

    </div>

@endsection