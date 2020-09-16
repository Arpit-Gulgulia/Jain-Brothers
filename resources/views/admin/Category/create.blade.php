@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Category') }}</div>
                    <form method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        <div class="card-body">

                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('category') }}</label>

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

                            {{-- Add Category Button --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Category') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="py-3">
            <p>
                By clicking register you are accepting our<a href="#">Terms & Conditions</a>
                and <a href="#">Security</a>, <a href="#">Privacy & Cookie</a> Policy
            </p>
        </div>
    </div>
@endsection
