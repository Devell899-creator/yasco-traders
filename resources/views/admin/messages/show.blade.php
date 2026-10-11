@extends('admin.layouts.app')

@section('title', 'Message Details')

@section('content')

    <div class="message-details-page">

        {{-- Header --}}
        <div class="page-header">
            <div>
                <span class="eyebrow">STORE MANAGEMENT</span>
                <h1>Message Details</h1>
                <p>View customer inquiry and message information.</p>
            </div>

            <a href="{{ route('admin.messages.index') }}" class="back-btn">
                <span>&larr;</span> Back to Messages
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="success-alert">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="details-card">

            {{-- Card Header --}}
            <div class="details-card-header">
                <div class="header-icon">✉</div>

                <div class="header-title">
                    <h2>Customer Message</h2>
                    <p>Message ID: #{{ $message->id }}</p>
                </div>

                @if($message->is_read)
                    <span class="status-badge status-read">
                        <span class="status-dot"></span>
                        Read
                    </span>
                @else
                    <span class="status-badge status-unread">
                        <span class="status-dot"></span>
                        Unread
                    </span>
                @endif
            </div>

            {{-- Customer Information --}}
            <div class="section-heading">
                <span class="section-icon">◎</span>
                Customer Information
            </div>

            <div class="details-grid">

                <div class="detail-item">
                    <span class="detail-label">Customer Name</span>
                    <span class="detail-value">{{ $message->name ?: 'N/A' }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Email Address</span>
                    <span class="detail-value">
                        @if($message->email)
                            <a href="mailto:{{ $message->email }}">
                                {{ $message->email }}
                            </a>
                        @else
                            N/A
                        @endif
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Phone Number</span>
                    <span class="detail-value">
                        @if($message->phone)
                            <a href="tel:{{ $message->phone }}">
                                {{ $message->phone }}
                            </a>
                        @else
                            N/A
                        @endif
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Subject</span>
                    <span class="detail-value">
                        {{ $message->subject ?: 'No Subject' }}
                    </span>
                </div>

            </div>

            {{-- Message Content --}}
            <div class="section-heading message-section-heading">
                <span class="section-icon">☰</span>
                Message Content
            </div>

            <div class="message-content">
                <p>{{ $message->message }}</p>
            </div>

            {{-- Status Information --}}
            <div class="status-information">
                <div>
                    <span class="detail-label">Current Status</span>
                    <p>
                        @if($message->is_read)
                            This message has been marked as read.
                        @else
                            This message is currently unread.
                        @endif
                    </p>
                </div>
            </div>

            {{-- Actions --}}
            <div class="details-footer">

                <a href="{{ route('admin.messages.index') }}" class="btn-secondary">
                    Back
                </a>

                <a href="{{ route('admin.messages.edit', $message->id) }}" class="btn-edit">
                    ✎ Edit Message
                </a>

                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this message?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn-delete">
                        Delete Message
                    </button>
                </form>

            </div>

        </div>

    </div>

    <style>
        .message-details-page {
            color: #e5eaf5;
            padding-bottom: 30px;
        }

        .message-details-page * {
            box-sizing: border-box;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .eyebrow {
            display: inline-block;
            color: #7da7ff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .page-header h1 {
            color: #f4f7ff;
            font-size: 30px;
            font-weight: 800;
            margin: 0 0 7px;
        }

        .page-header p {
            color: #8d9bb5;
            font-size: 13px;
            margin: 0;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 15px;
            border: 1px solid #2b3b57;
            border-radius: 8px;
            background: #152239;
            color: #c5d4ed !important;
            text-decoration: none !important;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .back-btn:hover {
            background: #1d304e;
            border-color: #5276b5;
        }

        .back-btn span {
            font-size: 17px;
        }

        .success-alert {
            margin-bottom: 20px;
            padding: 13px 16px;
            border-radius: 9px;
            background: rgba(22, 163, 74, .12);
            border: 1px solid rgba(34, 197, 94, .25);
            color: #86efac;
            font-size: 13px;
        }

        .details-card {
            max-width: 900px;
            background: #111c31;
            border: 1px solid #263650;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .details-card-header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 23px 26px;
            background: #142037;
            border-bottom: 1px solid #263650;
        }

        .header-icon {
            width: 46px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: rgba(59, 130, 246, .14);
            color: #8eb4ff;
            font-size: 23px;
        }

        .header-title {
            min-width: 0;
        }

        .header-title h2 {
            color: #f0f4fc;
            font-size: 16px;
            font-weight: 750;
            margin: 0 0 6px;
        }

        .header-title p {
            color: #8d9bb5;
            font-size: 12px;
            margin: 0;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 10px;
            margin-left: auto;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .status-read {
            color: #6ee7a0;
            background: rgba(34, 197, 94, .11);
        }

        .status-read .status-dot {
            background: #4ade80;
        }

        .status-unread {
            color: #fca5a5;
            background: rgba(239, 68, 68, .11);
        }

        .status-unread .status-dot {
            background: #f87171;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 22px 26px 17px;
            color: #e5edfb;
            font-size: 13px;
            font-weight: 750;
        }

        .section-icon {
            color: #83aaff;
            font-size: 19px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            padding: 0 26px 25px;
        }

        .detail-item {
            min-width: 0;
            padding: 16px;
            background: #0d182b;
            border: 1px solid #24334c;
            border-radius: 10px;
        }

        .detail-label {
            display: block;
            color: #8393ae;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 9px;
        }

        .detail-value {
            display: block;
            color: #e4ebf8;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .detail-value a {
            color: #91b5ff;
            text-decoration: none;
        }

        .detail-value a:hover {
            text-decoration: underline;
        }

        .message-section-heading {
            border-top: 1px solid #263650;
        }

        .message-content {
            margin: 0 26px 25px;
            padding: 20px;
            min-height: 120px;
            background: #0d182b;
            border: 1px solid #24334c;
            border-radius: 10px;
        }

        .message-content p {
            color: #d4deee;
            font-size: 13px;
            line-height: 1.9;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
            margin: 0;
        }

        .status-information {
            margin: 0 26px 25px;
            padding: 16px 18px;
            background: rgba(59, 130, 246, .07);
            border: 1px solid rgba(96, 165, 250, .15);
            border-radius: 10px;
        }

        .status-information p {
            color: #aebed6;
            font-size: 12px;
            margin: 0;
        }

        .details-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            padding: 19px 26px;
            background: #142037;
            border-top: 1px solid #263650;
        }

        .details-footer form {
            margin: 0;
        }

        .btn-secondary,
        .btn-edit,
        .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 10px 15px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 750;
            text-decoration: none !important;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-secondary {
            color: #c0cce0 !important;
            background: #1a2942;
            border: 1px solid #34445f;
        }

        .btn-edit {
            color: #a9c6ff !important;
            background: rgba(59, 130, 246, .13);
            border: 1px solid rgba(59, 130, 246, .25);
        }

        .btn-delete {
            color: #fca5a5;
            background: rgba(239, 68, 68, .11);
            border: 1px solid rgba(239, 68, 68, .22);
        }

        .btn-secondary:hover,
        .btn-edit:hover,
        .btn-delete:hover {
            filter: brightness(1.2);
            transform: translateY(-1px);
        }

        @media (max-width: 650px) {
            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .back-btn {
                width: 100%;
            }

            .details-card-header {
                padding: 19px;
                flex-wrap: wrap;
            }

            .status-badge {
                margin-left: 0;
            }

            .section-heading {
                padding: 20px 19px 15px;
            }

            .details-grid {
                grid-template-columns: 1fr;
                padding: 0 19px 20px;
            }

            .message-content {
                margin: 0 19px 20px;
                padding: 16px;
            }

            .status-information {
                margin: 0 19px 20px;
            }

            .details-footer {
                padding: 16px 19px;
            }

            .details-footer>a,
            .details-footer form,
            .details-footer form button {
                flex: 1;
            }

            .details-footer form button {
                width: 100%;
            }
        }
    </style>

@endsection