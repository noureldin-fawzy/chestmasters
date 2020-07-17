@extends('layouts.front')

@section('content')
<div class="page-content inner">
    <div class="container">
        <div class="inner-page">
            <div class="register">

                <h2 class="inner-title">Register Now!</h2>
                <p class="inner-text">Welcome to ChestMasters! Please Fill in the form below to get instant access.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">First Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="First Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus placeholder="Last Name">
                              @error('lastName')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phoneNumber">Phone Number</label>
                            <input id="phoneNumber" type="number" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" placeholder="Phone Number">
                            @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <small id="passwordHelpBlock" class="form-text text-muted d-none">
                                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Country</label>
                            <select id="inputState" class="form-control">
                                <option value="Egypt" selected>Egypt</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Specialty</label>
                            <select id="inputState" class="form-control">
                                <option selected>test</option>
                                <option selected>test2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Graduation Year</label>
                            <select id="inputState" class="form-control">
                                <option selected>2014</option>
                                <option selected>2016</option>
                                <option selected>2020</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Education Degree</label>
                            <select id="inputState" class="form-control">
                                <option selected>test</option>
                                <option selected>test2</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Society Membership ID</label>

                            <input type="number" class="form-control" id="inputEmail4" placeholder="Society Membership ID">

                            <div>
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-lg-3 col-md-4">
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
