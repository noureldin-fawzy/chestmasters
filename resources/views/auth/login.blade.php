@extends('layouts.front')

@section('content')
<div class="page-content inner">
    <div class="container">
        <div class="inner-page">
            <div class="login">

                <h2 class="inner-title">{{ __('Login') }}</h2>
                <p class="inner-text">Welcome to ChestMasters! Please Fill in the form below to sign in.</p>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('theme/assets/Content/en/images/login.svg') }}" class="img-fluid login-img">
                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="inputEmail4">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputPassword4">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <small id="passwordHelpBlock" class="form-text text-muted d-none">
                                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                </small>
                            </div>

                            <div class="form-row">

                                <div class="form-group col pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>

                                @if (Route::has('password.request'))
                                <div class="form-group col ">
                                  <a href="{{ route('password.request') }}" class="btn-text forget-pass">{{ __('Forgot Your Password?') }}</a>
                                </div>
                                @endif

                            </div>

                            <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>


                            <p>Don't have an accouant yet <a href="{{ route('register') }}" class="btn-text">Register Here</a></p>


                        </form>
                    </div>
                </div>


            </div>


        </div>
    </div>
</div>
@endsection
