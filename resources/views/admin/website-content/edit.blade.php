@extends('admin.layouts.app')

@section('title', 'Edit Website Content')

@section('content')

    <style>
        .wc-edit-page {
            padding: 10px 0 30px;
            color: #e5e7eb;
        }

        .wc-edit-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .wc-edit-title {
            margin: 0 0 7px;
            color: #f8fafc;
            font-size: 27px;
            font-weight: 700;
        }

        .wc-edit-subtitle {
            margin: 0;
            color: #94a3b8;
            font-size: 14px;
        }

        .wc-edit-back {
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

        .wc-edit-back:hover {
            background: #34465e;
            color: #fff;
            text-decoration: none;
        }

        .wc-edit-card {
            max-width: 900px;
            background: #172337;
            border: 1px solid #2b3a50;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .wc-edit-card-header {
            padding: 22px 25px;
            background: #1d2b41;
            border-bottom: 1px solid #2b3a50;
        }

        .wc-edit-card-header h3 {
            margin: 0 0 6px;
            color: #f8fafc;
            font-size: 18px;
            font-weight: 700;
        }

        .wc-edit-card-header p {
            margin: 0;
            color: #94a3b8;
            font-size: 13px;
        }

        .wc-edit-form {
            padding: 25px;
        }

        .wc-edit-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .wc-edit-field {
            min-width: 0;
        }

        .wc-edit-field.full-width {
            grid-column: 1 / -1;
        }

        .wc-edit-field label {
            display: block;
            margin-bottom: 9px;
            color: #dbe4f0;
            font-size: 13px;
            font-weight: 600;
        }

        .wc-edit-required {
            color: #fb7185;
        }

        .wc-edit-control {
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

        .wc-edit-control:focus {
            border-color: #818cf8;
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.15);
        }

        .wc-edit-control::placeholder {
            color: #64748b;
        }

        .wc-edit-control option {
            background: #172337;
            color: #f1f5f9;
        }

        textarea.wc-edit-control {
            min-height: 145px;
            resize: vertical;
            line-height: 1.6;
        }

        .wc-edit-control.is-invalid {
            border-color: #fb7185;
        }

        .wc-edit-error {
            margin: 7px 0 0;
            color: #fda4af;
            font-size: 12px;
        }

        .wc-edit-hint {
            display: block;
            margin-top: 7px;
            color: #8493a8;
            font-size: 12px;
        }

        .wc-edit-error-summary {
            margin-bottom: 22px;
            padding: 14px 16px;
            color: #fecdd3;
            background: rgba(190, 24, 93, 0.13);
            border: 1px solid rgba(251, 113, 133, 0.4);
            border-radius: 8px;
        }

        .wc-edit-error-summary ul {
            margin: 7px 0 0;
            padding-left: 20px;
        }

        .wc-edit-divider {
            border: 0;
            border-top: 1px solid #2b3a50;
            margin: 27px 0 20px;
        }

        .wc-edit-actions {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 10px;
        }

        .wc-edit-btn {
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

        .wc-edit-btn-update {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
        }

        .wc-edit-btn-update:hover {
            background: #4338ca;
            color: #fff;
            text-decoration: none;
        }

        .wc-edit-btn-cancel {
            background: #2b3a50;
            color: #e2e8f0;
            border: 1px solid #40516a;
        }

        .wc-edit-btn-cancel:hover {
            background: #394b64;
            color: #fff;
            text-decoration: none;
        }

        @media (max-width: 650px) {
            .wc-edit-grid {
                grid-template-columns: 1fr;
            }

            .wc-edit-field.full-width {
                grid-column: auto;
            }

            .wc-edit-form {
                padding: 18px;
            }

            .wc-edit-card-header {
                padding: 18px;
            }

            .wc-edit-title {
                font-size: 23px;
            }

            .wc-edit-actions {
                flex-direction: column;
            }

            .wc-edit-btn {
                width: 100%;
            }
        }
    </style>

    <div class="wc-edit-page">

        {{-- Page Header --}}
        <div class="wc-edit-header">
            <div>
                <h1 class="wc-edit-title">Edit Website Content</h1>
                <p class="wc-edit-subtitle">
                    Update the content information for your website.
                </p>
            </div>

            <a href="{{ route('admin.website-content.index') }}" class="wc-edit-back">
                <i class="fas fa-arrow-left"></i>
                Back to Content
            </a>
        </div>

        <div class="wc-edit-card">

            <div class="wc-edit-card-header">
                <h3>
                    <i class="fas fa-edit" style="color: #818cf8; margin-right: 8px;"></i>
                    Content Entry #{{ $content->id }}
                </h3>
                <p>Make your changes and save the updated content.</p>
            </div>

            <form method="POST" action="{{ route('admin.website-content.update', $content->id) }}" class="wc-edit-form">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="wc-edit-error-summary">
                        <strong>Please correct the following errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="wc-edit-grid">

                    {{-- Page --}}
                    <div class="wc-edit-field">
                        <label for="page">
                            Page <span class="wc-edit-required">*</span>
                        </label>

                        <input type="text" name="page" id="page" value="{{ old('page', $content->page) }}"
                            placeholder="Example: home" class="wc-edit-control @error('page') is-invalid @enderror"
                            required>

                        @error('page')
                            <p class="wc-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Section --}}
                    <div class="wc-edit-field">
                        <label for="section">
                            Section <span class="wc-edit-required">*</span>
                        </label>

                        <input type="text" name="section" id="section" value="{{ old('section', $content->section) }}"
                            placeholder="Example: hero" class="wc-edit-control @error('section') is-invalid @enderror"
                            required>

                        @error('section')
                            <p class="wc-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Key --}}
                    <div class="wc-edit-field full-width">
                        <label for="key">
                            Content Key <span class="wc-edit-required">*</span>
                        </label>

                        <input type="text" name="key" id="key" value="{{ old('key', $content->key) }}"
                            placeholder="Example: heading" class="wc-edit-control @error('key') is-invalid @enderror"
                            required>

                        @error('key')
                            <p class="wc-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Value --}}
                    <div class="wc-edit-field full-width">
                        <label for="value">Content / Value</label>

                        <textarea name="value" id="value" rows="5" placeholder="Enter website content..."
                            class="wc-edit-control @error('value') is-invalid @enderror">{{ old('value', $content->value) }}</textarea>

                        @error('value')
                            <p class="wc-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Type --}}
                    <div class="wc-edit-field full-width">
                        <label for="type">
                            Content Type <span class="wc-edit-required">*</span>
                        </label>

                        <select name="type" id="type" class="wc-edit-control @error('type') is-invalid @enderror" required>
                            <option value="text" {{ old('type', $content->type) == 'text' ? 'selected' : '' }}>
                                Text
                            </option>

                            <option value="textarea" {{ old('type', $content->type) == 'textarea' ? 'selected' : '' }}>
                                Textarea
                            </option>

                            <option value="image" {{ old('type', $content->type) == 'image' ? 'selected' : '' }}>
                                Image
                            </option>
                        </select>

                        @error('type')
                            <p class="wc-edit-error">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <hr class="wc-edit-divider">

                <div class="wc-edit-actions">

                    <a href="{{ route('admin.website-content.index') }}" class="wc-edit-btn wc-edit-btn-cancel">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>

                    <button type="submit" class="wc-edit-btn wc-edit-btn-update">
                        <i class="fas fa-save"></i>
                        Update Content
                    </button>

                </div>

            </form>
        </div>

    </div>

@endsection