@extends('layouts.app')

@section('content')
    Total {{ count($products) }} Products found in database.
    <div class="card-group">
        @foreach($products as $product)
            <div class="card">
                <img class="card-img-top" src="/storage/{{ $product->image }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text"><small class="text-muted">Uploaded at {{$product->created_at}} </small></p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
