@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Already Registered?') }}</div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Sign in Securely') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="min-height: 100%">
                    <div class="card-header">{{ __('New User?') }}</div>

                    <div class="card-body">
                        <ul style="list-style-type: none" class="pl-0">
                            <li><i class="fas fa-check">&nbsp;</i> Receive special offers and promotions.</li>
                            <li><i class="fas fa-check">&nbsp;</i> Speed your way through checkout.</li>
                            <li><i class="fas fa-check">&nbsp;</i> View your order history and your current addresses.</li>
                            <li><i class="fas fa-check">&nbsp;</i> Access your saved items.</li>
                            <li><i class="fas fa-check">&nbsp;</i> Instant access to your account.</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            {{ __('Continue Securely') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3">
            <p>This website is secure and your personal details are protected.
                For more information, view our
                <a href="#">Terms & Conditions</a> and our
                <a href="#">Security</a>,
                <a href="#">Privacy</a> &
                <a href="#">Cookie Policy</a>.
            </p>
        </div>
    </div>
@endsection
