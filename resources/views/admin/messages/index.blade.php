@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')

    <div class="messages-page">

        {{-- Page Header --}}
        <div class="page-header">
            <div>
                <span class="eyebrow">STORE MANAGEMENT</span>
                <h1>Messages</h1>
                <p>Manage customer inquiries and contact messages.</p>
            </div>

            <a href="{{ route('admin.messages.create') }}" class="btn-add">
                <span>+</span> Add Message
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert-success">
                <span class="alert-icon">✓</span>
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- Messages Table --}}
        <div class="messages-card">

            <div class="card-heading">
                <div>
                    <h2>Customer Inquiries</h2>
                    <p>View and manage messages received from customers.</p>
                </div>

                <div class="total-badge">
                    {{ $messages->total() }} Messages
                </div>
            </div>

            <div class="table-responsive">
                <table class="messages-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CUSTOMER</th>
                            <th>CONTACT</th>
                            <th>SUBJECT</th>
                            <th>MESSAGE</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($messages as $message)
                            <tr>
                                {{-- ID --}}
                                <td>
                                    <span class="message-id">
                                        #{{ $message->id }}
                                    </span>
                                </td>

                                {{-- Customer --}}
                                <td>
                                    <div class="customer-info">
                                        <div class="customer-avatar">
                                            {{ strtoupper(substr($message->name ?? 'C', 0, 1)) }}
                                        </div>

                                        <div class="customer-details">
                                            <strong>{{ $message->name }}</strong>
                                            <span>{{ $message->email }}</span>
                                        </div>
                                    </div>
                                </td>

                                {{-- Contact --}}
                                <td>
                                    <span class="contact-value">
                                        {{ $message->phone ?: 'Not provided' }}
                                    </span>
                                </td>

                                {{-- Subject --}}
                                <td>
                                    <span class="subject-text">
                                        {{ $message->subject ?: 'No Subject' }}
                                    </span>
                                </td>

                                {{-- Message Preview --}}
                                <td>
                                    <div class="message-preview" title="{{ $message->message }}">
                                        {{ \Illuminate\Support\Str::limit($message->message, 55) }}
                                    </div>
                                </td>

                                {{-- Status --}}
                                <td>
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
                                </td>

                                {{-- Actions --}}
                                <td>
                                    <div class="action-buttons">

                                        <a href="{{ route('admin.messages.show', $message->id) }}" class="action-btn view-btn"
                                            title="View message">
                                            View
                                        </a>

                                        <a href="{{ route('admin.messages.edit', $message->id) }}" class="action-btn edit-btn"
                                            title="Edit message">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this message?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="action-btn delete-btn" title="Delete message">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="empty-icon">✉</div>
                                        <h3>No messages found</h3>
                                        <p>Customer messages will appear here when available.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($messages->hasPages())
                <div class="pagination-wrapper">
                    {{ $messages->links() }}
                </div>
            @endif

        </div>

    </div>

    <style>
        .messages-page {
            color: black;
            padding-bottom: 25px;
        }

        .messages-page * {
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
            color: #444;
            font-size: 30px;
            font-weight: 800;
            margin: 0 0 7px;
        }

        .page-header p,
        .card-heading p {
            color: #8d9bb5;
            font-size: 13px;
            margin: 0;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 11px 17px;
            border-radius: 9px;
            background: linear-gradient(135deg, #3978f6, #6654e8);
            color: #fff !important;
            text-decoration: none !important;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            box-shadow: 0 5px 15px rgba(65, 105, 235, .2);
            transition: .2s ease;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(65, 105, 235, .3);
        }

        .btn-add span {
            font-size: 21px;
            line-height: 15px;
        }

        .alert-success,
        .alert-error {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(22, 163, 74, .12);
            border: 1px solid rgba(34, 197, 94, .25);
            color: #86efac;
        }

        .alert-icon {
            font-weight: 800;
        }

        .alert-error {
            background: rgba(239, 68, 68, .1);
            border: 1px solid rgba(239, 68, 68, .25);
            color: #fca5a5;
        }

        .messages-card {
            background: #111c31;
            border: 1px solid #24324c;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 23px 24px;
            border-bottom: 1px solid #24324c;
        }

        .card-heading h2 {
            color: #f2f5fc;
            font-size: 16px;
            font-weight: 750;
            margin: 0 0 6px;
        }

        .card-heading p {
            font-size: 12px;
        }

        .total-badge {
            color: #9dbbff;
            background: rgba(59, 130, 246, .12);
            border: 1px solid rgba(96, 165, 250, .2);
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .messages-table {
            width: 100%;
            min-width: 1050px;
            border-collapse: collapse;
        }

        .messages-table thead {
            background: #162239;
        }

        .messages-table th {
            padding: 15px 17px;
            text-align: left;
            color: #8494b0;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
            white-space: nowrap;
            border-bottom: 1px solid #283650;
        }

        .messages-table td {
            padding: 17px;
            color: #cbd5e5;
            font-size: 12px;
            border-bottom: 1px solid #202d44;
            vertical-align: middle;
        }

        .messages-table tbody tr {
            transition: background .2s ease;
        }

        .messages-table tbody tr:hover {
            background: rgba(67, 95, 145, .09);
        }

        .messages-table tbody tr:last-child td {
            border-bottom: none;
        }

        .message-id {
            color: #8daeff;
            font-size: 11px;
            font-weight: 800;
        }

        .customer-info {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 180px;
        }

        .customer-avatar {
            width: 37px;
            height: 37px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 11px;
            background: linear-gradient(135deg, #254b91, #684bc2);
            color: #fff;
            font-size: 14px;
            font-weight: 800;
        }

        .customer-details {
            display: flex;
            flex-direction: column;
            gap: 5px;
            min-width: 0;
        }

        .customer-details strong {
            color: #edf2fc;
            font-size: 12px;
            font-weight: 700;
        }

        .customer-details span {
            color: #8594ad;
            font-size: 11px;
        }

        .contact-value {
            color: #b5c2d8;
            white-space: nowrap;
        }

        .subject-text {
            display: inline-block;
            color: #dce6f8;
            font-weight: 650;
            max-width: 150px;
        }

        .message-preview {
            max-width: 220px;
            color: #8e9db7;
            line-height: 1.6;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 10px;
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

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-buttons form {
            margin: 0;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid transparent;
            border-radius: 6px;
            padding: 7px 9px;
            color: #fff !important;
            text-decoration: none !important;
            font-size: 10px;
            font-weight: 750;
            cursor: pointer;
            transition: .2s ease;
        }

        .view-btn {
            background: rgba(14, 165, 233, .13);
            border-color: rgba(14, 165, 233, .22);
            color: #7dd3fc !important;
        }

        .edit-btn {
            background: rgba(59, 130, 246, .13);
            border-color: rgba(59, 130, 246, .22);
            color: #93baff !important;
        }

        .delete-btn {
            background: rgba(239, 68, 68, .11);
            border-color: rgba(239, 68, 68, .2);
            color: #fca5a5 !important;
        }

        .view-btn:hover,
        .edit-btn:hover,
        .delete-btn:hover {
            filter: brightness(1.2);
            transform: translateY(-1px);
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            border-radius: 16px;
            background: #1b2b46;
            color: #83aaff;
            font-size: 25px;
        }

        .empty-state h3 {
            color: #e8edf8;
            font-size: 16px;
            margin: 0 0 7px;
        }

        .empty-state p {
            color: #8998b1;
            font-size: 12px;
            margin: 0;
        }

        .pagination-wrapper {
            padding: 18px 24px;
            border-top: 1px solid #24324c;
            overflow-x: auto;
        }

        /* Laravel pagination */
        .pagination-wrapper nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .pagination-wrapper nav>div:first-child {
            color: #8d9bb5;
            font-size: 12px;
        }

        .pagination-wrapper nav>div:last-child {
            flex-shrink: 0;
        }

        .pagination-wrapper nav span,
        .pagination-wrapper nav a {
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .btn-add {
                width: 100%;
            }

            .card-heading {
                padding: 18px;
                align-items: flex-start;
                flex-direction: column;
            }

            .messages-table td {
                padding: 14px;
            }

            .pagination-wrapper {
                padding: 15px;
            }
        }
    </style>

@endsection