@extends('admin.layouts.app')

@section('title', 'Customer Details')

@section('content')

    <h1 style="margin-bottom: 25px;">
        Customer Details
    </h1>

    <div style="
        background: white;
        padding: 25px;
        border-radius: 8px;
        max-width: 800px;
    ">

        <div style="margin-bottom: 15px;">
            <strong>Name:</strong>
            {{ $customer->name }}
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Email:</strong>
            {{ $customer->email ?? 'N/A' }}
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Phone:</strong>
            {{ $customer->phone ?? 'N/A' }}
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Address:</strong>
            {{ $customer->address ?? 'N/A' }}
        </div>

        <div style="margin-bottom: 25px;">
            <strong>Status:</strong>

            @if($customer->status)
                <span style="color: green;">Active</span>
            @else
                <span style="color: red;">Inactive</span>
            @endif
        </div>

    </div>

@endsection