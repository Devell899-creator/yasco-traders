@extends('frontend.layouts.app')

@section('title', 'Shop | YASCO Traders')

@section('content')

<style>

    .shop-banner {
        width: 100%;
        background: transparent;
        padding: 0;
        margin: 0;
        overflow: hidden;
    }

    .shop-banner img {
        width: 100%;
        height: auto;
        display: block;
    }

    .categories {
        max-width: 1200px;
        margin: 60px auto;
        padding: 20px;
    }

    .categories h2 {
        text-align: center;
        font-size: 34px;
        margin-bottom: 40px;
        color: #222;
    }

    .category-box {
        display: flex;
        justify-content: space-between;
        gap: 25px;
        flex-wrap: wrap;
    }

    .category-card {
        width: 260px;
        background: #fff;
        border-radius: 10px;
        text-align: center;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,.08);
        transition: .3s;
    }

    .category-card:hover {
        transform: translateY(-8px);
    }

    .category-card img {
        width: 170px;
        height: 170px;
        object-fit: contain;
    }

    .category-card h3 {
        margin-top: 15px;
        color: #222;
    }

    .featured-products {
        max-width: 1200px;
        margin: 60px auto;
        padding: 20px;
    }

    .featured-products h2 {
        text-align: center;
        font-size: 34px;
        margin-bottom: 40px;
        color: #222;
    }

    .featured-grid {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 25px;
    }

    .featured-card {
        width: 260px;
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,.08);
        transition: .3s;
    }

    .featured-card:hover {
        transform: translateY(-8px);
    }

    .featured-card img {
        width: 170px;
        height: 170px;
        object-fit: contain;
    }

    .featured-card h3 {
        margin: 15px 0 10px;
        font-size: 22px;
        color: #222;
    }

    .featured-card p {
        color: #e63946;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .featured-card button {
        background: #e63946;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        transition: .3s;
    }

    .featured-card button:hover {
        background: #c82333;
    }

    .featured-card a {
        text-decoration: none;
    }

    @media(max-width:768px) {

        .featured-grid {
            justify-content: center;
        }

        .featured-card {
            width: 100%;
            max-width: 320px;
        }

        .category-box {
            justify-content: center;
        }

        .category-card {
            width: 100%;
            max-width: 320px;
        }

    }

</style>


{{-- Shop Banner --}}
<section class="shop-banner">

    <img
        src="{{ asset('Images/products/baner.png') }}"
        alt="YASCO Traders Shop"
    >

</section>


{{-- Categories --}}
<section class="categories">

    <h2>Shop By Category</h2>

    <div class="category-box">

        <div class="category-card">

            <img
                src="{{ asset('Images/products/Image.jpeg') }}"
                alt="Earphones"
            >

            <h3>Earphones</h3>

        </div>


        <div class="category-card">

            <img
                src="{{ asset('Images/products/Image 6.jpeg') }}"
                alt="Chargers"
            >

            <h3>Chargers</h3>

        </div>


        <div class="category-card">

            <img
                src="{{ asset('Images/products/Image 1.jpeg') }}"
                alt="Data Cables"
            >

            <h3>Data Cables</h3>

        </div>


        <div class="category-card">

            <img
                src="{{ asset('Images/products/Image 5.jpeg') }}"
                alt="Mobile Glass"
            >

            <h3>Mobile Glass</h3>

        </div>

    </div>

</section>


{{-- Featured Products --}}
<section class="featured-products">

    <h2>Featured Products</h2>

    <div class="featured-grid">


        <div class="featured-card">

            <img
                src="{{ asset('Images/products/Image.jpeg') }}"
                alt="Earphones"
            >

            <h3>Premium Earphones</h3>

            <p>Rs. 200</p>

            <a href="#">
                <button type="button">
                    View Details
                </button>
            </a>

        </div>


        <div class="featured-card">

            <img
                src="{{ asset('Images/products/Image 6.jpeg') }}"
                alt="Charger"
            >

            <h3>Fast Charger</h3>

            <p>Rs. 500</p>

            <a href="#">
                <button type="button">
                    View Details
                </button>
            </a>

        </div>


        <div class="featured-card">

            <img
                src="{{ asset('Images/products/Image 3.jpeg') }}"
                alt="Buds"
            >

            <h3>Wireless Buds</h3>

            <p>Rs. 1000</p>

            <a href="#">
                <button type="button">
                    View Details
                </button>
            </a>

        </div>


        <div class="featured-card">

            <img
                src="{{ asset('Images/products/Image 5.jpeg') }}"
                alt="Glass"
            >

            <h3>Mobile Glass</h3>

            <p>Rs. 200</p>

            <a href="#">
                <button type="button">
                    View Details
                </button>
            </a>

        </div>


    </div>

</section>

@endsection