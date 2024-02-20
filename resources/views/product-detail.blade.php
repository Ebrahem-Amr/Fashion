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
                        <span class="d-block text-primary">We provide you</span>
                        <span class="d-block text-dark">Fashionable Stuffs</span>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <section class="product-detail section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="product-thumb">
                        <img src="{{ asset($my_product->path) }}" class="img-fluid product-image" alt="">
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="product-info d-flex">
                        <div>
                            <h2 class="product-title mb-0">{{$my_product->name}}</h2>
                        </div>

                        <small class="product-price text-muted ms-auto mt-auto mb-5">${{$my_product->price}}</small>
                    </div>

                    <div class="product-description">

                        <strong class="d-block mt-4 mb-2">Description</strong>

                        <p class="lead mb-5">Over three years in business, We’ve had the chance to work on a variety of projects, with companies</p>
                    </div>

                    <div class="product-cart-thumb row">
                        <form action="{{ url('/my_cart', $my_product) }}" role="form" method="post" >
                            @csrf
                            <div class="col-lg-6 col-12">
                                
                                {{-- <select name="ahmed" class="form-select cart-form-select" id="inputGroupSelect01">
                                    <option selected>Quantity</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select> --}}
                                <input type="text" name="quantity" min="1" max="20" value="1">
                            </div>

                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <button type="submit" class="btn custom-btn cart-btn" data-bs-toggle="modal" data-bs-target="#cart-modal">Add to Cart</button>
                            </div>
                        </form>
                        <p>
                            <a href="#" class="product-additional-link">Details</a>

                            <a href="#" class="product-additional-link">Delivery and Payment</a>
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="related-product section-padding border-top">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h3 class="mb-5">You might also like</h3>
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

{{-- 
@section('cont-product-detail')
    <!-- CART MODAL -->
    
    <div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header flex-column">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                            <img src="{{ asset($my_product->path) }}" class="img-fluid product-image" alt="">
                        </div>

                        <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                            
                            
                            <h3 class="modal-title" id="exampleModalLabel">{{$my_product->name}}</h3>

                            <p class="product-price text-muted mt-3" id="myprice">${{$my_product->price}}</p>

                            <p class="product-p" >Quantity: <span class="ms-1" id="Quatity"></span></p>

                            <p class="product-p">Colour: <span class="ms-1">Black</span></p>

                            <p class="product-p pb-3">Size: <span class="ms-1">S/S</span></p>

                            <div class="border-top mt-4 pt-3">
                                <p class="product-p"><strong>Total: $<span class="ms-1" id="total"></span></strong></p>
                            </div>

                        </div>
                    </div>
                </div>

                
                

                <div class="modal-footer">
                    <div class="row w-50">
                        <button type="button" class="btn custom-btn cart-btn ms-lg-4">Checkout</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        // الحصول على عنصر القائمة المنسدلة باستخدام JavaScript
        let mySelect = document.getElementById("inputGroupSelect01");
        let Quatity = document.getElementById("Quatity")
        let myprice = document.getElementById("myprice").innerText.slice(1)
        let total = document.getElementById("total")
        mySelect.addEventListener('change',function(e){
            Quatity.innerText = e.target.value;
            total.innerText = parseInt(myprice)*parseInt(Quatity.innerText)

        })
        
        

        
      
    </script>
@endsection --}}
