@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Sub Category') }}</div>
                    <form method="POST" action="{{ route('admin.subcategory.store') }}">
                        @csrf
                        <div class="card-body">

                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="subcategory" class="col-md-4 col-form-label text-md-right">{{ __('Subcategory') }}</label>

                                <div class="col-md-6">
                                    <input id="subcategory"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="Enter your Subcategory"
                                           value="{{ old('name') }}"
                                           required autocomplete="subcategory"
                                           autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Add Sub Category Button --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Sub Category') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
