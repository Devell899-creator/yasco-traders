@extends('frontend.layouts.app')

@section('title', 'All Products | YASCO Traders')

@section('content')

<style>

    .search-section {
        width: 100%;
        padding: 40px 60px;
        text-align: center;
    }

    .search-section h1 {
        color: #222;
        margin-bottom: 25px;
    }

    .filter-box {
        display: flex;
        gap: 20px;
        justify-content: center;
    }

    .filter-box input,
    .filter-box select {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 15px;
    }

    .products-grid {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
    }

    .product-card {
        width: 220px;
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .product-card img {
        width: 150px;
        height: 150px;
        object-fit: contain;
    }

    .product-card h3 {
        margin: 10px 0;
        color: #222;
    }

    .product-card p {
        color: #555;
        margin: 7px 0;
    }

    .product-card .price {
        color: #e63946;
        font-weight: bold;
    }

    .product-card button {
        margin-top: 10px;
        padding: 10px 20px;
        background: #e63946;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: .3s;
    }

    .product-card button:hover {
        background: #c62839;
    }

    .product-card a {
        text-decoration: none;
    }

    @media (max-width: 992px) {

        .search-section {
            padding: 30px 20px;
        }

        .products-grid {
            justify-content: center;
            gap: 20px;
        }

        .product-card {
            width: 45%;
        }

    }

    @media (max-width: 768px) {

        .search-section {
            padding: 25px 15px;
        }

        .search-section h1 {
            font-size: 28px;
        }

        .filter-box {
            flex-direction: column;
            align-items: center;
        }

        .filter-box input,
        .filter-box select {
            width: 100%;
            max-width: 350px;
            padding: 12px;
            font-size: 16px;
        }

        .products-grid {
            justify-content: center;
            padding: 15px;
        }

        .product-card {
            width: 90%;
            max-width: 320px;
        }

        .product-card img {
            width: 180px;
            height: 180px;
        }

        .product-card h3 {
            font-size: 20px;
        }

        .product-card button {
            width: 100%;
            padding: 12px;
        }

    }

    @media (max-width: 480px) {

        .search-section h1 {
            font-size: 24px;
        }

        .product-card {
            width: 100%;
        }

        .product-card img {
            width: 160px;
            height: 160px;
        }

    }

</style>


{{-- Search Section --}}
<section class="search-section">

    <h1>Our Products</h1>

    <div class="filter-box">

        <input
            type="text"
            placeholder="Search Products"
        >

        <select>

            <option>All Categories</option>
            <option>Earphones</option>
            <option>Chargers</option>
            <option>Data Cables</option>
            <option>Accessories</option>

        </select>

    </div>

</section>


{{-- Products --}}
{{-- Products --}}
<section class="products-grid">

    @forelse($products as $product)

        <div class="product-card">

            {{-- Product Image --}}
            @if($product->image)

                <img
                    src="{{ asset($product->image) }}"
                    alt="{{ $product->name }}"
                >

            @endif


            {{-- Product Name --}}
            <h3>
                {{ $product->name }}
            </h3>


            {{-- Category --}}
            <p>
                {{ $product->category->name ?? 'No Category' }}
            </p>


            {{-- Price --}}
            <p class="price">

                {{ $product->currency ?? 'Rs' }}:
                {{ number_format($product->price, 0) }}

            </p>


            {{-- Detail --}}
            <a href="{{ route('frontend.product-detail', $product->id) }}">

                <button type="button">
                    View Details
                </button>

            </a>

        </div>

    @empty

        <p>
            No products found.
        </p>

    @endforelse

</section>

@endsection