@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        @if(Session::has('message'))
            <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
        @endif

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products List</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a href="{{ route('admin.product.index', ['consumer' => 'men']) }}"  class="active btn btn-sm btn-outline-secondary">Men</a>
                        <a href="{{ route('admin.product.index', ['consumer' => 'women']) }}"  class="btn btn-sm btn-outline-secondary">Women</a>
                        <a href="{{ route('admin.product.index', ['consumer' => 'kids']) }}"  class="btn btn-sm btn-outline-secondary">Kids</a>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add New Product
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('admin.product.create', ['consumer' => 'men']) }}">Men</a>
                        <a class="dropdown-item" href="{{ route('admin.product.create', ['consumer' => 'women']) }}">Women</a>
                        <a class="dropdown-item" href="{{ route('admin.product.create', ['consumer' => 'kids']) }}">Kids</a>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
            @if(count($products) > 0)
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Consumer Type</th>
                        <th>Category Id</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->product_id }}</td>
                            <td>{{ $product->person->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td><img src="/storage/Uploads/Admin/Products/Large/{{ $product->image }}" width="75px"></td>
                            <td>
                                <a href="{{ route('admin.product.edit', ['id' => $product->product_id]) }}">
                                    <span data-feather="edit"></span>
                                </a>
                                <a href="{{ route('admin.product.destroy', ['id' => $product->product_id]) }}"
                                   onclick="event.preventDefault(); document.getElementById('product-destroy-{{ $product->product_id }}').submit();">
                                    <span data-feather="delete"></span>
                                    <form id="product-destroy-{{ $product->product_id }}"
                                          action="{{  route('admin.product.destroy', ['id' => $product->product_id]) }}"
                                          method="POST"
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    <div class="w-25 mx-auto text-dark pl-lg-5">
                        {{ $products->links() }}
                    </div>
            @else
                <p class="alert alert-info text-center mx-auto w-50">
                    No Product found in database!
                </p>
            @endif
        </div>
    </div>
@endsection
