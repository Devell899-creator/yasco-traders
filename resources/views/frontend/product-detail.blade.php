@extends('frontend.layouts.app')

@section('title', $product->name . ' | YASCO Traders')

@section('content')

    <style>
        .product-detail {
            max-width: 1100px;
            margin: 60px auto;
            padding: 20px;

            display: flex;
            gap: 60px;
            align-items: center;
        }


        .detail-image {
            width: 50%;
            text-align: center;
        }


        .detail-image img {
            width: 400px;
            height: 400px;
            max-width: 100%;
            object-fit: contain;
        }


        .detail-info {
            width: 50%;
        }


        .detail-info h1 {
            color: #222;
            font-size: 36px;
            margin-bottom: 20px;
        }


        .detail-info p {
            color: #555;
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 12px;
        }


        .detail-price {
            color: #e63946 !important;
            font-size: 28px !important;
            font-weight: bold;
        }


        .detail-category {
            font-weight: bold;
        }


        .add-cart-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;

            background: #e63946;
            color: white;

            text-decoration: none;
            border-radius: 6px;

            border: none;
            cursor: pointer;
        }


        .back-btn {
            display: inline-block;
            margin-top: 20px;
            margin-left: 10px;

            padding: 12px 25px;

            background: #222;
            color: white;

            text-decoration: none;
            border-radius: 6px;
        }


        @media(max-width: 768px) {

            .product-detail {
                flex-direction: column;
                gap: 30px;
            }


            .detail-image,
            .detail-info {
                width: 100%;
            }


            .detail-image img {
                width: 300px;
                height: 300px;
            }


            .detail-info h1 {
                font-size: 28px;
            }

        }
    </style>


    <div class="product-detail">

        {{-- Product Image --}}
        <div class="detail-image">

            @if($product->image)

                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

            @else

                <p>No Image Available</p>

            @endif

        </div>


        {{-- Product Information --}}
        <div class="detail-info">

            <h1>
                {{ $product->name }}
            </h1>


            <p class="detail-category">

                Category:

                {{ $product->category->name ?? 'No Category' }}

            </p>


            <p>

                Brand:

                {{ $product->brand ?? 'N/A' }}

            </p>


            <p class="detail-price">

                {{ $product->currency ?? 'Rs' }}

                {{ number_format($product->price, 2) }}

            </p>


            <p>

                Stock:

                {{ $product->stock }}

            </p>


            <p>

                {{ $product->description ?? 'No description available.' }}

            </p>


            <form action="{{ route('frontend.cart.add') }}" method="POST">
                @csrf

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <button type="submit" class="add-cart-btn">
                    Add to Cart
                </button>
            </form>

        </div>

    </div>

@endsection