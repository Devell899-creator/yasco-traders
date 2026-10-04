@extends('frontend.layouts.app')

@section('title', 'About Us | YASCO Traders')

@section('content')

<style>

    .about-banner {
        background-color: #e63946;
        color: #fff;
        text-align: center;
        padding: 60px 20px;
    }

    .about-banner h1 {
        font-size: 42px;
        margin-bottom: 15px;
    }

    .about-banner p {
        font-size: 20px;
    }

    .about-company {
        max-width: 1200px;
        margin: 60px auto;
        display: flex;
        align-items: center;
        gap: 50px;
        padding: 0 20px;
    }

    .about-image {
        width: 50%;
    }

    .about-image img {
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,.15);
    }

    .about-content {
        width: 50%;
    }

    .about-content h2 {
        font-size: 34px;
        color: #222;
        margin-bottom: 20px;
    }

    .about-content p {
        font-size: 17px;
        color: #555;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .our-mission {
        max-width: 1000px;
        margin: 50px auto;
        text-align: center;
        padding: 0 20px;
    }

    .our-mission h2 {
        font-size: 34px;
        color: #222;
        margin-bottom: 20px;
    }

    .our-mission p {
        font-size: 18px;
        color: #555;
    }

    .why-us {
        max-width: 1000px;
        margin: 60px auto;
        background: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,.08);
    }

    .why-us h2 {
        text-align: center;
        color: #222;
        margin-bottom: 30px;
    }

    .why-us ul {
        list-style: none;
        padding: 0;
    }

    .why-us li {
        padding: 12px 0;
        font-size: 18px;
        color: #444;
        border-bottom: 1px solid #eee;
    }

    @media(max-width:768px) {

        .about-company {
            flex-direction: column;
        }

        .about-image,
        .about-content {
            width: 100%;
        }

        .about-banner h1 {
            font-size: 30px;
        }

    }

</style>


<section class="about-banner">

    <h1>About YASCO Traders</h1>

    <p>
        Quality Mobile Accessories With Confidence
    </p>

</section>


<section class="about-company">

    <div class="about-image">

        <img
            src="{{ asset('Images/products/banner (2).png') }}"
            alt="YASCO Traders"
        >

    </div>


    <div class="about-content">

        <h2>Who We Are</h2>

        <p>
            YASCO Traders is a trusted supplier of premium mobile accessories.
            We provide high-quality products including chargers, data cables,
            earphones, neckbands and many other mobile accessories.
        </p>

        <p>
            Our mission is to deliver reliable products at affordable prices
            while ensuring complete customer satisfaction.
        </p>

    </div>

</section>


<section class="our-mission">

    <h2>Our Mission</h2>

    <p>
        To become one of Pakistan's most trusted mobile accessories suppliers.
    </p>

</section>


<section class="why-us">

    <h2>Why Choose Us?</h2>

    <ul>

        <li>✔ Premium Quality Products</li>
        <li>✔ Affordable Prices</li>
        <li>✔ Fast Delivery</li>
        <li>✔ Customer Satisfaction</li>
        <li>✔ Genuine Accessories</li>

    </ul>

</section>

@endsection