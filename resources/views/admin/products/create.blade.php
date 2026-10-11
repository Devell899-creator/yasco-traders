@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')

    <div class="create-product-page">

        {{-- =========================
        PAGE HEADER
        ========================== --}}

        <div class="create-header">

            <div>

                <div class="page-label">
                    PRODUCT MANAGEMENT
                </div>

                <h1>Add Product</h1>

                <p>
                    Add a new product to your store inventory.
                </p>

            </div>

            <a href="{{ route('admin.products.index') }}" class="back-btn">
                ← Back to Products
            </a>

        </div>


        {{-- =========================
        VALIDATION ERRORS
        ========================== --}}

        @if ($errors->any())

            <div class="error-box">

                <div class="error-icon">
                    !
                </div>

                <div>

                    <strong>
                        Please fix the following errors:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        @endif


        {{-- =========================
        FORM CARD
        ========================== --}}

        <div class="form-card">

            <div class="form-card-header">

                <div>

                    <span class="form-label">
                        PRODUCT INFORMATION
                    </span>

                    <h2>
                        Product Details
                    </h2>

                </div>

                <div class="form-status">
                    NEW
                </div>

            </div>


            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

                @csrf


                <div class="form-grid">


                    {{-- Product Name --}}

                    <div class="form-group">

                        <label>
                            Product Name
                            <span>*</span>
                        </label>

                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter product name">

                    </div>


                    {{-- SKU --}}

                    <div class="form-group">

                        <label>
                            SKU
                            <span>*</span>
                        </label>

                        <input type="text" name="sku" value="{{ old('sku') }}" placeholder="e.g. YAS-001">

                    </div>


                    {{-- Category --}}

                    <div class="form-group">

                        <label>
                            Category
                            <span>*</span>
                        </label>

                        <select name="category_id" id="category_id" required>

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('category_id')

                            <p class="field-error">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Brand --}}

                    <div class="form-group">

                        <label>
                            Brand
                        </label>

                        <input type="text" name="brand" value="{{ old('brand') }}" placeholder="Enter brand name">

                    </div>


                    {{-- Price --}}

                    <div class="form-group">

                        <label>
                            Price
                            <span>*</span>
                        </label>

                        <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                            placeholder="Enter product price">

                    </div>


                    {{-- Currency --}}

                    <div class="form-group">

                        <label>
                            Currency
                        </label>

                        <input type="text" name="currency" value="{{ old('currency', 'SAR') }}" placeholder="SAR">

                    </div>


                    {{-- Stock --}}

                    <div class="form-group">

                        <label>
                            Stock
                            <span>*</span>
                        </label>

                        <input type="number" name="stock" value="{{ old('stock') }}" placeholder="Enter stock quantity"
                            min="0">

                    </div>


                    {{-- Rating --}}

                    <div class="form-group">

                        <label>
                            Rating
                        </label>

                        <input type="number" step="0.1" min="0" max="5" name="rating" value="{{ old('rating') }}"
                            placeholder="0 - 5">

                    </div>


                    {{-- Reviews --}}

                    <div class="form-group">

                        <label>
                            Reviews
                        </label>

                        <input type="number" min="0" name="reviews" value="{{ old('reviews', 0) }}"
                            placeholder="Number of reviews">

                    </div>


                    {{-- Featured --}}

                    <div class="form-group">

                        <label>
                            Featured Product
                        </label>

                        <select name="is_featured">

                            <option value="0" {{ old('is_featured', 0) == 0 ? 'selected' : '' }}>
                                No
                            </option>

                            <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>
                                Yes
                            </option>

                        </select>

                    </div>


                    {{-- Product Image --}}

                    <div class="form-group">

                        <label>
                            Product Image
                        </label>

                        <div class="file-box">

                            <input type="file" name="image" accept="image/*" id="product-image">

                            <label for="product-image" class="file-label">
                                <div class="upload-icon">
                                    ↑
                                </div>

                                <div>

                                    <strong>
                                        Choose Product Image
                                    </strong>

                                    <small>
                                        JPG, JPEG, PNG or WEBP
                                    </small>

                                </div>

                            </label>

                        </div>

                    </div>


                    {{-- Description --}}

                    <div class="form-group full-width">

                        <label>
                            Description
                        </label>

                        <textarea name="description" rows="6"
                            placeholder="Enter product description...">{{ old('description') }}</textarea>

                    </div>

                </div>


                {{-- =========================
                FORM ACTIONS
                ========================== --}}

                <div class="form-actions">

                    <a href="{{ route('admin.products.index') }}" class="cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="save-btn">
                        <span>✓</span>
                        Save Product
                    </button>

                </div>

            </form>

        </div>

    </div>


    <style>
        /* ========================================
               PAGE
            ======================================== */

        .create-product-page {
            width: 100%;
        }


        /* ========================================
               HEADER
            ======================================== */

        .create-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 25px;

            padding: 24px 28px;

            background:
                linear-gradient(135deg,
                    #111827,
                    #1e3a8a);

            border-radius: 14px;

            color: white;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.14);
        }


        .page-label {
            display: inline-block;

            padding: 5px 9px;

            margin-bottom: 8px;

            border-radius: 5px;

            background: rgba(255, 255, 255, 0.12);

            color: #bfdbfe;

            font-size: 9px;

            font-weight: 700;

            letter-spacing: 1.4px;
        }


        .create-header h1 {
            margin: 0 0 5px;

            color: white;

            font-size: 28px;

            font-weight: 700;
        }


        .create-header p {
            margin: 0;

            color: #cbd5e1;

            font-size: 12px;
        }


        /* ========================================
               BACK BUTTON
            ======================================== */

        .back-btn {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 11px 15px;

            background: rgba(255, 255, 255, 0.12);

            border: 1px solid rgba(255, 255, 255, 0.15);

            border-radius: 7px;

            color: white;

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;

            white-space: nowrap;

            transition: 0.25s ease;
        }


        .back-btn:hover {
            background: white;

            color: #1e3a8a;
        }


        /* ========================================
               ERROR BOX
            ======================================== */

        .error-box {
            display: flex;

            gap: 12px;

            margin-bottom: 20px;

            padding: 14px 16px;

            background: #fef2f2;

            border: 1px solid #fecaca;

            border-radius: 9px;

            color: #991b1b;

            font-size: 12px;
        }


        .error-icon {
            width: 27px;

            height: 27px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #dc2626;

            color: white;

            font-size: 13px;

            font-weight: 700;
        }


        .error-box strong {
            display: block;

            margin-bottom: 5px;
        }


        .error-box ul {
            margin: 0;

            padding-left: 17px;
        }


        .error-box li {
            margin-bottom: 2px;
        }


        /* ========================================
               FORM CARD
            ======================================== */

        .form-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 12px;

            box-shadow:
                0 3px 12px rgba(15, 23, 42, 0.05);

            overflow: hidden;
        }


        /* ========================================
               FORM HEADER
            ======================================== */

        .form-card-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 20px 24px;

            border-bottom: 1px solid #e2e8f0;
        }


        .form-label {
            display: block;

            margin-bottom: 4px;

            color: #64748b;

            font-size: 9px;

            font-weight: 700;

            letter-spacing: 1.5px;
        }


        .form-card-header h2 {
            margin: 0;

            color: #0f172a;

            font-size: 18px;
        }


        .form-status {
            padding: 5px 9px;

            border-radius: 5px;

            background: #dcfce7;

            color: #15803d;

            font-size: 9px;

            font-weight: 700;

            letter-spacing: 0.7px;
        }


        /* ========================================
               FORM
            ======================================== */

        .form-card form {
            padding: 25px;
        }


        .form-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 20px;
        }


        /* ========================================
               FORM GROUP
            ======================================== */

        .form-group {
            display: flex;

            flex-direction: column;
        }


        .form-group label {
            margin-bottom: 7px;

            color: #334155;

            font-size: 12px;

            font-weight: 700;
        }


        .form-group label span {
            color: #ef4444;
        }


        /* ========================================
               INPUTS
            ======================================== */

        .form-group input,
        .form-group select,
        .form-group textarea {

            width: 100%;

            padding: 11px 12px;

            border: 1px solid #cbd5e1;

            border-radius: 7px;

            background: white;

            color: #1e293b;

            font-family: Arial, Helvetica, sans-serif;

            font-size: 12px;

            outline: none;

            transition: 0.2s ease;
        }


        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #94a3b8;
        }


        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.10);
        }


        .form-group textarea {
            resize: vertical;

            min-height: 130px;
        }


        .full-width {
            grid-column: 1 / -1;
        }


        /* ========================================
               FIELD ERROR
            ======================================== */

        .field-error {
            margin-top: 5px;

            color: #dc2626;

            font-size: 10px;
        }


        /* ========================================
               IMAGE UPLOAD
            ======================================== */

        .file-box {
            position: relative;

            width: 100%;
        }


        .file-box input[type="file"] {
            position: absolute;

            width: 1px;

            height: 1px;

            opacity: 0;
        }


        .file-label {
            display: flex !important;

            align-items: center;

            gap: 12px;

            width: 100%;

            min-height: 67px;

            padding: 10px 12px;

            margin: 0 !important;

            border: 1px dashed #94a3b8;

            border-radius: 7px;

            background: #f8fafc;

            cursor: pointer;

            transition: 0.25s ease;
        }


        .file-label:hover {
            border-color: #2563eb;

            background: #eff6ff;
        }


        .upload-icon {
            width: 38px;

            height: 38px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 8px;

            background: #dbeafe;

            color: #2563eb;

            font-size: 18px;

            font-weight: 700;
        }


        .file-label strong {
            display: block;

            margin-bottom: 3px;

            color: #334155;

            font-size: 11px;
        }


        .file-label small {
            display: block;

            color: #94a3b8;

            font-size: 9px;
        }


        /* ========================================
               ACTIONS
            ======================================== */

        .form-actions {
            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 10px;

            margin-top: 25px;

            padding-top: 20px;

            border-top: 1px solid #e2e8f0;
        }


        .cancel-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 10px 17px;

            border: 1px solid #cbd5e1;

            border-radius: 7px;

            background: white;

            color: #475569;

            text-decoration: none;

            font-size: 12px;

            font-weight: 600;

            transition: 0.2s ease;
        }


        .cancel-btn:hover {
            background: #f8fafc;

            color: #0f172a;
        }


        .save-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            padding: 10px 17px;

            border: none;

            border-radius: 7px;

            background: #2563eb;

            color: white;

            font-size: 12px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.25s ease;
        }


        .save-btn:hover {
            background: #1d4ed8;

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px rgba(37, 99, 235, 0.25);
        }


        .save-btn span {
            font-size: 13px;
        }


        /* ========================================
               RESPONSIVE
            ======================================== */

        @media (max-width: 768px) {

            .create-header {
                flex-direction: column;

                align-items: flex-start;

                padding: 20px;

                gap: 18px;
            }


            .create-header h1 {
                font-size: 24px;
            }


            .create-header p {
                font-size: 11px;
            }


            .back-btn {
                width: 100%;

                justify-content: center;
            }


            .form-card-header {
                padding: 17px;
            }


            .form-card form {
                padding: 18px;
            }


            .form-grid {
                grid-template-columns: 1fr;

                gap: 17px;
            }


            .full-width {
                grid-column: auto;
            }


            .form-actions {
                flex-direction: column-reverse;

                align-items: stretch;
            }


            .cancel-btn,
            .save-btn {
                width: 100%;
            }

        }


        @media (max-width: 480px) {

            .create-header {
                padding: 17px;

                border-radius: 10px;
            }


            .create-header h1 {
                font-size: 22px;
            }


            .form-card {
                border-radius: 9px;
            }


            .form-card-header {
                padding: 15px;
            }


            .form-card form {
                padding: 15px;
            }


            .form-group input,
            .form-group select,
            .form-group textarea {
                padding: 10px;
            }

        }
    </style>

@endsection