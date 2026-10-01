@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1 style="color: black; margin-bottom: 25px;">
        Dashboard
    </h1>

    {{-- Dashboard Cards --}}
    <div class="cards">

        <div class="card">
            <h3>Products</h3>
            <p>{{ $products }}</p>
        </div>

        <div class="card">
            <h3>Categories</h3>
            <p>{{ $categories }}</p>
        </div>

        <div class="card">
            <h3>Orders</h3>
            <p>{{ $orders }}</p>
        </div>

        <div class="card">
            <h3>Customers</h3>
            <p>{{ $customers }}</p>
        </div>

        <td style="padding: 12px;">
            {{ $order->address ?? '-' }}
        </td>

        <div class="card">
            <h3>Messages</h3>
            <p>{{ $messages }}</p>
        </div>

    </div>

@endsection