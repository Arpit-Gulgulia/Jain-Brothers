@extends('layouts.app')

@section('content')
    <h3>Upload New Product</h3>
    <div class="product_upload" style="width: 100%; box-shadow: 0 0 4px #C1C1C1;;position: relative;z-index: 4;padding: 0 0 15px;margin-top: 48px;">
        <div class="row">
            <div class="col-lg-12">
                <div style="text-align: right">
                    <a href="{{ route('admin.product.list') }}">
                        <button style="background: #2171a0;border: none;color: #fff;padding: 5px 10px;font-size: 13px;">CANCEL</button>
                    </a>
                </div>
                <div class="flashmsg">

                </div>

            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('') }}" enctype="multipart/form-data">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4">
                            Category
                            <span style="color:red;font-weight: bold;">*</span>
                        </div>
                        <div class="col-lg-8">
                            <select name="product_category" id="product_category">
                                <option value>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id.'_'.$category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4">
                            Sub-Category
                            <span style="color:red;font-weight: bold;">*</span>
                        </div>
                        <div class="col-lg-8">
                            <select name="product_subcategory" id="product_subcategory">
                                <option value="{{ old('product_subcategory') }}">Select SubCategory</option>
                                @foreach($subcategories as $category)
                                    <option value="{{ $category->id.'_'.$category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4">
                            Product Name
                            <span style="color:red;font-weight: bold;">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input type="text"
                                   name="product_name"
                                   id="product_name"
                                   placeholder="Enter product Name"
                                   required autocomplete="product_name"
                                   value="{{ old('product_name') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4">
                            Product Price
                            <span style="color:red;font-weight: bold;">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input type="text"
                                   name="product_price"
                                   id="product_price"
                                   value="{{ old('product_price') }}"
                                   placeholder="Enter product price"
                                   required autocomplete="product_price">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4">
                            Image
                            <span style="color:red;font-weight: bold;">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input type="file"
                                   name="product_image"
                                   id="product_image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4">
                            Product Description
                            <span style="color:red;font-weight: bold;">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input type="text"
                                   name="product_description"
                                   id="product_description"
                                   value="{{ old('product_description') }}"
                                   required autocomplete="product_description">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div style="text-align: right">
                    <button type="submit" style="background: #2171a0;border: none;color: #fff;padding: 5px 10px;font-size: 13px;">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
@endsection
