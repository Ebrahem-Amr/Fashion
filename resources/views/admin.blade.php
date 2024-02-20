@extends('layouts.nav')

@section('title')
    Tooplate's Little Fashion - Admin Page
@endsection

@section('cont')

    <section class="sign-in-form section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mx-auto col-12">

                    <h1 class="hero-title text-center mb-5">Upload</h1>

                    <div class="row">
                        <div class="col-lg-8 col-11 mx-auto">
                            
                            <form action="{{ url('upload') }}" method="post" enctype="multipart/form-data" class="mt-4">
                                @csrf
                            
                                <div class="form-floating mb-3">
                                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="product name" required>
                                    <label for="product_name">product name</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="price" id="price" class="form-control" placeholder="product price" required>
                                    <label for="price">product price</label>
                                </div>
                            
                                <div class="form-floating mb-3">
                                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="الكمية" required>
                                    <label for="quantity">الكمية</label>
                                </div>
                            
                                <div class="form-file mb-3">
                                    <input type="file" name="image" id="image" class="form-file-input" required>
                                    <label class="form-file-label" for="image">
                                        <span class="form-file-text">اختر صورة المنتج</span>
                                    </label>
                                </div>
                            
                                <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                    Upload
                                </button>
                            </form>

                            
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </section>
@endsection
