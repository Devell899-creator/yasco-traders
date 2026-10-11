@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')

    <div class="edit-category-page">

        {{-- Page Header --}}
        <div class="page-header">

            <div>
                <span class="page-label">STORE MANAGEMENT</span>

                <h1>Edit Category</h1>

                <p>
                    Update the details and settings of this category.
                </p>
            </div>

            <a href="{{ route('admin.categories.index') }}" class="back-btn">
                ← Back to Categories
            </a>

        </div>


        {{-- Validation Errors --}}
        @if ($errors->any())

            <div class="error-box">

                <div class="error-title">
                    ⚠ Please fix the following errors
                </div>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        {{-- Form Card --}}
        <div class="form-card">

            {{-- Card Header --}}
            <div class="form-card-header">

                <div>

                    <div class="header-top">
                        <span class="page-label">CATEGORY INFORMATION</span>

                        <span class="category-id">
                            ID #{{ $category->id }}
                        </span>
                    </div>

                    <h2>Edit Category</h2>

                    <p>
                        Modify the information of your existing category.
                    </p>

                </div>

                <div class="category-icon">
                    C
                </div>

            </div>


            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')


                {{-- Basic Information --}}
                <div class="form-section">

                    <div class="section-title">
                        <span>01</span>
                        Basic Information
                    </div>


                    <div class="form-grid">

                        {{-- Name --}}
                        <div class="form-group">

                            <label for="name">
                                Category Name <span>*</span>
                            </label>

                            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                                placeholder="Enter category name">

                            @error('name')
                                <small class="field-error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- Status --}}
                        <div class="form-group">

                            <label for="status">
                                Status
                            </label>

                            <select id="status" name="status">

                                <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                            @error('status')
                                <small class="field-error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- Description --}}
                        <div class="form-group full-width">

                            <label for="description">
                                Description
                            </label>

                            <textarea id="description" name="description" rows="6"
                                placeholder="Enter category description">{{ old('description', $category->description) }}</textarea>

                            @error('description')
                                <small class="field-error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- Category Settings --}}
                <div class="form-section">

                    <div class="section-title">
                        <span>02</span>
                        Category Settings
                    </div>


                    <div class="form-grid">

                        {{-- Sort Order --}}
                        <div class="form-group">

                            <label for="sort_order">
                                Sort Order
                            </label>

                            <input type="number" id="sort_order" name="sort_order"
                                value="{{ old('sort_order', $category->sort_order) }}" min="0" placeholder="0">

                            <small class="help-text">
                                Smaller numbers appear first.
                            </small>

                            @error('sort_order')
                                <small class="field-error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- Category Image --}}
                        <div class="form-group">

                            <label>
                                Category Image
                            </label>


                            {{-- Current Image --}}
                            @if ($category->image)

                                <div class="current-image-box">

                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">

                                    <div class="current-image-info">

                                        <strong>
                                            Current Image
                                        </strong>

                                        <span>
                                            Upload a new image to replace it.
                                        </span>

                                    </div>

                                </div>

                            @else

                                <div class="no-image-box">

                                    <div class="no-image-icon">
                                        C
                                    </div>

                                    <div>
                                        <strong>No Image</strong>

                                        <span>
                                            This category has no image.
                                        </span>
                                    </div>

                                </div>

                            @endif


                            {{-- Upload New Image --}}
                            <div class="upload-box">

                                <input type="file" id="category-image" name="image" accept="image/*">

                                <label for="category-image" class="upload-label">

                                    <div class="upload-icon">
                                        ↑
                                    </div>

                                    <strong>
                                        Choose New Image
                                    </strong>

                                    <small>
                                        JPG, JPEG, PNG or WEBP
                                    </small>

                                </label>

                            </div>

                            <small class="help-text">
                                Leave empty to keep the current image. Maximum 2MB.
                            </small>

                            @error('image')
                                <small class="field-error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- Actions --}}
                <div class="form-actions">

                    <a href="{{ route('admin.categories.index') }}" class="cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="save-btn">
                        Update Category
                    </button>

                </div>

            </form>

        </div>

    </div>


    <style>
        .edit-category-page {
            max-width: 1000px;
            margin: 0 auto;
        }


        /* Page Header */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-label {
            display: inline-block;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin-bottom: 6px;
        }

        .page-header h1 {
            margin: 0;
            color: #0f172a;
            font-size: 30px;
            font-weight: 700;
        }

        .page-header p {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 14px;
        }


        /* Back Button */

        .back-btn {
            background: #0f172a;
            color: white;
            padding: 11px 17px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
            white-space: nowrap;
        }

        .back-btn:hover {
            background: #1e293b;
            color: white;
        }


        /* Error */

        .error-box {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #9f1239;
            padding: 16px 18px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .error-title {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
            font-size: 13px;
        }

        .error-box li {
            margin-bottom: 3px;
        }


        /* Form Card */

        .form-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }


        /* Card Header */

        .form-card-header {
            padding: 22px 25px;
            border-bottom: 1px solid #e2e8f0;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-top {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 3px;
        }

        .header-top .page-label {
            margin: 0;
        }

        .category-id {
            background: #f1f5f9;
            color: #64748b;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 700;
        }

        .form-card-header h2 {
            margin: 4px 0 0;
            color: #0f172a;
            font-size: 18px;
        }

        .form-card-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .category-icon {
            width: 42px;
            height: 42px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 16px;
            font-weight: 800;
        }


        /* Sections */

        .form-section {
            padding: 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #0f172a;
            font-size: 14px;
            font-weight: 700;

            margin-bottom: 20px;
        }

        .section-title span {
            width: 28px;
            height: 28px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #eff6ff;
            color: #2563eb;

            border-radius: 7px;

            font-size: 11px;
            font-weight: 800;
        }


        /* Grid */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: 1 / -1;
        }


        /* Labels */

        .form-group label {
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group label span {
            color: #ef4444;
        }


        /* Inputs */

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            box-sizing: border-box;

            padding: 12px 13px;

            border: 1px solid #cbd5e1;
            border-radius: 8px;

            background: #ffffff;
            color: #0f172a;

            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;

            outline: none;
            transition: 0.2s;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #94a3b8;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 130px;
        }


        /* Help & Errors */

        .help-text {
            margin-top: 7px;
            color: #94a3b8;
            font-size: 12px;
            line-height: 1.5;
        }

        .field-error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
        }


        /* Current Image */

        .current-image-box {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 10px;

            margin-bottom: 12px;

            border: 1px solid #e2e8f0;
            border-radius: 9px;

            background: #f8fafc;
        }

        .current-image-box img {
            width: 65px;
            height: 65px;

            object-fit: cover;

            border-radius: 7px;

            border: 1px solid #e2e8f0;
            background: white;
        }

        .current-image-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .current-image-info strong {
            color: #334155;
            font-size: 12px;
        }

        .current-image-info span {
            color: #94a3b8;
            font-size: 11px;
        }


        /* No Image */

        .no-image-box {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 12px;

            margin-bottom: 12px;

            border: 1px dashed #cbd5e1;
            border-radius: 9px;

            background: #f8fafc;
        }

        .no-image-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: #e2e8f0;
            color: #64748b;

            font-size: 15px;
            font-weight: 800;
        }

        .no-image-box div:last-child {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .no-image-box strong {
            color: #334155;
            font-size: 12px;
        }

        .no-image-box span {
            color: #94a3b8;
            font-size: 11px;
        }


        /* Upload */

        .upload-box {
            height: 140px;

            border: 2px dashed #cbd5e1;
            border-radius: 10px;

            background: #f8fafc;

            transition: 0.2s;
        }

        .upload-box:hover {
            border-color: #2563eb;
            background: #eff6ff;
        }

        .upload-box input {
            display: none;
        }

        .upload-label {
            width: 100%;
            height: 100%;

            display: flex !important;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            cursor: pointer;
            text-align: center;
        }

        .upload-icon {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: #dbeafe;
            color: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
            font-weight: 700;

            margin-bottom: 9px;
        }

        .upload-label strong {
            color: #334155;
            font-size: 13px;
        }

        .upload-label small {
            margin-top: 4px;
            color: #94a3b8;
            font-size: 11px;
        }


        /* Actions */

        .form-actions {
            padding: 20px 25px;

            background: #f8fafc;

            display: flex;
            justify-content: flex-end;

            gap: 10px;
        }

        .cancel-btn,
        .save-btn {
            padding: 11px 19px;

            border-radius: 8px;

            font-size: 13px;
            font-weight: 600;

            text-decoration: none;

            border: none;
            cursor: pointer;

            transition: 0.2s;
        }

        .cancel-btn {
            background: #e2e8f0;
            color: #334155;
        }

        .cancel-btn:hover {
            background: #cbd5e1;
            color: #0f172a;
        }

        .save-btn {
            background: #2563eb;
            color: white;
        }

        .save-btn:hover {
            background: #1d4ed8;
        }


        /* Mobile */

        @media (max-width: 768px) {

            .edit-category-page {
                width: 100%;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .back-btn {
                width: 100%;
                text-align: center;
                box-sizing: border-box;
            }

            .form-card-header {
                padding: 18px;
                align-items: flex-start;
            }

            .header-top {
                flex-wrap: wrap;
            }

            .form-section {
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .current-image-box {
                align-items: flex-start;
            }

            .form-actions {
                padding: 18px;
                flex-direction: column-reverse;
            }

            .cancel-btn,
            .save-btn {
                width: 100%;
                text-align: center;
                box-sizing: border-box;
            }

        }
    </style>

@endsection