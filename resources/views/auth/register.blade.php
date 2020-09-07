@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card-body">

                            {{-- Name --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="Enter your name"
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

                            {{-- Email --}}
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email"
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           placeholder="Enter your email"
                                           value="{{ old('email') }}"
                                           required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone"
                                           type="number"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           name="phone"
                                           placeholder="Enter your phone no."
                                           value="{{ old('phone') }}"
                                           required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- DOB --}}
                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth (Optional)') }}</label>

                                <div class="col-md-6">
                                    <input id="dob"
                                           type="date"
                                           class="form-control @error('dob') is-invalid @enderror"
                                           name="dob"
                                           value="{{ old('dob') }}" required autocomplete="dob">

                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password"
                                           type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           placeholder="Enter your password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password Confirm --}}
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm"
                                           type="password"
                                           class="form-control"
                                           name="password_confirmation"
                                           placeholder="Re-enter your password"
                                           required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- Register Button --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Account Benefits') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><i class="fas fa-bars fa-lg"></i></div>
                            <div class="col-md-10">
                                <p><strong>Track Orders</strong></p>
                                <p>Track and view order history.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2"><i class="far fa-comment-dots fa-lg"></i></div>
                            <div class="col-10">
                                <p><strong>Latest Launches</strong></p>
                                <p>Be the first to know about our daily deals</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2"><i class="far fa-heart fa-lg"></i></div>
                            <div class="col-10">
                                <p><strong>Save For Later</strong></p>
                                <p>Save your favourite products for later</p>
                            </div>
                        </div>
                    </div>
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
