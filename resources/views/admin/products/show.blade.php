@extends('admin.layouts.app')

@section('title', 'Product Details')

@section('content')

    <div class="product-header">

        <h1>Product Details</h1>

    </div>


    <div class="product-details">

        {{-- Product Image --}}
        <div class="product-image">

            @if($product->image)

                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

            @else

                <p>No Image</p>

            @endif

        </div>


        {{-- Product Information --}}
        <div class="product-info">

            <h2>{{ $product->name }}</h2>

            <div class="info-row">
                <strong>SKU:</strong>
                <span>{{ $product->sku }}</span>
            </div>

            <div class="info-row">
                <strong>Category:</strong>
                <span>{{ $product->category->name ?? 'No Category' }}</span>
            </div>

            <div class="info-row">
                <strong>Brand:</strong>
                <span>{{ $product->brand ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <strong>Price:</strong>
                <span>Rs. {{ $product->price }}</span>
            </div>

            <div class="info-row">
                <strong>Currency:</strong>
                <span>{{ $product->currency }}</span>
            </div>

            <div class="info-row">
                <strong>Stock:</strong>
                <span>{{ $product->stock }}</span>
            </div>

            <div class="info-row">
                <strong>Rating:</strong>
                <span>⭐ {{ $product->rating ?? 'N/A' }} / 5</span>
            </div>

            <div class="info-row">
                <strong>Reviews:</strong>
                <span>{{ $product->reviews ?? 0 }} Reviews</span>
            </div>

            <div class="info-row">
                <strong>Featured:</strong>

                <span>
                    @if($product->is_featured)
                        Yes
                    @else
                        No
                    @endif
                </span>
            </div>

            <div class="description">

                <strong>Description:</strong>

                <p>
                    {{ $product->description ?? 'No description available.' }}
                </p>

            </div>

        </div>

    </div>


    <style>
        .product-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .product-header h1 {
            margin: 0;
        }

        .back-btn {
            background: #343a40;
            color: white;
            padding: 9px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .back-btn:hover {
            background: #212529;
        }

        .product-details {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);

            display: flex;
            gap: 40px;
        }

        .product-image {
            width: 350px;
            min-height: 350px;

            display: flex;
            justify-content: center;
            align-items: center;

            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .product-image img {
            max-width: 90%;
            max-height: 320px;
            object-fit: contain;
        }

        .product-info {
            flex: 1;
        }

        .product-info h2 {
            margin-bottom: 25px;
            font-size: 28px;
        }

        .info-row {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .info-row strong {
            width: 120px;
        }

        .description {
            margin-top: 20px;
        }

        .description p {
            margin-top: 8px;
            line-height: 1.6;
            color: #555;
        }


        @media (max-width: 768px) {

            .product-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .product-details {
                flex-direction: column;
                padding: 20px;
            }

            .product-image {
                width: 100%;
                min-height: 250px;
            }

            .product-image img {
                max-height: 230px;
            }

            .product-info h2 {
                font-size: 22px;
            }

        }
    </style>

@endsection