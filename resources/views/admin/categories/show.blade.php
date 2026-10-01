@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('content')

    <div class="page-header">

        <h1>Category Details</h1>

    </div>


    <div class="details-card">

        {{-- ID --}}
        <div class="detail-row">

            <span class="detail-label">
                ID
            </span>

            <span>
                {{ $category->id }}
            </span>

        </div>


        {{-- Name --}}
        <div class="detail-row">

            <span class="detail-label">
                Name
            </span>

            <span>
                {{ $category->name }}
            </span>

        </div>


        {{-- Description --}}
        <div class="detail-row">

            <span class="detail-label">
                Description
            </span>

            <span>
                {{ $category->description ?? 'N/A' }}
            </span>

        </div>


        {{-- Image --}}
        <div class="detail-row">

            <span class="detail-label">
                Image
            </span>

            <span>

                @if($category->image)

                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="category-image">

                @else

                    No Image

                @endif

            </span>

        </div>


        {{-- Status --}}
        <div class="detail-row">

            <span class="detail-label">
                Status
            </span>

            <span>

                @if($category->status)

                    <span class="status-active">
                        Active
                    </span>

                @else

                    <span class="status-inactive">
                        Inactive
                    </span>

                @endif

            </span>

        </div>


        {{-- Sort Order --}}
        <div class="detail-row">

            <span class="detail-label">
                Sort Order
            </span>

            <span>
                {{ $category->sort_order }}
            </span>

        </div>


        {{-- Created At --}}
        <div class="detail-row">

            <span class="detail-label">
                Created At
            </span>

            <span>
                {{ $category->created_at->format('d M Y, h:i A') }}
            </span>

        </div>


        {{-- Updated At --}}
        <div class="detail-row">

            <span class="detail-label">
                Updated At
            </span>

            <span>
                {{ $category->updated_at->format('d M Y, h:i A') }}
            </span>

        </div>


        {{-- Actions --}}
        <div class="actions">

            {{-- Back --}}
            <a href="{{ route('admin.categories.index') }}" class="cancel-btn">
                Back to Categories
            </a>

        </div>

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


        .details-card {
            background: white;
            max-width: 800px;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }


        .detail-row {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 20px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }


        .detail-label {
            font-weight: 600;
        }


        .category-image {
            width: 120px;
            height: 120px;
            object-fit: contain;
            border: 1px solid #eee;
            border-radius: 6px;
            padding: 5px;
        }


        .status-active,
        .status-inactive {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }


        .status-active {
            background: #d4edda;
            color: #155724;
        }


        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }


        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            align-items: center;
        }


        .edit-btn,
        .delete-btn,
        .cancel-btn {
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }


        .edit-btn {
            background: #007bff;
            color: white;
        }


        .edit-btn:hover {
            background: #0056b3;
        }


        .delete-btn {
            background: #dc3545;
            color: white;
        }


        .delete-btn:hover {
            background: #c82333;
        }


        .cancel-btn {
            background: #6c757d;
            color: white;
        }


        .cancel-btn:hover {
            background: #5a6268;
        }


        .actions form {
            margin: 0;
        }


        @media (max-width: 768px) {

            .detail-row {
                grid-template-columns: 1fr;
                gap: 5px;
            }


            .actions {
                flex-direction: column;
                align-items: stretch;
            }


            .edit-btn,
            .delete-btn,
            .cancel-btn {
                text-align: center;
                width: 100%;
            }

        }
    </style>

@endsection