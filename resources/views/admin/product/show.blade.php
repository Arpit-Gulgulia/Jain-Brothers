@extends('layouts.app')

@section('content')
    <div class="container px-auto">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card mb-3">
                    <img class="card-img-top" src="/storage/{{ $product->product_image }}" alt="Product image cap">
                    <div class="card-body">
                        <h5 class="card-title">Name : {{ $product->product_name }}</h5>

                        <h5 class="card-title">Price : {{ $product->product_price }}</h5>

                        <h5 class="card-title">Size : {{ $productDetails->product_size }}</h5>

                        <h5 class="card-title">Color : {{ $productDetails->product_color }}</h5>

                        <h5 class="card-title">Stock : {{ $productDetails->product_stock }}</h5>

                        <h5 class="card-title">Description : {{ $productDetails->product_description }}</h5>

                        <p class="card-text"><small class="text-muted">{{ $product->updated_at }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
