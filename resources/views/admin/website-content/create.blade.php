@extends('admin.layouts.app')

@section('title', 'Add Website Content')

@section('content')

    <style>
        .wc-create-page {
            padding: 10px 0 30px;
            color: #e5e7eb;
        }

        .wc-create-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .wc-create-title {
            margin: 0 0 7px;
            color: #f8fafc;
            font-size: 27px;
            font-weight: 700;
        }

        .wc-create-subtitle {
            margin: 0;
            color: #94a3b8;
            font-size: 14px;
        }

        .wc-create-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            background: #263449;
            color: #e2e8f0;
            border: 1px solid #3b4b61;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .wc-create-back:hover {
            background: #34465e;
            color: #fff;
            text-decoration: none;
        }

        .wc-create-card {
            max-width: 900px;
            background: #172337;
            border: 1px solid #2b3a50;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .wc-create-card-header {
            padding: 22px 25px;
            background: #1d2b41;
            border-bottom: 1px solid #2b3a50;
        }

        .wc-create-card-header h3 {
            margin: 0 0 6px;
            color: #f8fafc;
            font-size: 18px;
            font-weight: 700;
        }

        .wc-create-card-header p {
            margin: 0;
            color: #94a3b8;
            font-size: 13px;
        }

        .wc-create-form {
            padding: 25px;
        }

        .wc-create-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .wc-create-field {
            min-width: 0;
        }

        .wc-create-field.full-width {
            grid-column: 1 / -1;
        }

        .wc-create-field label {
            display: block;
            margin-bottom: 9px;
            color: #dbe4f0;
            font-size: 13px;
            font-weight: 600;
        }

        .wc-create-required {
            color: #fb7185;
        }

        .wc-create-control {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 11px 13px;
            background: #101b2c;
            border: 1px solid #36465d;
            border-radius: 8px;
            color: #f1f5f9;
            outline: none;
            box-shadow: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .wc-create-control:focus {
            border-color: #818cf8;
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.15);
        }

        .wc-create-control::placeholder {
            color: #64748b;
        }

        .wc-create-control option {
            background: #172337;
            color: #f1f5f9;
        }

        textarea.wc-create-control {
            min-height: 145px;
            resize: vertical;
            line-height: 1.6;
        }

        .wc-create-control.is-invalid {
            border-color: #fb7185;
        }

        .wc-create-error {
            margin: 7px 0 0;
            color: #fda4af;
            font-size: 12px;
        }

        .wc-create-hint {
            display: block;
            margin-top: 7px;
            color: #8493a8;
            font-size: 12px;
        }

        .wc-create-error-summary {
            margin-bottom: 22px;
            padding: 14px 16px;
            color: #fecdd3;
            background: rgba(190, 24, 93, 0.13);
            border: 1px solid rgba(251, 113, 133, 0.4);
            border-radius: 8px;
        }

        .wc-create-error-summary ul {
            margin: 7px 0 0;
            padding-left: 20px;
        }

        .wc-create-divider {
            border: 0;
            border-top: 1px solid #2b3a50;
            margin: 27px 0 20px;
        }

        .wc-create-actions {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 10px;
        }

        .wc-create-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 11px 19px;
            border: 0;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }

        .wc-create-btn-save {
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff;
        }

        .wc-create-btn-save:hover {
            background: #047857;
            color: #fff;
            text-decoration: none;
        }

        .wc-create-btn-cancel {
            background: #2b3a50;
            color: #e2e8f0;
            border: 1px solid #40516a;
        }

        .wc-create-btn-cancel:hover {
            background: #394b64;
            color: #fff;
            text-decoration: none;
        }

        @media (max-width: 650px) {
            .wc-create-grid {
                grid-template-columns: 1fr;
            }

            .wc-create-field.full-width {
                grid-column: auto;
            }

            .wc-create-form {
                padding: 18px;
            }

            .wc-create-card-header {
                padding: 18px;
            }

            .wc-create-title {
                font-size: 23px;
            }

            .wc-create-actions {
                flex-direction: column;
            }

            .wc-create-btn {
                width: 100%;
            }
        }
    </style>

    <div class="wc-create-page">

        {{-- Page Header --}}
        <div class="wc-create-header">
            <div>
                <h1 class="wc-create-title">Add Website Content</h1>
                <p class="wc-create-subtitle">
                    Add or configure content for a page or section of your website.
                </p>
            </div>

            <a href="{{ route('admin.website-content.index') }}" class="wc-create-back">
                <i class="fas fa-arrow-left"></i>
                Back to Content
            </a>
        </div>

        <div class="wc-create-card">

            <div class="wc-create-card-header">
                <h3>
                    <i class="fas fa-file-circle-plus" style="color: #818cf8; margin-right: 8px;"></i>
                    Content Information
                </h3>
                <p>Fill in the details below to create a content entry.</p>
            </div>

            <form method="POST" action="{{ route('admin.website-content.store') }}" class="wc-create-form">
                @csrf

                @if ($errors->any())
                    <div class="wc-create-error-summary">
                        <strong>Please correct the following errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="wc-create-grid">

                    {{-- Page --}}
                    <div class="wc-create-field">
                        <label for="page">
                            Page <span class="wc-create-required">*</span>
                        </label>

                        <input type="text" name="page" id="page" value="{{ old('page') }}" placeholder="Example: home"
                            class="wc-create-control @error('page') is-invalid @enderror" required>

                        <small class="wc-create-hint">
                            The page where this content will appear.
                        </small>

                        @error('page')
                            <p class="wc-create-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Section --}}
                    <div class="wc-create-field">
                        <label for="section">
                            Section <span class="wc-create-required">*</span>
                        </label>

                        <input type="text" name="section" id="section" value="{{ old('section') }}"
                            placeholder="Example: hero" class="wc-create-control @error('section') is-invalid @enderror"
                            required>

                        <small class="wc-create-hint">
                            The section within the selected page.
                        </small>

                        @error('section')
                            <p class="wc-create-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Key --}}
                    <div class="wc-create-field full-width">
                        <label for="key">
                            Content Key <span class="wc-create-required">*</span>
                        </label>

                        <input type="text" name="key" id="key" value="{{ old('key') }}" placeholder="Example: heading"
                            class="wc-create-control @error('key') is-invalid @enderror" required>

                        <small class="wc-create-hint">
                            A unique identifier used to reference this content, according to your application logic.
                        </small>

                        @error('key')
                            <p class="wc-create-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Value --}}
                    <div class="wc-create-field full-width">
                        <label for="value">Content / Value</label>

                        <textarea name="value" id="value" rows="5" placeholder="Enter website content..."
                            class="wc-create-control @error('value') is-invalid @enderror">{{ old('value') }}</textarea>

                        <small class="wc-create-hint">
                            Enter the text or value you want to store for this content entry.
                        </small>

                        @error('value')
                            <p class="wc-create-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Type --}}
                    <div class="wc-create-field full-width">
                        <label for="type">
                            Content Type <span class="wc-create-required">*</span>
                        </label>

                        <select name="type" id="type" class="wc-create-control @error('type') is-invalid @enderror"
                            required>
                            <option value="text" {{ old('type', 'text') == 'text' ? 'selected' : '' }}>
                                Text
                            </option>

                            <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>
                                Textarea
                            </option>

                            <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>
                                Image
                            </option>
                        </select>

                        <small class="wc-create-hint">
                            Choose the content type supported by your application.
                        </small>

                        @error('type')
                            <p class="wc-create-error">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <hr class="wc-create-divider">

                <div class="wc-create-actions">

                    <a href="{{ route('admin.website-content.index') }}" class="wc-create-btn wc-create-btn-cancel">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>

                    <button type="submit" class="wc-create-btn wc-create-btn-save">
                        <i class="fas fa-save"></i>
                        Save Content
                    </button>

                </div>

            </form>
        </div>

    </div>

@endsection