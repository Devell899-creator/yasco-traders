@extends('admin.layouts.app')

@section('title', 'Message Details')

@section('content')

    <h1 style="margin-bottom: 25px;">
        Message Details
    </h1>

    <div style="
        background: white;
        padding: 25px;
        border-radius: 8px;
        max-width: 800px;
    ">

        <div style="margin-bottom: 15px;">
            <strong>Name:</strong>
            {{ $message->name }}
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Email:</strong>
            {{ $message->email }}
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Phone:</strong>
            {{ $message->phone ?? 'N/A' }}
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Subject:</strong>
            {{ $message->subject ?? 'No Subject' }}
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Message:</strong>
            <p>{{ $message->message }}</p>
        </div>

        <div style="margin-bottom: 25px;">
            <strong>Status:</strong>

            @if($message->is_read)
                <span style="color: green;">Read</span>
            @else
                <span style="color: red;">Unread</span>
            @endif
        </div>



    </div>

@endsection