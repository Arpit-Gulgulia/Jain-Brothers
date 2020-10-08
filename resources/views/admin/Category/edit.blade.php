@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">{{ __('Update Category') }}</div>
                    <form method="POST" action="{{ route('admin.category.update', ['id' => $data->category_id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">


                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="Enter your category"
                                           value="{{ old('name') ?? $data->name }}"
                                           required autocomplete="name"
                                           autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Parent Category --}}
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('category') }}</label>

                                <div class="col-md-6">
                                    <select id="category" name="category" required>
                                        <option value="0" {{ $data->parent_id==0 ?? "selected"}}>Main Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->category_id}}"
                                                    @if(old('category')== $category->category_id || $category->category_id==$data->parent_id) selected @endif>{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Consumer Type --}}
                            <div class="form-group row">
                                <label for="person" class="col-md-4 col-form-label text-md-right">{{ __('Consumer Type') }}</label>

                                <div class="col-md-6">
                                    <select id="person" name="person" required>
                                        <option>Select Consumer Type</option>
                                        @foreach($persons as $person)
                                            <option value="{{$person->person_id}}"
                                                    @if(old('person')== $person->person_id || $person->person_id ==$data->person_id) selected @endif>{{ $person->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('person')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select id="status" name="status" required>
                                        <option value="1" @if($category->status==1) selected @endif>Active</option>
                                        <option value="0" @if($category->status==0) selected @endif>Inactive</option>
                                    </select>

                                    @error('status')
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
                                           value="{{ old('url') ?? $data->url }}"
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
                                    <button type="submit" class="btn btn-sm btn-secondary">
                                        {{ __('Update Category') }}
                                    </button>
                                    <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-secondary">
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
@endsection
