@extends('layouts.app')

@section('content')
    <div class="flash-message">
        @if($message = Session::get('success'))
            <p class="alert alert-success">{{ $message }}</p>
        @elseif($message = Session::get('error'))
            <p class="alert alert-danger">{{ $message }}</p>
        @endif
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Product') }}</div>
                    <form method="POST" action="{{ route('admin.product.update', ['product' => $product->product_id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            {{-- Select Clothing Category --}}
                            <div class="form-group row">
                                <label for="person" class="col-md-4 col-form-label text-md-right">{{ __('Person') }}</label>

                                <div class="col-md-6">
                                    <select name="person_id" id="person_id" onchange="getCategories(this.value)" class="@error('person_id') is-invalid @enderror" >
                                        <option value="">Select Person Category</option>
                                        @foreach($persons as $person)
                                            <option value="{{ $person->person_id }}">{{ $person->person_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('person_id')
                                    <span class="text-danger d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Product Category --}}
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <select name="product_category_id" id="product_category_id" onchange="getSubcategories(this.value)" class="@error('product_category_id') is-invalid @enderror"  >
                                        <option value>Select Category</option>
                                    </select>
                                    <img id="loader" style="display: none" src="{{ asset('images/loader.gif') }}" />
                                    @error('product_category_id')
                                    <span class="text-danger d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Product Sub Category --}}
                            <div class="form-group row">
                                <label for="subcategory" class="col-md-4 col-form-label text-md-right">{{ __('Sub Category') }}</label>

                                <div class="col-md-6">
                                    <select name="product_subcategory_id" id="product_subcategory_id" class="@error('product_subcategory_id') is-invalid @enderror" >
                                        <option value>Select Sub Category</option>
                                    </select>
                                    <img id="loader" style="display: none" src="{{ asset('images/loader.gif') }}" />
                                    @error('product_subcategory_id')
                                    <span class="text-danger d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                                <div class="col-md-6">
                                    <input id="product_name"
                                           type="text"
                                           class="form-control @error('product_name') is-invalid @enderror"
                                           name="product_name"
                                           placeholder="Enter Product Name"
                                           value="{{ old('product_name') ?? $product->product_name }}"
                                            autocomplete="product_name"
                                           autofocus>

                                    @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>

                                <div class="col-md-6">
                                    <input id="product_price"
                                           type="number"
                                           class="form-control @error('product_price') is-invalid @enderror"
                                           name="product_price"
                                           placeholder="Enter Product price."
                                           value="{{ old('product_price') ?? $product->product_price }}"
                                            autocomplete="product_price">

                                    @error('product_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>

                                <div class="col-md-6">
                                    <input id="product_image"
                                           type="file"
                                           class="form-control @error('product_image') is-invalid @enderror"
                                           name="product_image"
                                           value="{{ old('product_image') }}"
                                           >

                                    @error('product_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Size --}}
                            <div class="form-group row">
                                <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Product Size') }}</label>

                                <div class="col-md-6">
                                    <input id="product_size"
                                           type="text"
                                           class="form-control @error('product_size') is-invalid @enderror"
                                           name="product_size"
                                           placeholder="Enter Product Size"
                                           value="{{ old('product_size') ?? $productDetails->product_size}}"
                                            autocomplete="product_size"
                                           autofocus>

                                    @error('product_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Color --}}
                            <div class="form-group row">
                                <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Product Color') }}</label>

                                <div class="col-md-6">
                                    <input id="product_color"
                                           type="text"
                                           class="form-control @error('product_color') is-invalid @enderror"
                                           name="product_color"
                                           placeholder="Enter Product Color"
                                           value="{{ old('product_color') ?? $productDetails->product_color }}"
                                            autocomplete="product_color"
                                           autofocus>

                                    @error('product_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Stock --}}
                            <div class="form-group row">
                                <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Product Stock') }}</label>

                                <div class="col-md-6">
                                    <input id="product_stock"
                                           type="number"
                                           class="form-control @error('product_stock') is-invalid @enderror"
                                           name="product_stock"
                                           placeholder="Enter Product stock."
                                           value="{{ old('product_stock') ?? $productDetails->product_stock }}"
                                            autocomplete="product_stock">

                                    @error('product_stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="product_description"
                                              class="form-control @error('product_description') is-invalid @enderror"
                                              name="product_description"
                                              placeholder="Enter Product description"
                                               autocomplete="product_description"
                                              autofocus>
                                        {{ old('product_description') ?? $productDetails->product_description}}
                                    </textarea>

                                    @error('product_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Add Product Button --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Product') }}
                                    </button>
                                    <a class="btn btn-primary" href="{{ route('admin.product.index') }}">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        function getCategories(person_id){
            // $('#loader').show();
            $.ajax({
                /* the route pointing to the post function */
                url: '{{ route("admin.product.category") }}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, person_id: person_id},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    var categories = '<select name="product_category_id"><option value>Select Category</option>';
                    for (var i =0; i<data.length; i++){
                        categories += '<option value="'+ data[i].product_category_id+'">'+data[i].product_category_name+'</option>';
                    }
                    categories += '</select>'
                    $('#product_category_id').html(categories);
                    // ("#loader").hide();
                }
            });
        }
        function getSubcategories(category_id){
            console.log(category_id);
            // $('#loader').show();
            $.ajax({
                /* the route pointing to the post function */
                url: '{{ route("admin.product.subcategory") }}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, category_id: category_id},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    var subcategories = '<select name="product_subcategory_id"><option value>Select Sub Category</option>';
                    for (var i =0; i<data.length; i++){
                        subcategories += '<option value="'+ data[i].product_subcategory_id+'">'+data[i].product_subcategory_name+'</option>';
                    }
                    subcategories += '</select>'
                    $('#product_subcategory_id').html(subcategories);
                }
            });
        }
    </script>
@endsection

