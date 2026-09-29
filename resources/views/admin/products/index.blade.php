@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')

    {{-- Page Header --}}
    <div class="page-header">

        <h1>Products</h1>

        <a href="{{ route('admin.products.create') }}" class="add-btn">
            Add Product
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="success-message">
            {{ session('success') }}
        </div>

    @endif


    {{-- Products Table --}}
    <div class="table-card">

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>
                                {{ $product->id }}
                            </td>

                            <td>
                                <strong>{{ $product->name }}</strong>
                            </td>

                            <td>
                                {{ $product->sku }}
                            </td>

                            <td>
                                {{ $product->category }}
                            </td>

                            <td>
                                {{ $product->currency }}
                                {{ $product->price }}
                            </td>

                            <td>

                                @if($product->stock > 0)

                                    <span class="stock-available">
                                        {{ $product->stock }}
                                    </span>

                                @else

                                    <span class="stock-out">
                                        Out of Stock
                                    </span>

                                @endif

                            </td>


                            {{-- Image --}}
                            <td>

                                @if($product->image)

                                    <div class="product-image">

                                        <img src="{{ asset($product->image) }}"
                                             alt="{{ $product->name }}">

                                    </div>

                                @else

                                    <span class="no-image">
                                        No Image
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td>

                                <div class="action-buttons">

                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                       class="btn-view">
                                        View
                                    </a>

                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-delete"
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
                                No products found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    <div class="pagination">
        {{ $products->links() }}
    </div>


    <style>

        /* Page Header */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
        }


        /* Add Button */

        .add-btn {
            background: #007bff;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s ease;
        }

        .add-btn:hover {
            background: #0056b3;
        }


        /* Success Message */

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }


        /* Table Card */

        .table-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }


        /* Table Wrapper */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }


        /* Table */

        .table-wrapper table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        .table-wrapper th {
            background: #343a40;
            color: white;
            padding: 13px 12px;
            text-align: left;
            font-size: 14px;
        }

        .table-wrapper td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            font-size: 14px;
        }

        .table-wrapper tbody tr:hover {
            background: #f8f9fa;
        }


        /* Product Image */

        .product-image {
            width: 70px;
            height: 70px;

            display: flex;
            justify-content: center;
            align-items: center;

            border: 1px solid #eee;
            border-radius: 6px;
            background: #fff;
        }

        .product-image img {
            max-width: 60px;
            max-height: 60px;
            object-fit: contain;
        }

        .no-image {
            color: #888;
            font-size: 13px;
        }


        /* Stock */

        .stock-available {
            background: #d4edda;
            color: #155724;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .stock-out {
            background: #f8d7da;
            color: #721c24;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }


        /* Action Buttons */

        .action-buttons {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .action-buttons form {
            margin: 0;
        }

        .action-buttons a,
        .action-buttons button {
            border: none;
            padding: 7px 11px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s ease;
        }


        /* View */

        .btn-view {
            background: #e8f3ff;
            color: #1677d2;
        }

        .btn-view:hover {
            background: #1677d2;
            color: white;
        }


        /* Edit */

        .btn-edit {
            background: #fff4df;
            color: #d98b00;
        }

        .btn-edit:hover {
            background: #d98b00;
            color: white;
        }


        /* Delete */

        .btn-delete {
            background: #ffe8e8;
            color: #dc3545;
        }

        .btn-delete:hover {
            background: #dc3545;
            color: white;
        }


        /* Empty */

        .empty-row {
            text-align: center;
            padding: 30px !important;
            color: #777;
        }


        /* Pagination */

        .pagination {
            margin-top: 20px;
        }


        /* Mobile */

        @media (max-width: 768px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .table-card {
                border-radius: 6px;
            }

            .action-buttons {
                flex-wrap: wrap;
            }

        }

    </style>

@endsection