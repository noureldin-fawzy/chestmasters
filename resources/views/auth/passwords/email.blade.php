@extends('layouts.front')

@section('content')
<div class="page-content inner">
    <div class="container">
        <div class="inner-page">
            <div class="login">

                <h2 class="inner-title">Reset your password</h2>
                <p class="inner-text">please enter the email you used at the time of Registeration to get the password reset instruction</p>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('theme/assets/Content/en/images/psw.svg') }}" class="img-fluid login-img">
                    </div>
                    <div class="col-md-6">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      <form method="POST" action="{{ route('password.email') }}">
                          @csrf

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                              {{ __('Send Password Reset Link') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
