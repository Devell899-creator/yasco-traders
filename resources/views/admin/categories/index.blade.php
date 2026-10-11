@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')

    <div class="categories-page">

        {{-- Page Header --}}
        <div class="page-header">

            <div>
                <span class="page-label">STORE MANAGEMENT</span>

                <h1>Categories</h1>

                <p>
                    Manage your store categories and organize products.
                </p>
            </div>

            <a href="{{ route('admin.categories.create') }}" class="add-btn">
                + Add Category
            </a>

        </div>


        {{-- Success Message --}}
        @if(session('success'))

            <div class="success-message">
                <span class="success-icon">✓</span>
                {{ session('success') }}
            </div>

        @endif


        {{-- Categories Card --}}
        <div class="table-card">

            {{-- Card Header --}}
            <div class="table-card-header">

                <div>
                    <h2>Category List</h2>
                    <p>All categories available in your store.</p>
                </div>

                <div class="category-count">
                    {{ $categories->total() }} Categories
                </div>

            </div>


            {{-- Table --}}
            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>CATEGORY</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <th>SORT ORDER</th>
                            <th>ACTIONS</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($categories as $category)

                            <tr>

                                {{-- ID --}}
                                <td>
                                    <span class="category-id">
                                        #{{ $category->id }}
                                    </span>
                                </td>


                                {{-- Category --}}
                                <td>

                                    <div class="category-info">

                                        <div class="category-image">

                                            @if($category->image)

                                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">

                                            @else

                                                <span class="image-placeholder">
                                                    C
                                                </span>

                                            @endif

                                        </div>

                                        <div>

                                            <strong>
                                                {{ $category->name }}
                                            </strong>

                                            <small>
                                                Category
                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- Description --}}
                                <td>

                                    <div class="description-cell">

                                        @if($category->description)

                                            {{ \Illuminate\Support\Str::limit($category->description, 60) }}

                                        @else

                                            <span class="not-available">
                                                No description
                                            </span>

                                        @endif

                                    </div>

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($category->status)

                                        <span class="status active">
                                            <span></span>
                                            Active
                                        </span>

                                    @else

                                        <span class="status inactive">
                                            <span></span>
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                {{-- Sort Order --}}
                                <td>

                                    <span class="sort-order">
                                        {{ $category->sort_order }}
                                    </span>

                                </td>


                                {{-- Actions --}}
                                <td>

                                    <div class="action-buttons">

                                        {{-- View --}}
                                        <a href="{{ route('admin.categories.show', $category->id) }}" class="btn-view">
                                            View
                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn-edit">
                                            Edit
                                        </a>


                                        {{-- Delete --}}
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this category?')">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="6" class="empty-row">

                                    <div class="empty-state">

                                        <div class="empty-icon">
                                            C
                                        </div>

                                        <h3>No Categories Found</h3>

                                        <p>
                                            You haven't added any categories yet.
                                        </p>

                                        <a href="{{ route('admin.categories.create') }}" class="empty-add-btn">
                                            + Add Category
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Pagination --}}
        @if($categories->hasPages())

            <div class="pagination-wrapper">
                {{ $categories->links() }}
            </div>

        @endif


    </div>


    <style>
        .categories-page {
            max-width: 1200px;
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


        /* Add Button */

        .add-btn {
            background: #2563eb;
            color: white;
            padding: 11px 17px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
            white-space: nowrap;
        }

        .add-btn:hover {
            background: #1d4ed8;
            color: white;
        }


        /* Success */

        .success-message {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 500;
        }

        .success-icon {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #22c55e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }


        /* Table Card */

        .table-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }


        /* Card Header */

        .table-card-header {
            padding: 21px 23px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .table-card-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 17px;
        }

        .table-card-header p {
            margin: 5px 0 0;
            color: #94a3b8;
            font-size: 12px;
        }

        .category-count {
            background: #eff6ff;
            color: #2563eb;
            padding: 7px 11px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }


        /* Table */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .table-wrapper table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        .table-wrapper th {
            background: #f8fafc;
            color: #64748b;
            padding: 13px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.6px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-wrapper td {
            padding: 14px 16px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            color: #475569;
            font-size: 13px;
        }

        .table-wrapper tbody tr {
            transition: 0.15s;
        }

        .table-wrapper tbody tr:hover {
            background: #f8fafc;
        }

        .table-wrapper tbody tr:last-child td {
            border-bottom: none;
        }


        /* Category ID */

        .category-id {
            color: #64748b;
            font-size: 12px;
            font-weight: 600;
        }


        /* Category Info */

        .category-info {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 180px;
        }

        .category-image {
            width: 52px;
            height: 52px;
            flex-shrink: 0;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-placeholder {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
        }

        .category-info strong {
            display: block;
            color: #1e293b;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .category-info small {
            color: #94a3b8;
            font-size: 11px;
        }


        /* Description */

        .description-cell {
            max-width: 270px;
            color: #64748b;
            line-height: 1.5;
        }

        .not-available {
            color: #94a3b8;
            font-style: italic;
        }


        /* Status */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .status span {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .status.active {
            background: #dcfce7;
            color: #15803d;
        }

        .status.active span {
            background: #22c55e;
        }

        .status.inactive {
            background: #fee2e2;
            color: #b91c1c;
        }

        .status.inactive span {
            background: #ef4444;
        }


        /* Sort Order */

        .sort-order {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 30px;
            height: 28px;
            padding: 0 7px;
            background: #f1f5f9;
            color: #475569;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
        }


        /* Actions */

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-buttons form {
            margin: 0;
        }

        .btn-view,
        .btn-edit,
        .btn-delete {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            white-space: nowrap;
        }

        .btn-view {
            background: #eff6ff;
            color: #2563eb;
        }

        .btn-view:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-edit {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-edit:hover {
            background: #e2e8f0;
            color: #1e293b;
        }

        .btn-delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #fee2e2;
        }


        /* Empty State */

        .empty-row {
            padding: 0 !important;
        }

        .empty-state {
            padding: 55px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 52px;
            height: 52px;
            margin: 0 auto 14px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 800;
        }

        .empty-state h3 {
            margin: 0 0 7px;
            color: #334155;
            font-size: 16px;
        }

        .empty-state p {
            margin: 0 0 17px;
            color: #94a3b8;
            font-size: 13px;
        }

        .empty-add-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 9px 14px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .empty-add-btn:hover {
            background: #1d4ed8;
            color: white;
        }


        /* Pagination */

        .pagination-wrapper {
            margin-top: 20px;
        }


        /* Mobile */

        @media (max-width: 768px) {

            .categories-page {
                width: 100%;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .add-btn {
                width: 100%;
                text-align: center;
                box-sizing: border-box;
            }

            .table-card-header {
                align-items: flex-start;
                flex-direction: column;
                padding: 18px;
            }

            .table-wrapper th,
            .table-wrapper td {
                padding: 12px;
            }

            .action-buttons {
                flex-wrap: wrap;
            }

        }
    </style>

@endsection