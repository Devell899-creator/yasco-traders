@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')

<div class="edit-product-page">

    {{-- Page Header --}}
    <div class="page-header">

        <div>
            <span class="page-label">PRODUCT MANAGEMENT</span>

            <h1>Edit Product</h1>

            <p>
                Update product information, pricing, stock and image.
            </p>
        </div>

        <a href="{{ route('admin.products.index') }}" class="back-btn">
            ← Back to Products
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

        <div class="form-card-header">

            <div>
                <h2>Product Information</h2>
                <p>Edit the details of this product.</p>
            </div>

            <span class="product-id">
                ID #{{ $product->id }}
            </span>

        </div>


        <form
            action="{{ route('admin.products.update', $product->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            <div class="form-section">

                <div class="section-title">
                    <span>01</span>
                    Product Details
                </div>


                <div class="form-grid">

                    {{-- Product Name --}}
                    <div class="form-group">

                        <label>
                            Product Name <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $product->name) }}"
                            placeholder="Enter product name"
                        >

                        @error('name')
                            <small class="field-error">{{ $message }}</small>
                        @enderror

                    </div>


                    {{-- SKU --}}
                    <div class="form-group">

                        <label>
                            SKU <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="sku"
                            value="{{ old('sku', $product->sku) }}"
                            placeholder="e.g. YAS-001"
                        >

                        @error('sku')
                            <small class="field-error">{{ $message }}</small>
                        @enderror

                    </div>


                    {{-- Category --}}
                    <div class="form-group">

                        <label>
                            Category <span>*</span>
                        </label>

                        <select name="category_id" required>

                            <option value="">Select Category</option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('category_id')
                            <small class="field-error">{{ $message }}</small>
                        @enderror

                    </div>


                    {{-- Brand --}}
                    <div class="form-group">

                        <label>Brand</label>

                        <input
                            type="text"
                            name="brand"
                            value="{{ old('brand', $product->brand) }}"
                            placeholder="Enter brand name"
                        >

                    </div>

                </div>

            </div>


            {{-- Pricing & Stock --}}
            <div class="form-section">

                <div class="section-title">
                    <span>02</span>
                    Pricing & Stock
                </div>


                <div class="form-grid">

                    {{-- Price --}}
                    <div class="form-group">

                        <label>
                            Price <span>*</span>
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            name="price"
                            value="{{ old('price', $product->price) }}"
                            placeholder="0.00"
                        >

                        @error('price')
                            <small class="field-error">{{ $message }}</small>
                        @enderror

                    </div>


                    {{-- Currency --}}
                    <div class="form-group">

                        <label>Currency</label>

                        <input
                            type="text"
                            name="currency"
                            value="{{ old('currency', $product->currency) }}"
                            placeholder="PKR"
                        >

                    </div>


                    {{-- Stock --}}
                    <div class="form-group">

                        <label>
                            Stock <span>*</span>
                        </label>

                        <input
                            type="number"
                            name="stock"
                            min="0"
                            value="{{ old('stock', $product->stock) }}"
                            placeholder="Enter stock quantity"
                        >

                        @error('stock')
                            <small class="field-error">{{ $message }}</small>
                        @enderror

                    </div>


                    {{-- Rating --}}
                    <div class="form-group">

                        <label>Rating</label>

                        <input
                            type="number"
                            step="0.1"
                            min="0"
                            max="5"
                            name="rating"
                            value="{{ old('rating', $product->rating) }}"
                            placeholder="0.0 - 5.0"
                        >

                    </div>


                    {{-- Reviews --}}
                    <div class="form-group">

                        <label>Reviews</label>

                        <input
                            type="number"
                            min="0"
                            name="reviews"
                            value="{{ old('reviews', $product->reviews) }}"
                            placeholder="Number of reviews"
                        >

                    </div>


                    {{-- Featured --}}
                    <div class="form-group">

                        <label>Featured Product</label>

                        <select name="is_featured">

                            <option
                                value="0"
                                {{ old('is_featured', $product->is_featured) == 0 ? 'selected' : '' }}
                            >
                                No
                            </option>

                            <option
                                value="1"
                                {{ old('is_featured', $product->is_featured) == 1 ? 'selected' : '' }}
                            >
                                Yes
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            {{-- Description --}}
            <div class="form-section">

                <div class="section-title">
                    <span>03</span>
                    Description
                </div>

                <div class="form-group">

                    <label>Description</label>

                    <textarea
                        name="description"
                        rows="6"
                        placeholder="Enter product description"
                    >{{ old('description', $product->description) }}</textarea>

                </div>

            </div>


            {{-- Images --}}
            <div class="form-section">

                <div class="section-title">
                    <span>04</span>
                    Product Image
                </div>


                <div class="image-grid">

                    {{-- Current Image --}}
                    <div class="image-box">

                        <label>Current Image</label>

                        <div class="current-image">

                            @if($product->image)

                                <img
                                    src="{{ asset($product->image) }}"
                                    alt="{{ $product->name }}"
                                >

                            @else

                                <div class="no-image">
                                    No Image
                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- New Image --}}
                    <div class="image-box">

                        <label>Change Image</label>

                        <div class="upload-box">

                            <input
                                type="file"
                                name="image"
                                accept="image/*"
                                id="product-image"
                            >

                            <label for="product-image" class="upload-label">

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

                        <p class="image-note">
                            Leave empty if you want to keep the current image.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Actions --}}
            <div class="form-actions">

                <a
                    href="{{ route('admin.products.index') }}"
                    class="cancel-btn"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="update-btn"
                >
                    Update Product
                </button>

            </div>

        </form>

    </div>

