@extends('layouts.app')

@section('content')
    <div class="flash-message w-50 mx-auto text-center">
        @if($message = Session::get('message'))
            <p class="alert alert-success">{{ $message }}</p>
        @elseif($message = Session::get('error'))
            <p class="alert alert-danger">{{ $message }}</p>
        @endif
{{--        @if($errors->any())--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <div>{{ $error }}</div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
    </div>
   <div class="container">
       <div class="row">
           @foreach($products as $product)
               <div class="col-sm-3 py-3">
                   <div class="card">
                       <a href="{{ route('admin.product.show', ['product' => $product->product_id]) }}">
                           <img class="card-img-top" src="/storage/{{ $product->product_image }}" alt="Card image cap">
                           <div class="card-body">
                               <h5 class="card-title">{{ $product->product_name }}</h5>
                               <p class="card-text">{{ $product->product_description }}</p>
                               <a class="card-link btn btn-primary" href="{{  route('admin.product.edit', ['product' => $product->product_id]) }}">Edit</a>
                               <form class="d-inline" action="{{ route('admin.product.destroy', ['product' => $product->product_id]) }}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="card-link btn btn-danger">Delete</button>
                               </form>
                               <p class="card-text"><small class="text-muted">Uploaded at {{$product->created_at}} </small></p>
                           </div>
                       </a>
                   </div>
               </div>
           @endforeach
       </div>
       <div class="row">
           <div class="col-md-12 d-flex justify-content-center">
               {{ $products->links() }}
           </div>
       </div>
   </div>
@endsection
