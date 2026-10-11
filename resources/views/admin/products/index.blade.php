@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')

    <div class="products-page">

        {{-- =========================
        PAGE HEADER
        ========================== --}}

        <div class="products-header">

            <div>
                <div class="page-label">
                    STORE MANAGEMENT
                </div>

                <h1>Products</h1>

                <p>
                    Manage your store products, stock and pricing.
                </p>
            </div>

            <a href="{{ route('admin.products.create') }}" class="add-product-btn">
                <span>+</span>
                Add Product
            </a>

        </div>


        {{-- =========================
        SUCCESS MESSAGE
        ========================== --}}

        @if(session('success'))

            <div class="success-message">

                <div class="success-icon">
                    ✓
                </div>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- =========================
        PRODUCT TABLE
        ========================== --}}

        <div class="products-card">

            <div class="table-top">

                <div>
                    <span class="table-label">
                        INVENTORY
                    </span>

                    <h2>
                        All Products
                    </h2>
                </div>

                <div class="product-count">
                    {{ $products->total() }} Products
                </div>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>PRODUCT</th>

                            <th>SKU</th>

                            <th>CATEGORY</th>

                            <th>PRICE</th>

                            <th>STOCK</th>

                            <th>IMAGE</th>

                            <th>ACTIONS</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($products as $product)

                            <tr>

                                {{-- ID --}}

                                <td>

                                    <span class="product-id">
                                        #{{ $product->id }}
                                    </span>

                                </td>


                                {{-- Product --}}

                                <td>

                                    <div class="product-name">

                                        <strong>
                                            {{ $product->name }}
                                        </strong>

                                        @if($product->brand)

                                            <small>
                                                {{ $product->brand }}
                                            </small>

                                        @endif

                                    </div>

                                </td>


                                {{-- SKU --}}

                                <td>

                                    <span class="sku">
                                        {{ $product->sku }}
                                    </span>

                                </td>


                                {{-- Category --}}

                                <td>

                                    <span class="category-badge">
                                        {{ $product->category->name ?? 'No Category' }}
                                    </span>

                                </td>


                                {{-- Price --}}

                                <td>

                                    <strong class="price">

                                        {{ $product->currency }}
                                        {{ number_format($product->price, 2) }}

                                    </strong>

                                </td>


                                {{-- Stock --}}

                                <td>

                                    @if($product->stock > 0)

                                        <div class="stock-wrapper">

                                            <span class="stock-dot available"></span>

                                            <span class="stock-available">
                                                {{ $product->stock }} in stock
                                            </span>

                                        </div>

                                    @else

                                        <div class="stock-wrapper">

                                            <span class="stock-dot out"></span>

                                            <span class="stock-out">
                                                Out of Stock
                                            </span>

                                        </div>

                                    @endif

                                </td>


                                {{-- Image --}}

                                <td>

                                    @if($product->image)

                                        <div class="product-image">

                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

                                        </div>

                                    @else

                                        <div class="no-image">
                                            N/A
                                        </div>

                                    @endif

                                </td>


                                {{-- Actions --}}

                                <td>

                                    <div class="action-buttons">

                                        {{-- View --}}

                                        <a href="{{ route('admin.products.show', $product->id) }}" class="action-btn view-btn">
                                            View
                                        </a>


                                        {{-- Edit --}}

                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="action-btn edit-btn">
                                            Edit
                                        </a>


                                        {{-- Delete --}}

                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="action-btn delete-btn"
                                                onclick="return confirm('Are you sure you want to delete this product?')">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="8" class="empty-row">

                                    <div class="empty-icon">
                                        P
                                    </div>

                                    <strong>
                                        No Products Found
                                    </strong>

                                    <span>
                                        Start by adding your first product.
                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}

            @if($products->hasPages())

                <div class="pagination-wrapper">

                    {{ $products->links() }}

                </div>

            @endif

        </div>

    </div>


    <style>
        /* ========================================
               PRODUCTS PAGE
            ======================================== */

        .products-page {
            width: 100%;
        }


        /* ========================================
               HEADER
            ======================================== */

        .products-header {
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


        .products-header h1 {
            margin: 0 0 5px;

            color: white;

            font-size: 28px;

            font-weight: 700;
        }


        .products-header p {
            margin: 0;

            color: #cbd5e1;

            font-size: 12px;
        }


        /* ========================================
               ADD PRODUCT BUTTON
            ======================================== */

        .add-product-btn {
            display: flex;

            align-items: center;

            gap: 8px;

            padding: 12px 18px;

            background: white;

            color: #1e3a8a;

            border-radius: 8px;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            white-space: nowrap;

            transition: 0.3s ease;
        }


        .add-product-btn span {
            font-size: 20px;

            line-height: 1;
        }


        .add-product-btn:hover {
            background: #eff6ff;

            color: #1d4ed8;

            transform: translateY(-2px);
        }


        /* ========================================
               SUCCESS MESSAGE
            ======================================== */

        .success-message {
            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 20px;

            padding: 12px 15px;

            background: #ecfdf5;

            border: 1px solid #bbf7d0;

            border-radius: 8px;

            color: #166534;

            font-size: 13px;
        }


        .success-icon {
            width: 25px;

            height: 25px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #16a34a;

            color: white;

            font-size: 13px;

            font-weight: 700;
        }


        /* ========================================
               TABLE CARD
            ======================================== */

        .products-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 12px;

            overflow: hidden;

            box-shadow:
                0 3px 12px rgba(15, 23, 42, 0.05);
        }


        /* ========================================
               TABLE TOP
            ======================================== */

        .table-top {
            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 20px 22px;

            border-bottom: 1px solid #e2e8f0;
        }


        .table-label {
            display: block;

            margin-bottom: 4px;

            color: #64748b;

            font-size: 9px;

            font-weight: 700;

            letter-spacing: 1.5px;
        }


        .table-top h2 {
            margin: 0;

            color: #0f172a;

            font-size: 18px;

            font-weight: 700;
        }


        .product-count {
            padding: 6px 10px;

            border-radius: 6px;

            background: #eff6ff;

            color: #2563eb;

            font-size: 11px;

            font-weight: 700;
        }


        /* ========================================
               TABLE WRAPPER
            ======================================== */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }


        /* ========================================
               TABLE
            ======================================== */

        .table-wrapper table {
            width: 100%;

            min-width: 1050px;

            border-collapse: collapse;
        }


        .table-wrapper th {
            padding: 13px 15px;

            background: #f8fafc;

            border-bottom: 1px solid #e2e8f0;

            color: #64748b;

            text-align: left;

            font-size: 9px;

            font-weight: 700;

            letter-spacing: 0.8px;

            white-space: nowrap;
        }


        .table-wrapper td {
            padding: 14px 15px;

            border-bottom: 1px solid #f1f5f9;

            vertical-align: middle;

            color: #475569;

            font-size: 12px;
        }


        .table-wrapper tbody tr {
            transition: 0.2s ease;
        }


        .table-wrapper tbody tr:hover {
            background: #f8fafc;
        }


        .table-wrapper tbody tr:last-child td {
            border-bottom: none;
        }


        /* ========================================
               PRODUCT ID
            ======================================== */

        .product-id {
            color: #64748b;

            font-size: 11px;

            font-weight: 600;
        }


        /* ========================================
               PRODUCT NAME
            ======================================== */

        .product-name strong {
            display: block;

            color: #0f172a;

            font-size: 13px;

            margin-bottom: 3px;
        }


        .product-name small {
            color: #94a3b8;

            font-size: 10px;
        }


        /* ========================================
               SKU
            ======================================== */

        .sku {
            color: #64748b;

            font-family: monospace;

            font-size: 11px;
        }


        /* ========================================
               CATEGORY
            ======================================== */

        .category-badge {
            display: inline-block;

            padding: 5px 8px;

            border-radius: 5px;

            background: #f1f5f9;

            color: #475569;

            font-size: 10px;

            font-weight: 600;
        }


        /* ========================================
               PRICE
            ======================================== */

        .price {
            color: #0f172a;

            font-size: 12px;

            white-space: nowrap;
        }


        /* ========================================
               STOCK
            ======================================== */

        .stock-wrapper {
            display: flex;

            align-items: center;

            gap: 7px;

            white-space: nowrap;
        }


        .stock-dot {
            width: 7px;

            height: 7px;

            border-radius: 50%;

            flex-shrink: 0;
        }


        .stock-dot.available {
            background: #22c55e;

            box-shadow:
                0 0 0 3px #dcfce7;
        }


        .stock-dot.out {
            background: #ef4444;

            box-shadow:
                0 0 0 3px #fee2e2;
        }


        .stock-available {
            color: #15803d;

            font-size: 11px;

            font-weight: 600;
        }


        .stock-out {
            color: #dc2626;

            font-size: 11px;

            font-weight: 600;
        }


        /* ========================================
               PRODUCT IMAGE
            ======================================== */

        .product-image {
            width: 55px;

            height: 55px;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            border-radius: 8px;
        }


        .product-image img {
            width: 100%;

            height: 100%;

            object-fit: contain;

            padding: 5px;
        }


        .no-image {
            width: 55px;

            height: 55px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            border-radius: 8px;

            color: #94a3b8;

            font-size: 10px;
        }


        /* ========================================
               ACTIONS
            ======================================== */

        .action-buttons {
            display: flex;

            align-items: center;

            gap: 5px;

            white-space: nowrap;
        }


        .action-buttons form {
            margin: 0;
        }


        .action-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 7px 9px;

            border: none;

            border-radius: 5px;

            text-decoration: none;

            font-size: 10px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.2s ease;
        }


        /* View */

        .view-btn {
            background: #eff6ff;

            color: #2563eb;
        }


        .view-btn:hover {
            background: #2563eb;

            color: white;
        }


        /* Edit */

        .edit-btn {
            background: #fffbeb;

            color: #d97706;
        }


        .edit-btn:hover {
            background: #d97706;

            color: white;
        }


        /* Delete */

        .delete-btn {
            background: #fef2f2;

            color: #dc2626;
        }


        .delete-btn:hover {
            background: #dc2626;

            color: white;
        }


        /* ========================================
               EMPTY
            ======================================== */

        .empty-row {
            text-align: center;

            padding: 60px 20px !important;
        }


        .empty-icon {
            width: 45px;

            height: 45px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 10px;

            border-radius: 10px;

            background: #eff6ff;

            color: #2563eb;

            font-size: 13px;

            font-weight: 700;
        }


        .empty-row strong {
            display: block;

            color: #334155;

            font-size: 14px;

            margin-bottom: 4px;
        }


        .empty-row span {
            color: #94a3b8;

            font-size: 11px;
        }


        /* ========================================
               PAGINATION
            ======================================== */

        .pagination-wrapper {
            padding: 18px 22px;

            border-top: 1px solid #e2e8f0;
        }


        /* ========================================
               RESPONSIVE
            ======================================== */

        @media (max-width: 768px) {

            .products-header {
                flex-direction: column;

                align-items: flex-start;

                padding: 20px;

                gap: 18px;
            }


            .products-header h1 {
                font-size: 24px;
            }


            .products-header p {
                font-size: 11px;
            }


            .add-product-btn {
                width: 100%;

                justify-content: center;
            }


            .table-top {
                padding: 17px;
            }


            .products-card {
                border-radius: 9px;
            }


            .table-wrapper {
                overflow-x: auto;

                -webkit-overflow-scrolling: touch;
            }


            .table-wrapper table {
                min-width: 1050px;
            }


            .pagination-wrapper {
                padding: 15px;
            }

        }


        @media (max-width: 480px) {

            .products-header {
                padding: 18px;

                border-radius: 10px;
            }


            .products-header h1 {
                font-size: 22px;
            }


            .table-top {
                padding: 15px;
            }


            .table-top h2 {
                font-size: 16px;
            }


            .product-count {
                font-size: 9px;

                padding: 5px 7px;
            }

        }
    </style>

@endsection