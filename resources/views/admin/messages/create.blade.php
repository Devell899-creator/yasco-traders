@extends('admin.layouts.app')

@section('title', 'Add Message')

@section('content')

    <h1 style="margin-bottom: 25px;">
        Add Message
    </h1>

    <div style="
        background: white;
        padding: 25px;
        border-radius: 8px;
        max-width: 800px;
    ">

        <form action="{{ route('admin.messages.store') }}" method="POST">

            @csrf

            {{-- Name --}}
            <div style="margin-bottom: 20px;">
                <label for="name">Name</label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
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
                    value="{{ old('email') }}"
                    required
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
                    value="{{ old('phone') }}"
                    style="width: 100%; padding: 10px; margin-top: 7px; border: 1px solid #ccc; border-radius: 5px;"
                >

                @error('phone')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Subject --}}
            <div style="margin-bottom: 20px;">
                <label for="subject">Subject</label>

                <input
                    type="text"
                    name="subject"
                    id="subject"
                    value="{{ old('subject') }}"
                    style="width: 100%; padding: 10px; margin-top: 7px; border: 1px solid #ccc; border-radius: 5px;"
                >

                @error('subject')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Message --}}
            <div style="margin-bottom: 20px;">
                <label for="message">Message</label>

                <textarea
                    name="message"
                    id="message"
                    rows="6"
                    required
                    style="width: 100%; padding: 10px; margin-top: 7px; border: 1px solid #ccc; border-radius: 5px;"
                >{{ old('message') }}</textarea>

                @error('message')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Read Status --}}
            <div style="margin-bottom: 25px;">
                <label for="is_read">Status</label>

                <select
                    name="is_read"
                    id="is_read"
                    required
                    style="width: 100%; padding: 10px; margin-top: 7px; border: 1px solid #ccc; border-radius: 5px;"
                >

                    <option value="0"
                        {{ old('is_read', '0') == '0' ? 'selected' : '' }}>
                        Unread
                    </option>

                    <option value="1"
                        {{ old('is_read') == '1' ? 'selected' : '' }}>
                        Read
                    </option>

                </select>

                @error('is_read')
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
                    Save Message
                </button>

            </div>

        </form>

    </div>

@endsection