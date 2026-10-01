@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')

    {{-- Page Header --}}
    <div class="page-header">

        <h1>Categories</h1>

        <a href="{{ route('admin.categories.create') }}" class="add-btn">
            Add Category
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif


    {{-- Categories Table --}}
    <div class="table-card">

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Sort Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($categories as $category)

                        <tr>

                            <td>
                                {{ $category->id }}
                            </td>

                            <td>

                                @if($category->image)

                                    <div class="category-image">
                                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                                    </div>

                                @else

                                    <span class="no-image">
                                        No Image
                                    </span>

                                @endif

                            </td>

                            <td>
                                <strong>{{ $category->name }}</strong>
                            </td>

                            <td>
                                {{ $category->description ?? 'N/A' }}
                            </td>

                            <td>

                                @if($category->status)

                                    <span class="status-active">
                                        Active
                                    </span>

                                @else

                                    <span class="status-inactive">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $category->sort_order }}
                            </td>

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

                            <td colspan="7" class="empty-row">
                                No categories found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    <div class="pagination">
        {{ $categories->links() }}
    </div>


    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
        }

        .add-btn {
            background: #007bff;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .add-btn:hover {
            background: #0056b3;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .table-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

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

        .category-image {
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #eee;
            border-radius: 6px;
            background: white;
        }

        .category-image img {
            max-width: 50px;
            max-height: 50px;
            object-fit: contain;
        }

        .no-image {
            color: #888;
            font-size: 13px;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .action-buttons form {
            margin: 0;
        }

        .empty-row {
            text-align: center;
            padding: 30px !important;
            color: #777;
        }

        .pagination {
            margin-top: 20px;
        }

        @media (max-width: 768px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .action-buttons {
                flex-wrap: wrap;
            }

        }
    </style>

@endsection