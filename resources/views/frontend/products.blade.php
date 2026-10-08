@extends('frontend.layouts.app')

@section('title', 'All Products | YASCO Traders')

@section('content')

<style>

/* =========================
   PRODUCTS PAGE
========================= */

.products-page {
    background: #ffffff;
    min-height: 100vh;
}


/* =========================
   PAGE HERO
========================= */

.products-hero {
    background: #222;
    color: #ffffff;
    text-align: center;
    padding: 75px 20px;
}

.products-hero span {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 12px;
}

.products-hero h1 {
    font-size: 46px;
    margin-bottom: 15px;
}

.products-hero p {
    max-width: 600px;
    margin: auto;
    color: #cccccc;
    font-size: 16px;
    line-height: 1.7;
}


/* =========================
   FILTER SECTION
========================= */

.filter-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px 20px;
}

.filter-heading {
    text-align: center;
    margin-bottom: 25px;
}

.filter-heading h2 {
    font-size: 25px;
    color: #222;
    margin-bottom: 7px;
}

.filter-heading p {
    color: #777;
    font-size: 14px;
}


/* Filter box */

.filter-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    max-width: 750px;
    margin: auto;
}


/* Input */

.filter-box input,
.filter-box select {
    height: 48px;
    border: 1px solid #dddddd;
    border-radius: 6px;
    background: #ffffff;
    color: #222;
    font-size: 14px;
    padding: 0 15px;
    outline: none;
    transition: 0.3s;
}


.filter-box input {
    flex: 1;
    min-width: 280px;
}


.filter-box select {
    width: 210px;
    cursor: pointer;
}


.filter-box input:focus,
.filter-box select:focus {
    border-color: #222;
}


/* =========================
   PRODUCTS SECTION
========================= */

.products-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 45px 20px 80px;
}


/* Product grid */

.products-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}


/* =========================
   PRODUCT CARD
========================= */

.product-card {
    background: #ffffff;

    border: 1px solid #eeeeee;

    border-radius: 10px;

    overflow: hidden;

    transition: 0.3s;
}


.product-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 12px 30px rgba(0, 0, 0, 0.10);
}


/* =========================
   PRODUCT IMAGE
========================= */

.product-image {
    width: 100%;
    height: 240px;

    background: #f7f7f7;

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;
}


.product-image img {
    width: 100%;
    height: 100%;

    object-fit: contain;

    padding: 20px;

    transition: 0.4s;
}


.product-card:hover .product-image img {
    transform: scale(1.06);
}


.no-image {
    color: #999;
    font-size: 14px;
}


/* =========================
   PRODUCT INFO
========================= */

.product-info {
    padding: 20px;
}


.product-quality {
    display: block;

    color: #777;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: 1.5px;

    margin-bottom: 8px;
}


.product-info h3 {
    color: #222;

    font-size: 18px;

    margin-bottom: 8px;

    line-height: 1.4;
}


.product-category {
    color: #777;

    font-size: 13px;

    margin-bottom: 18px;
}


/* =========================
   PRICE + BUTTON
========================= */

.product-bottom {
    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 10px;
}


.product-price {
    color: #222;

    font-size: 16px;

    font-weight: 700;
}


.view-product {
    display: inline-block;

    background: #222;

    color: #ffffff;

    text-decoration: none;

    padding: 8px 13px;

    border-radius: 5px;

    font-size: 12px;

    font-weight: 600;

    transition: 0.3s;
}


.view-product:hover {
    background: #444;

    transform: translateY(-1px);
}


/* =========================
   EMPTY PRODUCTS
========================= */

.no-products {
    grid-column: 1 / -1;

    text-align: center;

    padding: 70px 20px;

    color: #777;
}


.no-products h3 {
    color: #222;

    margin-bottom: 8px;
}


/* =========================
   TABLET
========================= */

@media (max-width: 1000px) {

    .products-grid {
        grid-template-columns: repeat(3, 1fr);
    }

}


/* =========================
   MOBILE
========================= */

@media (max-width: 700px) {

    .products-hero {
        padding: 55px 20px;
    }


    .products-hero h1 {
        font-size: 36px;
    }


    .products-hero p {
        font-size: 14px;
    }


    .filter-section {
        padding: 40px 20px 10px;
    }


    .filter-box {
        flex-direction: column;
        width: 100%;
    }


    .filter-box input,
    .filter-box select {
        width: 100%;
        min-width: 0;
    }


    .products-section {
        padding: 35px 15px 60px;
    }


    .products-grid {
        grid-template-columns: repeat(2, 1fr);

        gap: 14px;
    }


    .product-image {
        height: 180px;
    }


    .product-image img {
        padding: 12px;
    }


    .product-info {
        padding: 14px;
    }


    .product-info h3 {
        font-size: 16px;
    }


    .product-bottom {
        display: block;
    }


    .product-price {
        display: block;

        margin-bottom: 10px;
    }


    .view-product {
        display: block;

        width: 100%;

        text-align: center;
    }

}


/* =========================
   SMALL MOBILE
========================= */

@media (max-width: 430px) {

    .products-hero h1 {
        font-size: 30px;
    }


    .products-grid {
        grid-template-columns: 1fr;
    }


    .product-image {
        height: 220px;
    }


    .product-info h3 {
        font-size: 18px;
    }

}

</style>


<div class="products-page">


    {{-- =========================
         HERO
    ========================= --}}

    <section class="products-hero">

        <span>
            YASCO TRADERS
        </span>

        <h1>
            Our Products
        </h1>

        <p>
            Explore our collection of quality mobile accessories
            at affordable prices.
        </p>

    </section>



    {{-- =========================
         FILTER
    ========================= --}}

    <section class="filter-section">

        <div class="filter-heading">

            <h2>
                Find Your Product
            </h2>

            <p>
                Search through our product collection.
            </p>

        </div>


        <div class="filter-box">

            <input
                type="text"
                placeholder="Search Products"
            >


            <select>

                <option>
                    All Categories
                </option>

                <option>
                    Earphones
                </option>

                <option>
                    Chargers
                </option>

                <option>
                    Data Cables
                </option>

                <option>
                    Accessories
                </option>

            </select>

        </div>

    </section>



    {{-- =========================
         PRODUCTS
    ========================= --}}

    <section class="products-section">

        <div class="products-grid">


            @forelse($products as $product)


                <div class="product-card">


                    {{-- Product Image --}}

                    <div class="product-image">

                        @if($product->image)

                            <img
                                src="{{ asset($product->image) }}"
                                alt="{{ $product->name }}"
                            >

                        @else

                            <div class="no-image">
                                No Image
                            </div>

                        @endif

                    </div>



                    {{-- Product Information --}}

                    <div class="product-info">


                        <span class="product-quality">
                            BEST QUALITY
                        </span>


                        <h3>
                            {{ $product->name }}
                        </h3>


                        <p class="product-category">

                            {{ $product->category->name ?? 'No Category' }}

                        </p>



                        <div class="product-bottom">


                            <span class="product-price">

                                {{ $product->currency ?? 'Rs' }}.
                                {{ number_format($product->price, 0) }}

                            </span>


                            <a
                                href="{{ route('frontend.product-detail', $product->id) }}"
                                class="view-product"
                            >
                                View Details
                            </a>


                        </div>


                    </div>


                </div>


            @empty


                <div class="no-products">

                    <h3>
                        No Products Found
                    </h3>

                    <p>
                        There are currently no products available.
                    </p>

                </div>


            @endforelse


        </div>

    </section>


</div>

@endsection