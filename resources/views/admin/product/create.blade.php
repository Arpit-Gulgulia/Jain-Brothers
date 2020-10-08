@extends('admin.layouts.app')

@section('content')
    <div class="flash-message">
        @if(Session::has('message'))
            <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
        @endif
{{--            @if ($errors->any())--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <div>{{$error}}</div>--}}
{{--                @endforeach--}}
{{--            @endif--}}
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Product') }}</div>
                    <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            {{-- Select Clothing Category --}}
                            <div class="form-group row">
                                <label for="person" class="col-md-4 col-form-label text-md-right">{{ __('Consumer Type') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('person_id') is-invalid @enderror" type="text" placeholder="{{ $consumer->name }}" readonly>
                                    <input type="text" name="person_id" value="{{ $consumer->person_id }}" class="form-control"  hidden>

                                    @error('person_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Product Category --}}
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Product Category') }}</label>

                                <div class="col-md-6">
                                    {!! $selectBoxHtml !!}
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="Enter Product Name"
                                           value="{{ old('name') }}"
                                           required autocomplete="name"
                                           autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Code --}}
                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Product Code') }}</label>

                                <div class="col-md-6">
                                    <input id="code"
                                           type="text"
                                           class="form-control @error('code') is-invalid @enderror"
                                           name="code"
                                           placeholder="Enter Product Code"
                                           value="{{ old('code') }}"
                                           required autocomplete="code"
                                           autofocus>

                                    @error('code')
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
                                    <input id="price"
                                           type="number"
                                           class="form-control @error('price') is-invalid @enderror"
                                           name="price"
                                           placeholder="Enter Product price."
                                           value="{{ old('price') }}"
                                           required autocomplete="price">

                                    @error('price')
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
                                    <input id="image"
                                           type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           name="image"
                                           value="{{ old('image') }}"
                                           required>

                                    @error('image')
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
                                    <input id="size"
                                           type="text"
                                           class="form-control @error('size') is-invalid @enderror"
                                           name="size"
                                           placeholder="Enter Product Size"
                                           value="{{ old('size') }}"
                                           required autocomplete="size"
                                           autofocus>

                                    @error('size')
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
                                    <input id="color"
                                           type="text"
                                           class="form-control @error('color') is-invalid @enderror"
                                           name="color"
                                           placeholder="Enter Product Color"
                                           value="{{ old('color') }}"
                                           required autocomplete="color"
                                           autofocus>

                                    @error('color')
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
                                    <input id="stock"
                                           type="number"
                                           class="form-control @error('stock') is-invalid @enderror"
                                           name="stock"
                                           placeholder="Enter Product stock."
                                           value="{{ old('stock') }}"
                                           required autocomplete="stock">

                                    @error('stock')
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
                                    <textarea id="description"
                                           class="form-control @error('description') is-invalid @enderror"
                                           name="description"
                                           placeholder="Enter Product description"
                                           value="{{ old('description') }}"
                                           required autocomplete="description"
                                           autofocus>
                                    </textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Add Product Button --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Add Product') }}
                                    </button>
                                    <a href="{{ route('admin.product.index') }}" class="btn btn btn-secondary">
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
{{--    <script type="application/javascript">--}}
{{--            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
{{--            function getCategories(person_id){--}}
{{--                // $('#loader').show();--}}
{{--                $.ajax({--}}
{{--                    /* the route pointing to the post function */--}}
{{--                    url: '{{ route("admin.product.category") }}',--}}
{{--                    type: 'POST',--}}
{{--                    /* send the csrf-token and the input to the controller */--}}
{{--                    data: {_token: CSRF_TOKEN, person_id: person_id},--}}
{{--                    dataType: 'JSON',--}}
{{--                    /* remind that 'data' is the response of the AjaxController */--}}
{{--                    success: function (data) {--}}
{{--                        var categories = '<select name="category_id"><option value selected disabled>Select Product Category</option>';--}}
{{--                        for (var i =0; i<data.length; i++){--}}
{{--                            categories += '<option value="'+ data[i].category_id+'">'+data[i].name+'</option>';--}}
{{--                        }--}}
{{--                        categories += '</select>'--}}
{{--                        $('#category_id').html(categories);--}}
{{--                        // ("#loader").hide();--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--            --}}{{--function getSubcategories(category_id){--}}
{{--            --}}{{--    console.log(category_id);--}}
{{--            --}}{{--    // $('#loader').show();--}}
{{--            --}}{{--    $.ajax({--}}
{{--            --}}{{--        /* the route pointing to the post function */--}}
{{--            --}}{{--        url: '{{ route("admin.product.subcategory") }}',--}}
{{--            --}}{{--        type: 'POST',--}}
{{--            --}}{{--        /* send the csrf-token and the input to the controller */--}}
{{--            --}}{{--        data: {_token: CSRF_TOKEN, category_id: category_id},--}}
{{--            --}}{{--        dataType: 'JSON',--}}
{{--            --}}{{--        /* remind that 'data' is the response of the AjaxController */--}}
{{--            --}}{{--        success: function (data) {--}}
{{--            --}}{{--            var subcategories = '<select name="subcategory_id"><option value>Select Sub Category</option>';--}}
{{--            --}}{{--            for (var i =0; i<data.length; i++){--}}
{{--            --}}{{--                subcategories += '<option value="'+ data[i].subcategory_id+'">'+data[i].subcategory_name+'</option>';--}}
{{--            --}}{{--            }--}}
{{--            --}}{{--            subcategories += '</select>'--}}
{{--            --}}{{--            $('#subcategory_id').html(subcategories);--}}
{{--            --}}{{--        }--}}
{{--            --}}{{--    });--}}
{{--            --}}{{--}--}}
{{--    </script>--}}
@endsection

