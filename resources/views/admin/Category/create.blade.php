@extends('admin.layouts.app')

@section('content')
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">{{ __('Add New Category') }}</div>
                    <form method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        <div class="card-body">

                            {{-- Consumer Type --}}
                            <div class="form-group row">
                                <label for="person" class="col-md-4 col-form-label text-md-right">{{ __('Consumer Type') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="{{ $consumer->name }}" readonly>
                                    <input class="form-control" type="text" name="person_id" value="{{ $consumer->person_id }}" hidden>
                                    @error('person_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Parent Category --}}
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category level') }}</label>

                                <div class="col-md-6">
                                    <select id="category" name="parent_id" required>
                                        <option value="0">Main Category</option>
                                        <option disabled class="bg-secondary text-white">Sub Categories List</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->category_id}}"
                                                    @if(old('category')==$category->category_id) selected @endif>{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="Enter your category"
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

                            {{-- URL --}}
                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>

                                <div class="col-md-6">
                                    <input id="url"
                                           type="text"
                                           class="form-control @error('url') is-invalid @enderror"
                                           name="url"
                                           placeholder="Enter category URL"
                                           value="{{ old('url') }}"
                                           required autocomplete="url"
                                           >

                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Add Category Button --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Add Category') }}
                                    </button>
                                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">
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
    <script type="application/javascript">
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
                    var categories = '<select name="category_id"><option value selected disabled>Select Product Category</option>';
                    for (var i =0; i<data.length; i++){
                        categories += '<option value="'+ data[i].category_id+'">'+data[i].name+'</option>';
                    }
                    categories += '</select>'
                    $('#category_id').html(categories);
                    // ("#loader").hide();
                }
            });
        }
    </script>
@endsection
