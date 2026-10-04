@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1 style="color: black; margin-bottom: 25px;">
        Dashboard
    </h1>

    <div class="cards">

        <!-- Products -->
        <div class="card">
            <h3>Products</h3>
            <p>{{ $products }}</p>
        </div>

        <!-- Categories -->
        <div class="card">
            <h3>Categories</h3>
            <p>{{ $categories }}</p>
        </div>

        <!-- Orders -->
        <div class="card">
            <h3>Orders</h3>
            <p>{{ $orders }}</p>

            <a href="{{ route('admin.orders.index') }}" style="
                       display: inline-block;
                       margin-top: 10px;
                       padding: 8px 15px;
                       background: #007bff;
                       color: white;
                       text-decoration: none;
                       border-radius: 5px;
                   ">
                View Orders
            </a>
        </div>

        <!-- Customers -->
        <div class="card">
            <h3>Customers</h3>
            <p>{{ $customers }}</p>
        </div>

        <!-- Messages -->
        <div class="card">
            <h3>Messages</h3>
            <p>{{ $messages }}</p>
        </div>

    </div>

@endsection