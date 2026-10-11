@extends('admin.layouts.app')

@section('title', 'Product Details')

@section('content')

<div class="product-show-page">

    {{-- Page Header --}}
    <div class="page-header">

        <div>
            <span class="page-label">PRODUCT MANAGEMENT</span>

            <h1>Product Details</h1>

            <p>View complete information about this product.</p>
        </div>

        <div class="header-actions">

            <a
                href="{{ route('admin.products.edit', $product->id) }}"
                class="edit-btn"
            >
                Edit Product
            </a>

            <a
                href="{{ route('admin.products.index') }}"
                class="back-btn"
            >
                ← Back to Products
            </a>

        </div>

    </div>


    {{-- Main Product Card --}}
    <div class="product-card">

        {{-- Product Image --}}
        <div class="image-section">

            <div class="image-container">

                @if($product->image)

                    <img
                        src="{{ asset($product->image) }}"
                        alt="{{ $product->name }}"
                    >

                @else

                    <div class="no-image">
                        <span>📷</span>
                        <p>No Image Available</p>
                    </div>

                @endif

            </div>

            @if($product->is_featured)

                <div class="featured-badge">
                    ★ Featured Product
                </div>

            @endif

        </div>


        {{-- Product Information --}}
        <div class="product-info">

            <div class="product-title-area">

                <div>

                    <span class="category-label">
                        {{ $product->category->name ?? 'No Category' }}
                    </span>

                    <h2>{{ $product->name }}</h2>

                    <p class="sku">
                        SKU: {{ $product->sku }}
                    </p>

                </div>

            </div>


            {{-- Price --}}
            <div class="price-box">

                <span class="price-label">Selling Price</span>

                <strong>
                    {{ $product->currency ?? 'Rs' }}
                    {{ number_format($product->price, 2) }}
                </strong>

            </div>


            {{-- Information Grid --}}
            <div class="info-grid">

                <div class="info-item">

                    <span class="info-label">Brand</span>

                    <strong>
                        {{ $product->brand ?? 'N/A' }}
                    </strong>

                </div>


                <div class="info-item">

                    <span class="info-label">Stock</span>

                    <strong
                        class="{{ $product->stock > 0 ? 'stock-available' : 'stock-empty' }}"
                    >
                        {{ $product->stock }}
                        {{ $product->stock == 1 ? 'Item' : 'Items' }}
                    </strong>

                </div>


                <div class="info-item">

                    <span class="info-label">Rating</span>

                    <strong class="rating">
                        ★ {{ $product->rating ?? '0.0' }} / 5
                    </strong>

                </div>


                <div class="info-item">

                    <span class="info-label">Reviews</span>

                    <strong>
                        {{ $product->reviews ?? 0 }}
                        {{ ($product->reviews ?? 0) == 1 ? 'Review' : 'Reviews' }}
                    </strong>

                </div>


                <div class="info-item">

                    <span class="info-label">Featured</span>

                    @if($product->is_featured)

                        <span class="status featured">
                            Yes
                        </span>

                    @else

                        <span class="status normal">
                            No
                        </span>

                    @endif

                </div>


                <div class="info-item">

                    <span class="info-label">Product ID</span>

                    <strong>
                        #{{ $product->id }}
                    </strong>

                </div>

            </div>

        </div>

    </div>


    {{-- Description --}}
    <div class="description-card">

        <div class="card-heading">

            <div class="heading-icon">
                D
            </div>

            <div>
                <h3>Product Description</h3>
                <p>Detailed information about this product.</p>
            </div>

        </div>


        <div class="description-content">

            @if($product->description)

                <p>
                    {{ $product->description }}
                </p>

            @else

                <p class="empty-description">
                    No description available for this product.
                </p>

            @endif

        </div>

    </div>


    {{-- Bottom Actions --}}
    <div class="bottom-actions">

        <a
            href="{{ route('admin.products.index') }}"
            class="secondary-btn"
        >
            ← Back to Products
        </a>

        <a
            href="{{ route('admin.products.edit', $product->id) }}"
            class="primary-btn"
        >
            Edit Product
        </a>

    </div>

</div>


