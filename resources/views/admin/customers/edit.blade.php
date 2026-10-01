@extends('admin.layouts.app')

@section('title', 'Edit Customer')

@section('content')

    <h1 style="margin-bottom: 25px;">
        Edit Customer
    </h1>

    <div style="
        background: white;
        padding: 25px;
        border-radius: 8px;
        max-width: 800px;
    ">

        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">

            @csrf
            @method('PUT')

            {{-- Name --}}
            <div style="margin-bottom: 20px;">
                <label for="name">Customer Name</label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $customer->name) }}"
                    required
                    style="width: 100%; padding: 10px; margin-top: 7px; border: 1px solid #ccc; border-radius: 5px;"
                >

                @error('name')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div style="margin-bottom: 20px;">
                <label for="email">Email</label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $customer->email) }}"
                    style="width: 100%; padding: 10px; margin-top: 7px; border: 1px solid #ccc; border-radius: 5px;"
                >

                @error('email')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone --}}
            <div style="margin-bottom: 20px;">
                <label for="phone">Phone</label>

                <input
                    type="text"
                    name="phone"
                    id="phone"
                    value="{{ old('phone', $customer->phone) }}"
                    style="width: 100%; padding: 10px; margin-top: 7px; border: 1px solid #ccc; border-radius: 5px;"
                >

                @error('phone')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address --}}
            <div style="margin-bottom: 20px;">
                <label for="address">Address</label>

                <textarea
                    name="address"
                    id="address"
                    rows="4"
                    style="width: 100%; padding: 10px; margin-top: 7px; border: 1px solid #ccc; border-radius: 5px;"
                >{{ old('address', $customer->address) }}</textarea>

                @error('address')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div style="margin-bottom: 25px;">
                <label for="status">Status</label>

                <select
                    name="status"
                    id="status"
                    required
                    style="width: 100%; padding: 10px; margin-top: 7px; border: 1px solid #ccc; border-radius: 5px;"
                >

                    <option value="1"
                        {{ old('status', $customer->status) == '1' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status', $customer->status) == '0' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

                @error('status')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div style="display: flex; gap: 10px;">

                <button
                    type="submit"
                    style="
                        background: #007bff;
                        color: white;
                        border: none;
                        padding: 10px 18px;
                        border-radius: 6px;
                        cursor: pointer;
                    ">
                    Update Customer
                </button>

                <a
                    href="{{ route('admin.customers.index') }}"
                    style="
                        background: #6c757d;
                        color: white;
                        padding: 10px 18px;
                        border-radius: 6px;
                        text-decoration: none;
                    ">
                    Cancel
                </a>

            </div>

        </form>

    </div>

@endsection