@extends('frontend.layouts.app')

@section('title', 'YASCO Traders')

@section('content')


    {{-- First 5 Products --}}
    <section class="main">

        @foreach($products->skip(5)->take(5) as $product)

            <div class="head">

                @if($product->image)
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                @endif

                <p>BEST QUALITY</p>

                <h3>
                    {{ $product->name }}
                </h3>

                <p>
                    <em>
                        {{ $product->category->name ?? 'Accessories' }}
                    </em>
                </p>

                <p>
                    Rs. {{ number_format($product->price, 2) }}
                </p>

                <a href="{{ route('frontend.product-detail', $product->id) }}">
                    <button type="button">
                        Explore Products
                    </button>
                </a>

            </div>

        @endforeach

    </section>



    {{-- Next 5 Products --}}
    <section class="products">

        <div class="product-box">

            @foreach($products->take(5) as $product)

                <div class="product">

                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    @endif

                    <p>{{ $qualityText }}</p>

                    <h3>
                        {{ $product->name }}
                    </h3>

                    <p>
                        <em>
                            {{ $product->category->name ?? 'Accessories' }}
                        </em>
                    </p>

                    <p>
                        Rs. {{ number_format($product->price, 2) }}
                    </p>

                    <a href="{{ route('frontend.product-detail', $product->id) }}">
                        <button type="button">
                            Explore Products
                        </button>
                    </a>

                </div>

            @endforeach

        </div>

    </section>

@endsection