@extends('layouts.nav')

@section('title')
    Tooplate's Little Fashion - Peoducts Page
@endsection

@section('cont')
    <header class="site-header section-padding d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12">
                    <h1>
                        <span class="d-block text-primary">Choose your</span>
                        <span class="d-block text-dark">favorite stuffs</span>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <section class="products section-padding">
        <div class="container">
            <div class="row">
                
                <div class="col-12">
                    <h2 class="mb-5">New Arrivals</h2>
                </div>
                @foreach ($products as $product)
                    <div class="col-lg-4 col-12 mb-3">
                        <div class="product-thumb">
                            <a href="{{ url('/product-detail', $product) }}">
                                <img src="{{ asset($product->path) }}" class="img-fluid product-image" alt="">
                            </a>


                            <div class="product-info d-flex">
                                <div>
                                    <h5 class="product-title mb-0">
                                        <a href="/product-detail" class="product-title-link">{{$product->name}}</a>
                                    </h5>

                                </div>

                                <small class="product-price text-muted ms-auto">${{$product->price}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
