@extends('layouts.nav')

@section('title')
    Tooplate's Little Fashion - my cart Page
@endsection

@section('cont')
            
            <div class="modal-content border-0">
                
                <div class="modal-body">
                    @php
                        $total=0;
                    @endphp
                    @foreach ($my_products as $product_in_cart)
                        <br>
                        @php
                            $sum = $product_in_cart->price * $product_in_cart->pivot->quantity;
                            $total= $total + $sum;
                        @endphp

                        <div class="row">
                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <img src="{{ asset($product_in_cart->path) }}" class="img-fluid product-image" alt="">
                            </div>
                
                            <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                                
                                <h3 class="modal-title" id="exampleModalLabel">{{$product_in_cart->name}}</h3>
                
                                <p class="product-price text-muted mt-3" id="myprice">${{$product_in_cart->price}}</p>
                
                                <p class="product-p" >Quantity: <span class="ms-1" id="Quatity">{{$product_in_cart->pivot->quantity}}</span></p>
                
                                <p class="product-p">Colour: <span class="ms-1">Black</span></p>
                
                                <p class="product-p pb-3">Size: <span class="ms-1">S/S</span></p>
                
                                <div class="border-top mt-4 pt-3">
                                    <p class="product-p"><strong>Total: $<span class="ms-1" id="total">{{ $sum}}</span></strong></p>
                                </div>
                
                                
                                <form action="{{ route('removeFromCart', ['id' => $product_in_cart->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                
                            </div>
                        </div>
                    @endforeach
                    <div class="border-top mt-4 pt-3">
                        <p class="product-p"><strong>Total: $<span class="ms-1" id="total">{{ $total}}</span></strong></p>
                    </div>
                </div>
                

                
                

                <div class="modal-footer">
                    <div class="row w-50">
                        <a type="button" href='/checkout' class="btn custom-btn cart-btn ms-lg-4">Checkout</a>
                    </div>
                </div>
            </div>

@endsection


{{-- 
@section('cont')
    <div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header flex-column">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    @foreach ($my_products as $product_in_cart)
                        {{$my_product = $products->find($product_in_cart->product_id)}}
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
                    @endforeach
                    
                </div>

                
                

                <div class="modal-footer">
                    <div class="row w-50">
                        <button type="button" class="btn custom-btn cart-btn ms-lg-4">Checkout</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection --}}
