@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('content')

    <div class="category-show-page">

        {{-- Page Header --}}
        <div class="page-header">

            <div>
                <span class="page-label">STORE MANAGEMENT</span>

                <h1>Category Details</h1>

                <p>
                    View complete information about this category.
                </p>
            </div>

            <div class="header-actions">

                <a href="{{ route('admin.categories.edit', $category->id) }}" class="edit-btn">
                    Edit Category
                </a>

                <a href="{{ route('admin.categories.index') }}" class="back-btn">
                    ← Back to Categories
                </a>

            </div>

        </div>


        {{-- Main Details Card --}}
        <div class="details-card">

            {{-- Category Overview --}}
            <div class="category-overview">

                <div class="category-image-wrapper">

                    @if($category->image)

                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="category-image">

                    @else

                        <div class="no-image">
                            <span>C</span>
                            <small>No Image</small>
                        </div>

                    @endif

                </div>


                <div class="category-main-info">

                    <div class="category-top">

                        <span class="category-id">
                            ID #{{ $category->id }}
                        </span>

                        @if($category->status)

                            <span class="status-active">
                                Active
                            </span>

                        @else

                            <span class="status-inactive">
                                Inactive
                            </span>

                        @endif

                    </div>


                    <h2>
                        {{ $category->name }}
                    </h2>


                    <p>
                        {{ $category->description ?? 'No description available for this category.' }}
                    </p>

                </div>

            </div>


            {{-- Information --}}
            <div class="information-section">

                <div class="section-title">

                    <span>01</span>

                    Category Information

                </div>


                <div class="info-grid">

                    {{-- Category ID --}}
                    <div class="info-item">

                        <span class="info-label">
                            Category ID
                        </span>

                        <strong>
                            #{{ $category->id }}
                        </strong>

                    </div>


                    {{-- Category Name --}}
                    <div class="info-item">

                        <span class="info-label">
                            Category Name
                        </span>

                        <strong>
                            {{ $category->name }}
                        </strong>

                    </div>


                    {{-- Status --}}
                    <div class="info-item">

                        <span class="info-label">
                            Status
                        </span>

                        <div>

                            @if($category->status)

                                <span class="status-active">
                                    Active
                                </span>

                            @else

                                <span class="status-inactive">
                                    Inactive
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- Sort Order --}}
                    <div class="info-item">

                        <span class="info-label">
                            Sort Order
                        </span>

                        <strong class="sort-badge">
                            {{ $category->sort_order }}
                        </strong>

                    </div>

                </div>

            </div>


            {{-- Description --}}
            <div class="information-section">

                <div class="section-title">

                    <span>02</span>

                    Description

                </div>


                <div class="description-box">

                    @if($category->description)

                        {{ $category->description }}

                    @else

                        <span class="muted-text">
                            No description has been added for this category.
                        </span>

                    @endif

                </div>

            </div>


            {{-- Dates --}}
            <div class="information-section">

                <div class="section-title">

                    <span>03</span>

                    Record Information

                </div>


                <div class="info-grid">

                    {{-- Created --}}
                    <div class="info-item">

                        <span class="info-label">
                            Created At
                        </span>

                        <strong>
                            {{ $category->created_at->format('d M Y, h:i A') }}
                        </strong>

                    </div>


                    {{-- Updated --}}
                    <div class="info-item">

                        <span class="info-label">
                            Last Updated
                        </span>

                        <strong>
                            {{ $category->updated_at->format('d M Y, h:i A') }}
                        </strong>

                    </div>

                </div>

            </div>


            {{-- Actions --}}
            <div class="details-actions">

                <a href="{{ route('admin.categories.index') }}" class="cancel-btn">
                    Back to Categories
                </a>


                <div class="right-actions">

                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="edit-btn">
                        Edit Category
                    </a>


                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this category?');">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete-btn">
                            Delete Category
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <style>
        .category-show-page {
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


        /* Header Actions */

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }


        .back-btn,
        .edit-btn {
            padding: 11px 17px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
            white-space: nowrap;
        }


        .back-btn {
            background: #0f172a;
            color: white;
        }

        .back-btn:hover {
            background: #1e293b;
            color: white;
        }


        .edit-btn {
            background: #2563eb;
            color: white;
        }

        .edit-btn:hover {
            background: #1d4ed8;
            color: white;
        }


        /* Main Card */

        .details-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }


        /* Category Overview */

        .category-overview {
            display: flex;
            align-items: center;
            gap: 25px;
            padding: 28px;
            border-bottom: 1px solid #e2e8f0;
        }


        .category-image-wrapper {
            flex-shrink: 0;
        }


        .category-image {
            width: 150px;
            height: 150px;
            object-fit: contain;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            padding: 8px;
            box-sizing: border-box;
        }


        /* No Image */

        .no-image {
            width: 150px;
            height: 150px;
            border-radius: 12px;
            border: 1px dashed #cbd5e1;
            background: #f8fafc;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            color: #94a3b8;
        }


        .no-image span {
            width: 50px;
            height: 50px;
            border-radius: 10px;

            background: #e2e8f0;
            color: #64748b;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
            font-weight: 800;

            margin-bottom: 8px;
        }


        .no-image small {
            font-size: 11px;
        }


        /* Main Category Info */

        .category-main-info {
            flex: 1;
            min-width: 0;
        }


        .category-top {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }


        .category-id {
            background: #f1f5f9;
            color: #64748b;
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
        }


        .category-main-info h2 {
            margin: 0;
            color: #0f172a;
            font-size: 26px;
            font-weight: 700;
        }


        .category-main-info p {
            margin: 10px 0 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
            max-width: 650px;
        }


        /* Status */

        .status-active,
        .status-inactive {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }


        .status-active {
            background: #dcfce7;
            color: #15803d;
        }


        .status-inactive {
            background: #fee2e2;
            color: #b91c1c;
        }


        /* Information Section */

        .information-section {
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


        /* Info Grid */

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }


        .info-item {
            padding: 16px;

            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 9px;

            display: flex;
            flex-direction: column;
            gap: 7px;
        }


        .info-label {
            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }


        .info-item strong {
            color: #334155;
            font-size: 14px;
            font-weight: 600;
        }


        .sort-badge {
            display: inline-flex;
            width: fit-content;

            background: #e0e7ff;
            color: #4338ca;

            padding: 5px 9px;
            border-radius: 6px;

            font-size: 12px !important;
        }


        /* Description */

        .description-box {
            padding: 18px;

            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 9px;

            color: #475569;
            font-size: 14px;
            line-height: 1.8;

            white-space: pre-line;
        }


        .muted-text {
            color: #94a3b8;
            font-style: italic;
        }


        /* Bottom Actions */

        .details-actions {
            padding: 20px 25px;

            background: #f8fafc;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }


        .right-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }


        .cancel-btn,
        .delete-btn {
            padding: 11px 17px;
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


        .delete-btn {
            background: #dc2626;
            color: white;
        }


        .delete-btn:hover {
            background: #b91c1c;
        }


        .right-actions form {
            margin: 0;
        }


        /* Mobile */

        @media (max-width: 768px) {

            .category-show-page {
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
                align-items: stretch;
            }


            .back-btn,
            .header-actions .edit-btn {
                width: 100%;
                text-align: center;
                box-sizing: border-box;
            }


            .category-overview {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }


            .category-image,
            .no-image {
                width: 130px;
                height: 130px;
            }


            .category-main-info h2 {
                font-size: 22px;
            }


            .information-section {
                padding: 18px;
            }


            .info-grid {
                grid-template-columns: 1fr;
            }


            .details-actions {
                padding: 18px;
                flex-direction: column;
                align-items: stretch;
            }


            .right-actions {
                flex-direction: column;
                width: 100%;
            }


            .cancel-btn,
            .right-actions .edit-btn,
            .delete-btn {
                width: 100%;
                text-align: center;
                box-sizing: border-box;
            }

        }
    </style>

@endsection