<style>

    .product-show-page {
        max-width: 1150px;
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


    /* Header Actions */

    .header-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .edit-btn,
    .back-btn {
        text-decoration: none;
        padding: 11px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
        white-space: nowrap;
    }

    .edit-btn {
        background: #2563eb;
        color: white;
    }

    .edit-btn:hover {
        background: #1d4ed8;
        color: white;
    }

    .back-btn {
        background: #0f172a;
        color: white;
    }

    .back-btn:hover {
        background: #1e293b;
        color: white;
    }


    /* Main Product Card */

    .product-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
        padding: 30px;
        display: grid;
        grid-template-columns: 400px 1fr;
        gap: 40px;
    }


    /* Image */

    .image-section {
        position: relative;
    }

    .image-container {
        width: 100%;
        height: 400px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .image-container img {
        max-width: 90%;
        max-height: 360px;
        object-fit: contain;
        transition: 0.3s;
    }

    .image-container img:hover {
        transform: scale(1.03);
    }


    .no-image {
        text-align: center;
        color: #94a3b8;
    }

    .no-image span {
        display: block;
        font-size: 42px;
        margin-bottom: 8px;
    }

    .no-image p {
        margin: 0;
        font-size: 13px;
    }


    /* Featured Badge */

    .featured-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #f59e0b;
        color: white;
        padding: 7px 11px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 700;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
    }


    /* Product Info */

    .product-info {
        padding-top: 5px;
    }

    .category-label {
        display: inline-block;
        background: #eff6ff;
        color: #2563eb;
        padding: 5px 9px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .product-title-area h2 {
        margin: 0;
        color: #0f172a;
        font-size: 29px;
        line-height: 1.25;
    }

    .sku {
        margin: 8px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }


    /* Price */

    .price-box {
        margin-top: 25px;
        padding: 18px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
    }

    .price-label {
        display: block;
        color: #64748b;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 5px;
    }

    .price-box strong {
        color: #2563eb;
        font-size: 26px;
    }


    /* Info Grid */

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0;
        margin-top: 22px;
        border-top: 1px solid #e2e8f0;
        border-left: 1px solid #e2e8f0;
    }

    .info-item {
        min-height: 72px;
        padding: 13px 15px;
        border-right: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .info-label {
        color: #94a3b8;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-item strong {
        color: #334155;
        font-size: 14px;
    }


    /* Status */

    .stock-available {
        color: #16a34a !important;
    }

    .stock-empty {
        color: #dc2626 !important;
    }

    .rating {
        color: #d97706 !important;
    }


    .status {
        width: fit-content;
        padding: 4px 9px;
        border-radius: 5px;
        font-size: 11px;
        font-weight: 700;
    }

    .status.featured {
        background: #dcfce7;
        color: #15803d;
    }

    .status.normal {
        background: #f1f5f9;
        color: #64748b;
    }


    /* Description */

    .description-card {
        margin-top: 22px;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: 0 5px 20px rgba(15, 23, 42, 0.05);
        overflow: hidden;
    }

    .card-heading {
        padding: 20px 23px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .heading-icon {
        width: 35px;
        height: 35px;
        background: #eff6ff;
        color: #2563eb;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 800;
    }

    .card-heading h3 {
        margin: 0;
        color: #0f172a;
        font-size: 16px;
    }

    .card-heading p {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .description-content {
        padding: 22px 23px;
    }

    .description-content p {
        margin: 0;
        color: #475569;
        font-size: 14px;
        line-height: 1.8;
    }

    .empty-description {
        color: #94a3b8 !important;
        font-style: italic;
    }


    /* Bottom Actions */

    .bottom-actions {
        margin-top: 22px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .primary-btn,
    .secondary-btn {
        padding: 11px 17px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
    }

    .primary-btn {
        background: #2563eb;
        color: white;
    }

    .primary-btn:hover {
        background: #1d4ed8;
        color: white;
    }

    .secondary-btn {
        background: #e2e8f0;
        color: #334155;
    }

    .secondary-btn:hover {
        background: #cbd5e1;
        color: #0f172a;
    }


    /* Mobile */

    @media (max-width: 900px) {

        .product-card {
            grid-template-columns: 1fr;
        }

        .image-container {
            height: 350px;
        }

    }


    @media (max-width: 768px) {

        .product-show-page {
            width: 100%;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header h1 {
            font-size: 25px;
        }

        .header-actions {
            width: 100%;
            flex-direction: column;
        }

        .edit-btn,
        .back-btn {
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }

        .product-card {
            padding: 18px;
            gap: 25px;
        }

        .image-container {
            height: 280px;
        }

        .image-container img {
            max-height: 250px;
        }

        .product-title-area h2 {
            font-size: 23px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .bottom-actions {
            flex-direction: column-reverse;
        }

        .primary-btn,
        .secondary-btn {
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }

    }

</style>

@endsection