@extends('admin.layouts.app')

@section('title', 'Edit Message')

@section('content')

    <h1 style="margin-bottom: 25px;">
        Edit Message
    </h1>

    <div style="
        background: white;
        padding: 25px;
        border-radius: 8px;
        max-width: 800px;
    ">

        <form action="{{ route('admin.messages.update', $message->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label>Name</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $message->name) }}"
                    required
                    style="width: 100%; padding: 10px; margin-top: 7px;"
                >

                @error('name')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $message->email) }}"
                    required
                    style="width: 100%; padding: 10px; margin-top: 7px;"
                >

                @error('email')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label>Phone</label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $message->phone) }}"
                    style="width: 100%; padding: 10px; margin-top: 7px;"
                >
            </div>

            <div style="margin-bottom: 20px;">
                <label>Subject</label>

                <input
                    type="text"
                    name="subject"
                    value="{{ old('subject', $message->subject) }}"
                    style="width: 100%; padding: 10px; margin-top: 7px;"
                >
            </div>

            <div style="margin-bottom: 20px;">
                <label>Message</label>

                <textarea
                    name="message"
                    rows="6"
                    required
                    style="width: 100%; padding: 10px; margin-top: 7px;"
                >{{ old('message', $message->message) }}</textarea>
            </div>

            <div style="margin-bottom: 25px;">
                <label>Status</label>

                <select
                    name="is_read"
                    required
                    style="width: 100%; padding: 10px; margin-top: 7px;"
                >
                    <option value="0"
                        {{ old('is_read', $message->is_read) == '0' ? 'selected' : '' }}>
                        Unread
                    </option>

                    <option value="1"
                        {{ old('is_read', $message->is_read) == '1' ? 'selected' : '' }}>
                        Read
                    </option>
                </select>
            </div>

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
                    Update Message
                </button>

                <a href="{{ route('admin.messages.index') }}"
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