</div>


<style>

    .edit-product-page {
        max-width: 1100px;
        margin: 0 auto;
    }


    /* Header */

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
        text-decoration: none;
        padding: 11px 17px;
        border-radius: 8px;
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
        border-radius: 10px;
        margin-bottom: 20px;
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
        gap: 15px;
    }

    .form-card-header h2 {
        margin: 0;
        font-size: 18px;
        color: #0f172a;
    }

    .form-card-header p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .product-id {
        background: #eff6ff;
        color: #2563eb;
        padding: 7px 11px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
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


    /* Form Grid */

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

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
    .form-group select,
    .form-group textarea {
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
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 130px;
    }


    .field-error {
        color: #dc2626;
        margin-top: 6px;
        font-size: 12px;
    }


    /* Images */

    .image-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    .image-box {
        display: flex;
        flex-direction: column;
    }

    .image-box > label {
        color: #334155;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 8px;
    }


    .current-image {
        height: 210px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .current-image img {
        max-width: 90%;
        max-height: 190px;
        object-fit: contain;
    }

    .no-image {
        color: #94a3b8;
        font-size: 13px;
    }


    /* Upload */

    .upload-box {
        height: 210px;
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
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-align: center;
    }

    .upload-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #dbeafe;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .upload-label strong {
        color: #334155;
        font-size: 14px;
    }

    .upload-label small {
        margin-top: 5px;
        color: #94a3b8;
        font-size: 12px;
    }

    .image-note {
        margin: 7px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }


    /* Actions */

    .form-actions {
        padding: 20px 25px;
        background: #f8fafc;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .update-btn,
    .cancel-btn {
        border: none;
        padding: 11px 19px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: 0.2s;
    }

    .update-btn {
        background: #2563eb;
        color: white;
    }

    .update-btn:hover {
        background: #1d4ed8;
    }

    .cancel-btn {
        background: #e2e8f0;
        color: #334155;
    }

    .cancel-btn:hover {
        background: #cbd5e1;
        color: #0f172a;
    }


    /* Mobile */

    @media (max-width: 768px) {

        .edit-product-page {
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
            align-items: flex-start;
            flex-direction: column;
            padding: 18px;
        }

        .form-section {
            padding: 18px;
        }

        .form-grid,
        .image-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            padding: 18px;
            flex-direction: column-reverse;
        }

        .update-btn,
        .cancel-btn {
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }

    }

</style>

@endsection