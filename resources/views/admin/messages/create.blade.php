@extends('admin.layouts.app')

@section('title', 'Add Message')

@section('content')

    <div class="message-form-page">

        {{-- Header --}}
        <div class="page-header">
            <div>
                <span class="eyebrow">STORE MANAGEMENT</span>
                <h1>Add Message</h1>
                <p>Create and manage a customer message.</p>
            </div>

            <a href="{{ route('admin.messages.index') }}" class="back-btn">
                <span>&larr;</span> Back to Messages
            </a>
        </div>

        {{-- Validation Summary --}}
        @if($errors->any())
            <div class="error-summary">
                <strong>Please correct the following errors:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">

            <div class="form-card-header">
                <div class="header-icon">✉</div>
                <div>
                    <h2>Message Information</h2>
                    <p>Enter the customer details and message content below.</p>
                </div>
            </div>

            <form action="{{ route('admin.messages.store') }}" method="POST">
                @csrf

                <div class="form-body">

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">Customer Name <span>*</span></label>

                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Enter customer name"
                            required>

                        @error('name')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">Email Address <span>*</span></label>

                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="customer@example.com"
                            required>

                        @error('email')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="form-group">
                        <label for="phone">Phone Number</label>

                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                            class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone number">

                        @error('phone')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Subject --}}
                    <div class="form-group">
                        <label for="subject">Subject</label>

                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                            class="form-control @error('subject') is-invalid @enderror" placeholder="Enter message subject">

                        @error('subject')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Message --}}
                    <div class="form-group full-width">
                        <label for="message">Message Content <span>*</span></label>

                        <textarea name="message" id="message" rows="6"
                            class="form-control @error('message') is-invalid @enderror"
                            placeholder="Write the customer message here..." required>{{ old('message') }}</textarea>

                        @error('message')
                            <small class="field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Read Status --}}
                    <div class="form-group full-width">
                        <label for="is_read">Message Status <span>*</span></label>

                        <select name="is_read" id="is_read" class="form-control @error('is_read') is-invalid @enderror"
                            required>
                            <option value="0" {{ old('is_read', '0') == '0' ? 'selected' : '' }}>
                                Unread
                            </option>

                            <option value="1" {{ old('is_read') == '1' ? 'selected' : '' }}>
                                Read
                            </option>
                        </select>

                        @error('is_read')
                            <small class="field-error">{{ $message }}</small>
                        @enderror

                        <small class="field-help">
                            Choose whether this message has already been read.
                        </small>
                    </div>

                </div>

                {{-- Form Footer --}}
                <div class="form-footer">
                    <a href="{{ route('admin.messages.index') }}" class="cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="save-btn">
                        <span>✓</span> Save Message
                    </button>
                </div>

            </form>
        </div>

    </div>

    <style>
        .message-form-page {
            color: #e5eaf5;
            padding-bottom: 30px;
        }

        .message-form-page * {
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
            transition: .2s ease;
        }

        .back-btn:hover {
            background: #1d304e;
            border-color: #5276b5;
        }

        .back-btn span {
            font-size: 17px;
        }

        .form-card {
            max-width: 900px;
            background: #111c31;
            border: 1px solid #263650;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .form-card-header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 23px 26px;
            border-bottom: 1px solid #263650;
        }

        .header-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: rgba(59, 130, 246, .14);
            color: #8eb4ff;
            font-size: 22px;
        }

        .form-card-header h2 {
            color: #f0f4fc;
            font-size: 16px;
            font-weight: 750;
            margin: 0 0 6px;
        }

        .form-card-header p {
            color: #8d9bb5;
            font-size: 12px;
            margin: 0;
        }

        .form-body {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 23px 20px;
            padding: 26px;
        }

        .form-group {
            min-width: 0;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            color: #dce5f5;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .form-group label span {
            color: #f87171;
        }

        .form-control {
            display: block;
            width: 100%;
            min-height: 43px;
            padding: 11px 13px;
            background: #0c1628;
            border: 1px solid #2c3c58;
            border-radius: 8px;
            outline: none;
            color: #e7edf8;
            font-family: inherit;
            font-size: 12px;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .form-control:focus {
            border-color: #5288fa;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .12);
        }

        .form-control option {
            background: #111c31;
            color: #e7edf8;
        }

        textarea.form-control {
            min-height: 145px;
            resize: vertical;
            line-height: 1.7;
        }

        .is-invalid {
            border-color: #f87171;
        }

        .field-error {
            display: block;
            color: #fca5a5;
            font-size: 11px;
            margin-top: 7px;
        }

        .field-help {
            display: block;
            color: #7f90aa;
            font-size: 11px;
            margin-top: 8px;
            line-height: 1.6;
        }

        .error-summary {
            max-width: 900px;
            margin-bottom: 20px;
            padding: 15px 18px;
            background: rgba(239, 68, 68, .1);
            border: 1px solid rgba(239, 68, 68, .25);
            border-radius: 10px;
            color: #fca5a5;
            font-size: 12px;
        }

        .error-summary strong {
            display: block;
            margin-bottom: 8px;
        }

        .error-summary ul {
            padding-left: 20px;
            margin: 0;
            line-height: 1.8;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            padding: 19px 26px;
            background: #142037;
            border-top: 1px solid #263650;
        }

        .cancel-btn,
        .save-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 41px;
            padding: 10px 17px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 750;
            text-decoration: none !important;
            cursor: pointer;
            transition: .2s ease;
        }

        .cancel-btn {
            color: #c0cce0 !important;
            background: #1a2942;
            border: 1px solid #34445f;
        }

        .cancel-btn:hover {
            background: #243653;
        }

        .save-btn {
            color: #fff;
            background: linear-gradient(135deg, #3978f6, #6654e8);
            border: none;
            box-shadow: 0 4px 12px rgba(59, 130, 246, .2);
        }

        .save-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(59, 130, 246, .3);
        }

        .save-btn span {
            font-size: 15px;
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
                justify-content: center;
            }

            .form-card-header {
                padding: 19px;
            }

            .form-body {
                grid-template-columns: 1fr;
                padding: 20px;
                gap: 20px;
            }

            .full-width {
                grid-column: auto;
            }

            .form-footer {
                padding: 16px 20px;
                flex-wrap: wrap;
            }

            .cancel-btn,
            .save-btn {
                flex: 1;
            }
        }
    </style>

@endsection